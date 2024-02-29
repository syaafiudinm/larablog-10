<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Blog Post</h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row">
            
            @foreach ($post as $post)
            <div class="col-md-4">
               <div class="card border-dark" style="width: 18rem;">
                 <img src="/postimage/{{$post->image}}" class="card-img-top" alt="" style="height: 150px;">
                 <div class="card-body">
                   <h5 class="card-title">{{$post->title}}</h5>
                   <p class="card-text mb-3">{{$post->description}}</p>
                   <p class="card-text"><small class="text-body-secondary mb-5">Post By {{$post->name}}</small></p>
                   <a href="{{url('post_details', $post->id)}}" class="btn btn-primary">Read More</a>
                 </div>
               </div>
            </div>
            @endforeach

          </div>
       </div>
    </div>
 </div>