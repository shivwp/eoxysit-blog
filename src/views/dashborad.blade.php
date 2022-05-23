@extends('blog::layouts.master')

@section('content')

<style>
.content{

    margin-left: 400px;
    margin-top: 50px;
}
</style>

<div class="container-fluid">
    <div class="content">
  <h1 style=" color:red;">WellCome To Blog DashBorad   </h1>
  <p  style="center; color:blue;">Add New Bloges Post</p>

  <a href="{{route('blog.index')}}"><button  type="button" class="btn btn-danger"> Add Blogs</button></a>
    </div>
</div>






@endsection