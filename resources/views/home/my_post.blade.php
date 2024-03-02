<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
      @include('home.homecss')

      <style>

        .center{
            justify-content: center;
            align-items: center;
        }
      </style>
   </head>
   <body>
    
         
        <!-- Navbar content -->
        {{-- <div class="container">
          <div class="d-flex bd-highlight mb-3 mt-5">
            <a href="{{url('home')}}" class="mr-auto p-4 bd-highlight btn btn-primary" style="font-size: 15px;">Back To Home</a>
            <div class="p-2 bd-highlight ml-auto" style="font-size: 30px">{{$data->name}}details</div>
          </div>
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand text-2xl" href="#">Navbar</a>
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

          

        <div class="container mt-5">
            <div class="container">
                <h1 class="text-center">your post!</h1>
              </div>
            <div class="row mr-5 ml-5 mt-5">
                @foreach ($data as $data)
                    <div class="col-sm">
                      <div class="card mb-3 mt-10">
                        <img src="/postimage/{{$data->image}}" style="max-height: 400px;" class="object-fit-cover" alt="">
                        <div class="card-body">
                          <h5 class="card-title">{{$data->title}}</h5>
                          <p class="card-text">{{$data->description}}</p>
                          <p class="card-text"><small class="text-body-secondary">post by {{$data->name}}</small></p>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
      <!-- header section start -->
         <!-- banner section start -->
         {{-- @include('home.banner') --}}
         <!-- banner section end -->

      
      <!-- header section end -->
      <!-- services section start -->
      {{-- @include('home.service') --}}
      <!-- services section end -->
      <!-- about section start -->
      {{-- @include('home.about') --}}
      <!-- about section end -->
      <!-- footer section start -->
      {{-- @include('home.footer')     --}}
   </body>
   
</html>