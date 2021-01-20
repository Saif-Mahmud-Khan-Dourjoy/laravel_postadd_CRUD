<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Newcontroller extends Controller
{
    // public function Hello(){

    // 	echo "this is hello";
    // }

    //  public function Views(){

    // 	return view('hello');
    // }

    // public function HomePage(){

    // 	return view("pages.index");
    // }

     public function AboutPage(){

    	return view("pages.about");
    }

// It Should have to be in post Controller
//       public function SimplePostPage(){
//         $category=DB::table('categories')->get();
//     	return view("pages.simplepost",compact('category'));
//     }

      public function ContactPage(){

    	return view("pages.contact");
    }

     public function AddCategoryPage(){

    	return view("pages.addcategory");
    }

     public function AddCategory(Request $request){

     	$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
    ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
         // return response()->json($data);
    	// echo "<pre>";
    	// print_r($data);
    	$category=DB::table('categories')->insert($data);
    	if($category){
    		$notification=array(
            'message'=>'Category Successfully Inserted',
            'alert-type'=>'success',
    		);

    		return Redirect()->route('allcategory')->with($notification);
    	}else{
    		$notification=array(
            'message'=>'Category Successfully Not Inserted',
            'alert-type'=>'danger',
    		);

    		return Redirect()->route('allcategory')->with($notification);
    	}

    }

     public function AllCategoryPage(){
       
       

     	$categories=DB::table('categories')->get();

     	// return response()->json($categories);

    	return view("pages.allcategory",compact('categories'));
    }

     public function  SingleView($id){

     	$categories=DB::table('categories')->where('id',$id)->first();

     	// return response()->json($categories);

    	return view("pages.singleview")->with('category',$categories);
    }

    public function EditViewpPage($id){
      
      	$category_edit=DB::table('categories')->where('id',$id)->first();

      	return view("pages.editcategory")->with('category',$category_edit);

    }

    public function UpdateCategory(Request $request,$id){
    	$validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
    ]);
    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;

    	$category=DB::table('categories')->where('id',$id)->update($data);
    	if($category){
    		$notification=array(
            'message'=>'Category Successfully Updated',
            'alert-type'=>'success',
    		);

    		return Redirect()->route('allcategory')->with($notification);
    	}else{
    		$notification=array(
            'message'=>'Category Successfully Not Updated',
            'alert-type'=>'danger',
    		);

    		return Redirect()->route('allcategory')->with($notification);
    	}



    }
   
    public function DeleteCategory($id){
       
       $category=DB::table('categories')->where('id',$id)->delete();

       if($category){
    		$notification=array(
            'message'=>'Category Successfully Deleted',
            'alert-type'=>'success',
    		);

       return Redirect()->back()->with($notification);

    }



    
}
    
    

}
