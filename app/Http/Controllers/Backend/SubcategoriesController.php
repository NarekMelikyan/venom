<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Languages;
use App\Subcategories;
use App\SubcategoriesTranslations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategories::with('translations', 'category')->paginate(20);
        return view('Backend.subcategories.index', compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Languages::all();
        $categories = Categories::with('translation')->get();
        return view('Backend.subcategories.create', compact('languages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];
        foreach ($request->get('name') as $key => $item) {
            $rules['name.' . $key] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $subcategory = Subcategories::create(['category_id' => $request->get('category_id')]);
        foreach ($request->get('name') as $key => $value) {
            $data = [
                'subcategory_id' => $subcategory->id,
                'name' => $value,
                'lang' => $key
            ];
            SubcategoriesTranslations::create($data);
        }

        return Redirect::to('/admin/subcategories');

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
        $categories = Categories::with('translation')->get();
        $subcategory = Subcategories::with('translations')->where('id', $id)->first();

        return view('Backend.subcategories.edit', compact('subcategory', 'id', 'categories', 'languages'));
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
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Subcategories::where('id', $id)->update(['category_id' => $request->get('category_id')]);
        foreach ($request->get('name') as $key => $value) {
            SubcategoriesTranslations::where('subcategory_id',$id)->where('lang',$key)->update(['name' => $value]);
        }

        return Redirect::to('/admin/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategories::where('id',$id)->delete();
        return Redirect::to('/admin/subcategories');
    }
}
