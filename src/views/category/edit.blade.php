@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Category
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right"> Back</a>
                </div>

                <div class="card-body">
                    
                
             
                 <form action="{{route('categories.update')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{$categories->id}}">
                        
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="name" class="form-control"  name="title" value="{{ $categories->title }}" required>
                           
                        </div>
                        <div class="form-group">
                            <label for="pwd">Parent Category:</label>
                            <select class="form-control" name="parent_category">
                                <option>Select a category</option>
                                @foreach($category as $category)
                               
                                <option value="{{ $category->id}}" {{$category->id  ? 'selected' : '' }}>{{$category->title}}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    

                        <div class="form-group">
                            <label for="Image">Image:</label>
                            <input type="file" class="form-control"  name="image" value="{{$category->Image}}" >
                           
                        </div>
                      
                        <div class="form-group">
                                <label><strong>Discription :</strong></label>
                                <textarea class="ckeditor form-control" name="discription" required>{!! $category->discription !!}</textarea>
                                
                            </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection