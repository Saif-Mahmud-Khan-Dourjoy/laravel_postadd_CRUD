<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Postcontroller extends Controller
{     
    public function HomePage(){
       $posts=DB::table('posts')
                   ->join('categories','posts.category_id','categories.id')
                   ->select('posts.*','categories.name')
                   ->paginate(3);
         return view('pages.pagination')->with('post',$posts);
        // return view("pages.index");
         
    }
      public function SimplePostPage(){
        $category=DB::table('categories')->get();
    	return view("pages.simplepost",compact('category'));
    }

     public function AddPost(Request $request){
     	$validatedData = $request->validate([
        'title' => 'required|unique:posts|max:25|min:4',
        'details' => 'required|max:400|min:4',
        'image' =>   'required|mimes:jpeg,png,jpg,bmp|max:2048'
    ]);

     	$data=array();
         
         $data['title']=$request->title;
         $data['category_id']=$request->category_id;
         $data['details']=$request->details;
         $image=$request->file('image');

         if ($image) {
         	$image_name=hexdec(uniqid());
         	$ext=strtolower($image->getClientOriginalExtension());
         	$image_full_name= $image_name.'.'.$ext;
         	$upload_path='public/image/';
         	$image_url=$upload_path.$image_full_name;
         	$success=$image->move($upload_path,$image_full_name);
         	$data['image']=$image_url;

         	  DB::table('posts')->insert($data); 
         	 $notification=array(
            'message'=>'Post Successfully Inserted',
            'alert-type'=>'success',
    		);

    		return Redirect()->route('allpost')->with($notification);
         }else{
           
           DB::table('posts')->insert($data);
           $notification=array(
            'message'=>'Post Successfully Inserted',
            'alert-type'=>'success',
    		);

    		return Redirect()->route('allpost')->with($notification);
    	}

     }

     public function AllPostPage(){
         
         // $posts=DB::table('posts')->get();
        $posts=DB::table('posts')
                   ->join('categories','posts.category_id','categories.id')
                   ->select('posts.*','categories.name')
                   ->get();
         return view('pages.allpost')->with('post',$posts);

     }

     public function SinglePost($id){
        $posts=DB::table('posts')
                   ->join('categories','posts.category_id','categories.id')
                   ->select('posts.*','categories.name')
                   ->where('posts.id',$id)
                   ->first();
         return view('pages.singlepostpage')->with('post',$posts);
     }

     public function EditPost($id){
        $category=DB::table('categories')->get();
        $posts=DB::table('posts')->where('id',$id)->first();

        return view('pages.editpost',compact('category','posts'));
     }

     public function UpdatePost(Request $request,$id){
                $validatedData = $request->validate([
        'title' => 'unique:posts|max:25|min:4',
        'details' => 'max:400|min:4',
        'image' =>   'mimes:jpeg,png,jpg,bmp|max:2048'
    ]);

        $data=array();
         
         $data['title']=$request->title;
         $data['category_id']=$request->category_id;
         $data['details']=$request->details;
         $image=$request->file('image');

         if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name= $image_name.'.'.$ext;
            $upload_path='public/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_image);

              DB::table('posts')->where('id',$id)->update($data); 
             $notification=array(
            'message'=>'Post Successfully Updated',
            'alert-type'=>'success',
            );

            return Redirect()->route('allpost')->with($notification);
         }else{
           $data['image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
           $notification=array(
            'message'=>'Post Successfully Updated',
            'alert-type'=>'success',
            );

            return Redirect()->route('allpost')->with($notification);
        }

     }

     public function DeletePost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        // return Response()->json($image);
        
         $delete=DB::table('posts')->where('id',$id)->delete();

         if($delete){
            unlink($image);
            $notification=array(
            'message'=>'Post Successfully Deleted',
            'alert-type'=>'success',
            );

            return Redirect()->route('allpost')->with($notification);
        }else{
            $notification=array(
            'message'=>'Post Successfully Not Deleted',
            'alert-type'=>'danger',
            );

            return Redirect()->route('allpost')->with($notification);
        }
     }
}
