<?php

namespace EoxysIT\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EoxysIT\Blog\Models\Category;
use Validation;

class CategoryController extends Controller
{
    public function index(Request $request){

        $categories=Category::orderByDesc('created_at')->get();
       
        return view('blog::category.index',compact('categories'));
    }

    public function create(Request $request){

         $categories=Category::OrderBy('title', 'ASC')->get();
      
       
        return view('blog::category.create',compact('categories'));

       
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg',
            'discription'=>'required|string',
        ]);
        $category = new Category;
        $category->title = $request->title;
        $category->slug = \Str::slug($request->title);
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;
        $category->discription= $request->discription;	

        if ($image = $request->file('image')) {
            $destinationPath = 'Images/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $category->image=$profileImage;
            
             }

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        $category = Category::OrderBy('title', 'ASC')->get();
        return view('blog::category.edit',compact('categories','category'));

   }

    public function update(Request $request){

        

        $validated = $request->validate([
            
             'title'=>'required',
             'image'=> 'required|image|mimes:jpeg,png,jpg',
            'discription'=>'required|string',
           
        ]);
        $category = Category::find($request->id);
      
        $category->title = $request->title;
        $category->slug = \Str::slug($request->title);
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;
        $category->discription= $request->discription;	

        if ($image = $request->file('image')) {
            $destinationPath = 'Images/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $category->image=$profileImage;
            
             }

        $category->save();

        return redirect()->route('categories.index');
        } 

      public function destroy($id){

        
        $categories = Category::find($id);
        $category =$categories->delete();
        return redirect()->route('categories.index');
        
      }
}
