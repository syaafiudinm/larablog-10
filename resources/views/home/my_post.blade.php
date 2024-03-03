<!DOCTYPE html>
<html lang="en">
   <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
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
      @include('sweetalert::alert')
         
        <!-- Navbar content -->
        {{-- <div class="container">
          <div class="d-flex bd-highlight mb-3 mt-5">
            <a href="{{url('home')}}" class="mr-auto p-4 bd-highlight btn btn-primary" style="font-size: 15px;">Back To Home</a>
            <div class="p-2 bd-highlight ml-auto" style="font-size: 30px">{{$data->name}}details</div>
          </div>
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand text-2xl" href="{{url('/')}}">Larablog</a>
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

          
          @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
          @endif
        <div class="container mt-5">
            <div class="container">
                <h1 class="text-center">your post!</h1>
              </div>
              <div class="row mr-5 ml-5 mt-5">
              @foreach ($data as $index => $post)
                @if ($index % 2 == 0)
                  <div class="w-100"></div> <!-- Menutup div sebelumnya dan membuka div baru setiap dua kali iterasi -->
                @endif
                <div class="col-sm">
                  <div class="card mb-3 mt-10">
                    <img src="/postimage/{{$post->image}}" style="max-height: 200px;" alt="img">
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                      <p class="card-text">{{$post->description}}</p>
                      <p class="card-text"><small class="text-body-secondary">post by {{$post->name}}</small></p>
                      <a href="{{url('my_post_del',$post->id)}}" class="btn btn-danger" onclick="confirmation(event)">delete Post</a>
                      <a href="{{url('update_post',$post->id)}}" class="btn btn-success">Update</a>
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
      <script type="text/javascript">

        function confirmation(ev)
        {
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
        title: "Are you sure to Delete this post",
        text: "You will not be able to revert this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCancel) => {
        if (willCancel) {

            window.location.href = urlToRedirect;
           
        }  


    });
        }

    </script>
   </body>
   
</html>