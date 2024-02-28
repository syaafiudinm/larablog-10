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
        <div class="w-full text-center mt-5 text-2xl">All Post</div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Post
                                    <a href="{{url('/post_page')}}" class="btn btn-primary float-end">Add Post</a>
                                </h4>
                            </div>
                            <div class="card-body">
                               <table class="table table-bordered table-striped">
                                 <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Post By</th>
                                        <th>Post status</th>
                                        <th>User type</th>
                                        <th>Image</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($post as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>{{$post->post_status}}</td>
                                        <td>{{$post->user_type}}</td>
                                        <td>
                                            <img src="postimage/{{$post->image}}" alt="img" style="width: 70px; height: 70px;">
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-success mx-2">Edit</a>
                                            <a href="" class="btn btn-danger" onclick="return confirm('Are ou sure want to delete category?');">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                 </tbody>
                               </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- footer section --}}
        @include('admin.footer')
        {{-- footer section end --}}
  </body>
</html>