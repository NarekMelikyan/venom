<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\CategoriesTranslations;
use App\Http\Controllers\Controller;
use App\Languages;
use App\Subcategories;
use App\Venom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::with('translation')->paginate(20);
        return view('Backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Languages::all();
        return view('Backend.categories.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'image' => 'required'
        ];
        foreach ($request->get('name') as $key => $item) {
            $rules['name.' . $key] = 'required';
            $rules['description.' . $key] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $categoriesImagesPath = public_path('uploads/categories_images');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = '/uploads/categories_images/' . time() . $image->getClientOriginalName();
            $image->move($categoriesImagesPath, $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = '';
        }

        $category = Categories::create($data);

        foreach ($request->get('name') as $key => $item) {
            $data = [
                'category_id' => $category->id,
                'name' => $item,
                'description' => $request->get('description')[$key],
                'lang' => $key
            ];
            CategoriesTranslations::create($data);
        }

        return Redirect::to('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Languages::all();
        $category = Categories::with('translations')->where('id',$id)->first();
        return view('Backend.categories.edit',compact('category','id','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [];
        foreach ($request->get('name') as $key => $item) {
            $rules['name.' . $key] = 'required';
            $rules['description.' . $key] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $categoriesImagesPath = public_path('uploads/categories_images');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = '/uploads/categories_images/' . time() . $image->getClientOriginalName();
            $image->move($categoriesImagesPath, $imageName);
            Categories::where('id',$id)->update(['image'=> $imageName]);
        }

        foreach ($request->get('name') as $key => $item) {
            $data = [
                'name' => $item,
                'description' => $request->get('description')[$key],
            ];
            CategoriesTranslations::where('category_id',$id)->where('lang',$key)->update($data);
        }
        return Redirect::to('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::where('id',$id)->delete();
        Subcategories::where('category_id',$id)->delete();
        Venom::where('category_id',$id)->delete();
        return Redirect::back();
    }

    public function getSubcategory($id){
        $subcategories = Subcategories::with('translation')->where('category_id',$id)->get();
        return View::make('Backend.venom.ajax_views.subcategories_select_part',compact('subcategories'));
    }
}
