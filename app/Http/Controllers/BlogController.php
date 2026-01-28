<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
  public function getBlog(){
    $users = DB::table('blog')->select('id','title','content','created_at')->get();
    return view('blog', ['post' => $users]);
  }
  public function getBlogPost($id){

    $post= DB::table('blog')->select('id','title','content','created_at')->where('id', $id)->get();
    return view('blogPost', ['post' => $post]);
  }

  public function addBlogPost(){
    return view('blogAdd');
  } 

  public function saveBlogPost(Request $request){
    $title = $request->input('title');
    $content = $request->input('content');
    DB::table('blog')->insert([
      'title' => $title,
      'content' => $content,
      'created_at' => now(),
      'updated_at' => now()
    ]);
    return redirect()->route('blog.index');
  }
}
