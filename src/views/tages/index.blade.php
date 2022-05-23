@extends('blog::layouts.master')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a href="{{route('tages.create') }}" class="btn btn-primary float-right">Create Tages</a>
                </div>

                <div class="card-body">
                    
                   

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tages Name</th>
                                <th>Image</th>
                                <th>Discription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach($tages as $tag)
                            <tr>
                                <td>{{ $tag->title}}</td>
                                <td><img src="{{asset('Images/tages/'.$tag->image)}}" alt="Tag Image" height="150px" width="150px"></td>
                               
                                <td>{!! \Illuminate\Support\Str::limit($tag->discription,100) !!}</td>

                               
                                </td>
                                <td>
                                    <a href="{{url('tages-edit/'.$tag->id)}}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{url('tages-delete/'.$tag->id) }}" method="POST" style="display: inline-block;">
                                       
                                        @csrf
                                        <button class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection