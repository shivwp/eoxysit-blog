@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Create Tages
                    <a href="{{ route('tages.index') }}" class="btn btn-primary float-right">Back</a>
                </div>

                <div class="card-body">
                    
                   

                    <form action="{{ route('tages.store') }}" method="POST" enctype=multipart/form-data>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label >Add Tag:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" required>
                          
                           </div>
                           <div class="form-group">
                            <label for="Image">Image:</label>
                            <input type="file" class="form-control"  name="image" required>
                           
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