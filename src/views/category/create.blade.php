@extends('blog::layouts.master')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Create Category
                    <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Back</a>
                </div>

                <div class="card-body">
                    
                   

                    <form action="{{ route('categories.store') }}" method="post" enctype=multipart/form-data>

                    
                        {{ csrf_field() }}

                             
                         <div class="form-group">
                            <label >Category Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" value="{{old('title')}}" required>

                          
                            
                        </div>
                        <div class="form-group">
                            <label for="parent_category">Parent Category:</label>
                            <select class="form-control" name="parent_category">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="Image">Image:</label>
                            <input type="file" class="form-control"  name="image"  required>
                           
                            </div>
                            <div class="form-group">
                                <label><strong>Discription :</strong></label>
                                <textarea class="ckeditor form-control" name="discription" required></textarea>
                                
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection