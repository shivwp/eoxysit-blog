<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Blogs') }}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- ck Editor -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<div class="container-fluid">
  <h1 style="color:red; font-font-weight: bold; margin-top:10px;">Add Blogs Post Details</h1>
 
</div>

<div class="row" style="height:50px; line-height: 50px; margin-top: 30px;">
  <div class="col-sm-3" style="background-color:lavender; border: 1px solid grey; "><a href="blog-dashborad">Blogs Dashborad</a></div>
   <div class="col-sm-3" style="background-color:lavender; border: 1px solid grey; "><a href="{{route('blog.index')}}"> Blogs</a></div>
   <div class="col-sm-3" style="background-color:lavender; border: 1px solid grey; "><a href="{{route('tages.index')}}"> Tages</a></div>
  <div class="col-sm-3" style="background-color:lavender; border: 1px solid grey; "><a href="{{route('categories.index')}}"> Category </a></div>
  </div>
</div>

    <main class="py-4">
        @yield('content')
    </main>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

</body>
</html>