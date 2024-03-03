<!DOCTYPE html>
<html>
  <head> 
        @include('admin.css')
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
            <div class="container mt-5">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, Admin!</h1>
                    <p class="lead">This is an Admin Page, a simple page where admin can control the post whether is an admin or an user post!</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="{{url('/')}}" role="button">see All post!</a>
                </div>
            </div>
        </div>

        {{-- footer section --}}
        @include('admin.footer')
        {{-- footer section end --}}
  </body>
</html>