@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  Edit Tages
                    <a href="{{ route('tages.index') }}" class="btn btn-primary float-right">Back</a>
                </div>

                <div class="card-body">
                    
                   

                    <form action="{{ route('tages.update') }}" method="POST" enctype=multipart/form-data>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$tages->id}}" >
                        <div class="form-group">
                            <label >Add Tag:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="title" value="{{$tages->title}}">
                          
                           </div>
                           <div class="form-group">
                            <label for="Image">Image:</label>
                            <input type="file" class="form-control"  name="image"  value="{{$tages->image}}">
                           
                            </div>
                       
                            <div class="form-group">
                                <label><strong>Discription :</strong></label>
                                <textarea class="ckeditor form-control" name="discription">{!! $tages->discription !!}</textarea>
                                
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection