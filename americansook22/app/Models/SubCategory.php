<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
 protected $fillable=['title','slug','summary','photo','cat_id','status'];


public static function getAllSubCategory(){
    return  SubCategory::orderBy('id','DESC')->paginate(10);
}

   public static function shiftChild($cat_id){
        return Category::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }
    // public static function getChildByParentID($id){
    //     return Category::where('parent_id',$id)->orderBy('id','ASC')->pluck('title','id');
    // }

    public function child_cat(){
        return $this->hasMany('App\Models\Category','parent_id','id')->where('status','active');
    }
    public static function getAllParentWithChild(){
        return Category::with('child_cat')->where('is_parent',1)->where('status','active')->orderBy('title','ASC')->get();
    }



}
