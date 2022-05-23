<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       


    <title>Blogs</title>
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
<div class="container">
<div class="row">
<div class="col-8 ">Edit Blog</div>
</div>


    <form action="{{url('blog-update')}}" method="POST" enctype="multipart/form-data">
        @csrf
    
      <input type="hidden" name="id" value="{{$blogs->id}}">
    
    <div class="form-group">   
    <div class="col-8">
    <label>Blog Name</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Your Blog Title" value="{{$blogs->title}}" required>
    </div>
    </div>
    <div class="form-group">
<div class="col-8">
   <label>Category</label>
  <select class="form-control" name="category" id="category">
  
   @foreach($categories as $cat)
    <option value="{{$cat->id }}" {{$cat->id  ? 'selected' : '' }}>{{$cat->title}}</option>
  @endforeach
   </select>
</div>
</div>
<div class="form-group">
<div class="col-8">
   <label>Sub Category</label>
     <select class="browser-default custom-select" name="subcategory" id="subcategory" >
      @foreach($allsubgcat as $key => $val)
      <option value="{{$val->id}}" {{isset($singlesubcat) && ($singlesubcat->id == $val->id) ? 'selected' :''}}>{{$val->title}} </option>
      @endforeach
      </select>
</div>
</div>

<div class="form-group">   
<div class="col-8">
<label>Add Tag</label>
<select class="js-example-basic-single form-control" multiple="multiple" name="tages[]" id="tages">
  @foreach($tages as $tag)
  <option value="{{$tag->id}}" {{ (in_array($tag->id, $selected)) ? 'selected' : '' }}>{{$tag->title}}</option>
  @endforeach
</select>

</div>
</div>

<div class="form-group">   
<div class="col-8">
<label>Image</label>
<input type="file" name="image"   value="{{$blogs->image}}">
</div>
</div>

<div class="form-group">   
<div class="col-8">
<label>Auther Name</label>
<input type="text" name="authername" class="form-control" placeholder="Enter Auther Name" value="{{$blogs->authername}}" required>
</div>
</div>
<div class="form-group">
<div class="col-8">
<label><strong>Description :</strong></label>
<textarea class="ckeditor form-control" name="description" >{!!$blogs->description!!}</textarea>
</div>
</div>
<div class="form-group">
<label for="description">Status</label><br/>
<label class="radio-inline"><input type="radio" name="status" value="1" {{ (old('status') == '1') ? 'checked' : ''}}>Enable</label>
<label class="radio-inline"><input type="radio" name="status" value="0" {{ (old('status') == '0') ? 'checked' : ''}}>Disable</label>
</div>

    <div class="form-group text-center">
      <button type="submit" class="btn btn-success btn-sm">Update</button>
      </div>
    </div>
  


    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 
                <script type="text/javascript">
                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $(document).ready(function () {
                $('#category').on('change',function(e) {
                var cat_id = e.target.value;
                $.ajax({
                url:"{{ route('subcat') }}",
                type:"POST",
                data: {
                cat_id: cat_id
                },
                success:function (data) {
                $('#subcategory').empty();
                $.each(data.subcategories[0].subcategories,function(index,subcategory){
                $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                })
                }
                })
                });
                });
                </script>


        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });

            
        </script>
        
        
</body>
</html>