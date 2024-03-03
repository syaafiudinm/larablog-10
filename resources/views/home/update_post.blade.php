<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
      @include('home.homecss')
   </head>
   <body>
    {{-- navbar section start --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-2xl" href="#">Larablog</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
              <a class="nav-link active" href="{{url('/create_post')}}">Create Post</a>
            </div>
          </div>
      </nav>
      {{-- navbar section end --}}

      {{-- actions info --}}
        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
      {{-- actions info --}}

      {{-- update post form start --}}
      <section>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="post_title">Edit Your Post</h1>
                </div>
                <div class="card-body">
                    <form action="{{url('update_mypost_data',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                        <div class="mb-3">
                            <label>Post Title</label>
                            <br>
                            <input type="text" name="title" value="{{$data->title}}" autocomplete="off">
                            @error('name')
                                <span class="text text-danger"></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Post Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$data->description}}</textarea>
                            @error('description')
                            <span class="text text-danger"></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Update image</label>
                            <br>
                            <img src="/postimage/{{$data->image}}" alt="" style="width: 300px; height: 200px; margin-bottom:15px;">
                            <br>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">update!</button>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
      </section>
      {{-- update post form end --}}
   </body>
</html>