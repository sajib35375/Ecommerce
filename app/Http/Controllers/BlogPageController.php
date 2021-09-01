<?php

namespace App\Http\Controllers;

use App\Models\AddPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index(){
        $categories = BlogCategory::latest()->get();
        $all_post = AddPost::latest()->paginate(3);
        return view('frontend.blog.index',compact('all_post','categories'));
    }
    public function PostDetails($id){
        $categories = BlogCategory::latest()->get();
        $post_detail = AddPost::find($id);
        return view('frontend.blog.post_details',compact('post_detail','categories'));
    }
    public function CategoryPost($id){
        $categories = BlogCategory::latest()->get();
        $all_post = AddPost::where('blog_category_id',$id)->get();
        return view('admin.blog.category_post',compact('all_post','categories'));
    }












}
