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
      </style>
   </head>
   <body>
    
        <!-- Navbar content -->
        <div class="container">
          <div class="d-flex bd-highlight mb-3 mt-5">
            <a href="{{url('home')}}" class="mr-auto p-4 bd-highlight btn btn-primary" style="font-size: 15px;">Back To all Post</a>
            <div class="p-2 bd-highlight ml-auto" style="font-size: 30px">{{$post->title}} details</div>
          </div>
        </div>
        

      <!-- header section start -->
      <div class="container">
          <div class="jumbotron">
            <div class="card mb-3 mt-10">
              <img src="/postimage/{{$post->image}}" style="max-height: 400px;" class="object-fit-cover" alt="">
              <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text"><small class="text-body-secondary">post by {{$post->name}}</small></p>
              </div>
            </div>
            </div>
      </div>
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