<?php

namespace EoxysIT\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EoxysIT\Blog\Models\Tag;


class TagController extends Controller
{

	 public function index(){

        $tages=Tag::orderByDesc('created_at')->get();
	 	return view('blog::tages.index',compact('tages'));
	 }
     public function create(){
     return view('blog::tages.create');
     }

     public function store(Request $request){

        $validated = $request->validate([
            
             'title'=>'required|unique:tags|max:255',
             'discription'=>'required',
             'image'=> 'required|image|mimes:jpeg,png,jpg',
            
       ]);

        $data=new Tag;
        $data->title=$request->title;
        $data->discription=$request->discription;
        if ($image = $request->file('image')) {
            $destinationPath = 'Images/tages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image=$profileImage;
            
             }

        $data->save();

        return redirect()->route('tages.index');
    }

    public function edit($id)
    {
        $tages = Tag::find($id);
       
        return view('blog::tages.edit',compact('tages'));

   }

     public function update(Request $request){

        

        $validated = $request->validate([
            
             'title'=>'required',
             'discription'=>'required',
             'image'=> 'image|mimes:jpeg,png,jpg',
        ]);
         $data = Tag::find($request->id);
   
        $data->title=$request->title;
        $data->discription=$request->discription;
        
      
        if ($image = $request->file('image')) {
            $destinationPath = 'Images/tages/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data->image=$profileImage;
            
             }

        $data->save();

        return redirect()->route('tages.index');
            }


            public function destroy($id){
                $tages = Tag::find($id);
                $tag =$tages->delete();
                return redirect()->route('tages.index');
            }
}
