@extends('blog::layouts.master')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   Bloges
                    <a href="{{ route('blog.create') }}" class="btn btn-primary float-right">Add Blog</a>
                </div>

                <div class="card-body">
                    
                   

                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Blog</th>
                                <th>Auther Name</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title}}</td>
                                <td>{{ $blog ->authername}}</td>
                                <td><img src="{{asset('Images/blogs/'.$blog->image)}}" alt="Blog Image" height="200" ></td>
                                
                                <td>@if($blog ->status == 0)  Disable @else Enable @endif
                                 <td>
                                    <a href="{{url('blog-edit/'.$blog->id)}}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{url('blog-delete/'.$blog->id)}}" method="POST" style="display: inline-block;">
                                       
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