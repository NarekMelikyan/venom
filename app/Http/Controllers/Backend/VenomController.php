<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Languages;
use App\Subcategories;
use App\Venom;
use App\VenomTranslations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VenomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venom = Venom::with('translation','categoryWithTranslation','subcategoryWithTranslation')->paginate(20);
        return view('Backend.venom.index', compact('venom'));
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
        $subcategories = Subcategories::with('translation')->where('category_id', $categories->first()->id)->get();
        return view('Backend.venom.create', compact('languages', 'categories', 'subcategories'));
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
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'code' => 'required',
            'purity' => 'required',
            'price' => 'required',
        ];

        foreach ($request->get('name') as $key => $item) {
            $rules['name.' . $key] = 'required';
            $rules['common_name.' . $key] = 'required';
            $rules['origin.' . $key] = 'required';
            $rules['form.' . $key] = 'required';
            $rules['class.' . $key] = 'required';
            $rules['order.' . $key] = 'required';
            $rules['suborder.' . $key] = 'required';
            $rules['subfamily.' . $key] = 'required';
            $rules['genus.' . $key] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $venomImagesPath = public_path('uploads/venom_images');

        $data = [
            "category_id" => $request->get('category_id'),
            "subcategory_id" => $request->get('subcategory_id'),
            "code" => $request->get('code'),
            "purity" => $request->get('purity'),
            "price" => $request->get('price'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = '/uploads/venom_images/' . time() . $image->getClientOriginalName();
            $image->move($venomImagesPath,$imageName);
            $data['image'] = $imageName;
        }else{
            $data['image'] = '';
        }

        $venom = Venom::create($data);

        foreach ($request->get('name') as $key=> $item){
            $dataTranslation = [
                'venom_id' => $venom->id,
                'name' => $item,
                'common_names' => $request->get('common_name')[$key],
                'origin' => $request->get('origin')[$key],
                'form' => $request->get('form')[$key],
                'class' => $request->get('class')[$key],
                'order' => $request->get('order')[$key],
                'suborder' => $request->get('suborder')[$key],
                'family' => $request->get('family')[$key],
                'subfamily' => $request->get('subfamily')[$key],
                'genus' => $request->get('genus')[$key],
                'lang' => $key
            ];
            VenomTranslations::create($dataTranslation);
        }
        return Redirect::to('/admin/venom');
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
        $venom = Venom::with('translations')->where('id',$id)->first();
        return view('Backend.venom.edit',compact('venom','languages','id','categories'));
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
        $rules = [
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'code' => 'required',
            'purity' => 'required',
            'price' => 'required',
        ];

        foreach ($request->get('name') as $key => $item) {
            $rules['name.' . $key] = 'required';
            $rules['common_name.' . $key] = 'required';
            $rules['origin.' . $key] = 'required';
            $rules['form.' . $key] = 'required';
            $rules['class.' . $key] = 'required';
            $rules['order.' . $key] = 'required';
            $rules['suborder.' . $key] = 'required';
            $rules['subfamily.' . $key] = 'required';
            $rules['genus.' . $key] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $venomImagesPath = public_path('uploads/venom_images');

        $data = [
            "category_id" => $request->get('category_id'),
            "subcategory_id" => $request->get('subcategory_id'),
            "code" => $request->get('code'),
            "purity" => $request->get('purity'),
            "price" => $request->get('price'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = '/uploads/venom_images/' . time() . $image->getClientOriginalName();
            $image->move($venomImagesPath,$imageName);
            $data['image'] = $imageName;
        }else{
            $data['image'] = '';
        }

        Venom::where('id',$id)->update($data);

        foreach ($request->get('name') as $key=> $item){
            $dataTranslation = [
                'venom_id' => $id,
                'name' => $item,
                'common_names' => $request->get('common_name')[$key],
                'origin' => $request->get('origin')[$key],
                'form' => $request->get('form')[$key],
                'class' => $request->get('class')[$key],
                'order' => $request->get('order')[$key],
                'suborder' => $request->get('suborder')[$key],
                'family' => $request->get('family')[$key],
                'subfamily' => $request->get('subfamily')[$key],
                'genus' => $request->get('genus')[$key],
                'lang' => $key
            ];
            VenomTranslations::where('venom_id',$id)->where('lang',$key)->update($dataTranslation);
        }
        return Redirect::to('/admin/venom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Venom::where('id',$id)->delete();
        return Redirect::to('/admin/venom');
    }
}
