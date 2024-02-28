<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
        @include('admin.css')

        <style>
            .post_title{
              font-size: 30px;
              font-weight: bold;
              text-align: center;
              padding: 10px;
            }
          </style>
  </head>
  <body>
    <header class="header">   
        @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if (session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
        @endif

          <div class="card mt-5">
            <div class="card-header">
                <h1 class="post_title">Edit Post</h1>
            </div>
            <div class="card-body">
                <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Post Title</label>
                        <br>
                        <input type="text" name="title" value="{{$post->title}}" autocomplete="off">
                        @error('name')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Post Description</label>
                        <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
                        @error('description')
                        <span class="text text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Update image</label>
                        <img src="/postimage/{{$post->image}}" alt="" style="width: 70px; height: 70px;">
                        <br>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
      </div>
        {{-- footer section --}}
        @include('admin.footer')
        {{-- footer section end --}}
  </body>
</html>