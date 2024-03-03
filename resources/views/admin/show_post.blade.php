<!DOCTYPE html>
<html>
  <head> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
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
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif
        <div class="w-full text-center mt-5 text-2xl">All Post</div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col md-12">
                        <div class="card">
                            <div class="card-header">
                                    <a href="{{url('/post_page')}}" class="btn btn-primary float-end">Add Post</a>
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
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($post as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->name}}</td>
                                        <td>{{$post->post_status}}</td>
                                        <td>{{$post->usertype}}</td>
                                        <td>
                                            <img src="postimage/{{$post->image}}" alt="img" style="width: 70px; height: 70px;">
                                        </td>
                                        <td>
                                            <a href="{{url('edit_page', $post->id)}}" class="btn btn-success mx-2">Edit</a>
                                            <a href="{{url('/delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{url('accept_post',$post->id)}}" class="btn btn-info" onclick="return confirm('are you sure want to accept the post?')">accept</a>
                                            <a href="{{url('reject_post',$post->id)}}" class="btn btn-secondary" onclick="return confirm('are you sure want to reject the post?')">Reject</a>
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