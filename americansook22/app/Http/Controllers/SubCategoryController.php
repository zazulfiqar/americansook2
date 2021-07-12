<?php

namespace App\Http\Controllers;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category=SubCategory::getAllSubCategory();

//         return $category;
//        dd($category->products()->id);
        return view('backend.subcategory.index')->with('categories',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('status','active')->orderBy('title','ASC')->get();
        $parent_cats=SubCategory::orderBy('title','ASC')->get();
        return view('backend.subcategory.create')
        ->with('parent_cats',$parent_cats)
        ->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {

        $data= $request->all();
        $slug=Str::slug($request->title);
        $count=SubCategory::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_parent']=$request->input('is_parent',0);
        // return $data;

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] =  $uploadedFile;
        }

        $status=SubCategory::create($data);
        if($status){
            request()->session()->flash('success','Category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('subcategory.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::where('status','active')->orderBy('title','ASC')->get();

        $parent_cats=Category::where('is_parent',1)->get();
        $category=SubCategory::findOrFail($id);

        return view('backend.subcategory.edit')->with('category',$category)->with('parent_cats',$parent_cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, $id)
    {


        $category=SubCategory::findOrFail($id);

        $data= $request->all();
        $data['cat_id']=$request->input('cat_id',0);
        // return $data;
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file')->store('backend/product');
            $data['photo'] =  $uploadedFile;
        }
        elseif (!$request->hasFile('file') && $request->old_file)
        {
            $data['photo'] = $request->old_file;
        }

        $status=$category->fill($data)->save();

        if($status){
            request()->session()->flash('success','Category successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }

        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=SubCategory::findOrFail($id);
        $child_cat_id=SubCategory::where('parent_id',$id)->pluck('id');
        // return $child_cat_id;
        $status=$category->delete();

        if($status){
            if(count($child_cat_id)>0){
                SubCategory::shiftChild($child_cat_id);
            }
            request()->session()->flash('success','Category successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting category');
        }
        return redirect()->route('subcategory.index');
    }

    public function getChildByParent(Request $request){
        // return $request->all();
        $category=SubCategory::findOrFail($request->id);
        $child_cat=SubCategory::getChildByParentID($request->id);
        // return $child_cat;
        if(count($child_cat)<=0){
            return response()->json(['status'=>false,'msg'=>'','data'=>null]);
        }
        else{
            return response()->json(['status'=>true,'msg'=>'','data'=>$child_cat]);
        }
    }
}
