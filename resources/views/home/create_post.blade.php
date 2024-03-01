<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
      @include('home.homecss')

      <style>
        .width{
            max-width: 500px;
            display: flex;
        }

        .center{
            justify-content: center;
            align-items: center;
        }
        
        .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
          }
      </style>
   </head>
   <body>

    @include('sweetalert::alert')
    
        {{-- @if (session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
        @endif --}}
            <div class="text-center mt-5">
                <h1 class="post-title">Add your Post!</h1>
                <a href="{{url('home')}}" class="btn btn-primary">Back</a>
            </div>

          <div class="container jumbotron mt-5">
              <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
                @csrf

                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>insert your post image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div>


   </body>
</html>