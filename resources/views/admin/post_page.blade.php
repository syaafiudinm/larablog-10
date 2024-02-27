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
            
        </div>
        {{-- footer section --}}
        @include('admin.footer')
        {{-- footer section end --}}
  </body>
</html>