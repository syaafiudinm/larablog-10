<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')

        <style>
          .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
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
            <h1 class="post_title">Add Post</h1>

            <div class="card">
              <div class="card-header">
                  <a href="{{url('show_post')}}" class="btn btn-success">Back</a>
              </div>
              <div class="card-body">
                  <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-3">
                          <label>Post Title</label>
                          <br>
                          <input type="text" class="form-control" name="title" value="{{old('name')}}" autocomplete="off">
                          @error('name')
                              <span class="text text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label>Post Description</label>
                          <textarea name="description" class="form-control" rows="3">{{old('name')}}</textarea>
                          @error('description')
                          <span class="text text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="">Add image</label>
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