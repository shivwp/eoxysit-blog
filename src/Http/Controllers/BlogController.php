<?php

namespace EoxysIT\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EoxysIT\Blog\Models\Blog;
use EoxysIT\Blog\Models\Category;
use EoxysIT\Blog\Models\Tag;


class BlogController extends Controller
{
   
    public function index(){

        $blogs=Blog::orderByDesc('created_at')->get();
        $status= Blog::where('status',0)->first();
        return view('blog::index',compact('blogs','status'));
    }
   
    public function create(){

       $categories=Category::where('parent_id',0)->get();
        $tages=Tag::all();
        return view('blog::add',compact('categories','tages'));
    }

    public function subCat(Request $request)
    {
        $parent_id = $request->cat_id;
         
        $subcategories = Category::where('id',$parent_id)
                              ->with('subcategories')
                              ->get();
                                          
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
    

    public function store(Request $request){


        
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'image'=> 'required|image|mimes:jpeg,png,jpg',
            

        ]);
        $tages = $request->tages;
        $tages = implode(',', $tages);
        $data=new Blog;
        $data->title=$request->title;
        $data->slug=\Str::slug($request->title);
        $data->category=$request->category;
        $data->subcategory=$request->subcategory;
        $data->tages=$tages;
        $data->status=0;
        $data->description=$request->description;
        $data->authername=$request->authername;
       
        if ($image = $request->file('image')) {
            $destinationPath = 'Images/blogs/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image=$profileImage;
            
             }

        $data->save();

        return redirect()->route('blog.index');
    }

     public function edit($id){

         $blogs =Blog::find($id);
         $categories=Category::where('parent_id',0)->get();
         $allsubgcat = Category::where('parent_id',$blogs->category)->get();

         $singlesubcat = Category::where('id',$blogs->subcategory)->first();
         
          $tages = Tag::all();
          $selected = explode(",", $blogs->tages);
          
        return view('blog::edit',compact('blogs','categories','tages','selected','singlesubcat','allsubgcat'));
     }

     public function update(Request  $request){
       

        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image'=> 'image|mimes:jpeg,png,jpg',
          

        ]);  
        $getMonthReq = $request->tages;
        $tages = implode(',', $getMonthReq);
        $data=Blog::find($request->id);
        $data->title=$request->title;
        $data->slug=\Str::slug($request->title);
        $data->category=$request->category;
        $data->subcategory=$request->subcategory;
        $data->tages=$tages;
        $data->status=$request->status;
        $data->description=$request->description;
        $data->authername=$request->authername;
       
        if ($image = $request->file('image')) {
            $destinationPath = 'Images/blogs/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image=$profileImage;
            
             }
        
        $data->save();

        return redirect()->route('blog.index');


     }

      public function destroy($id)
      {
       $bloges = Blog::find($id);
       
        $blog =$bloges->delete();
        return redirect()->route('blog.index');
        
      }
}
