@extends('blog::layouts.master')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Create category</a>
                </div>

                <div class="card-body">
                    
                   

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->title}}</td>
                                <td>
                                @if ($category->parent_id)
                                        
                                        {{EoxysIT\Blog\Models\Category::where('id',$category->parent_id)->value('title')}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('category-edit/'.$category->id)}}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{url('category-delete/'.$category->id) }}" method="POST" style="display: inline-block;">
                                       
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