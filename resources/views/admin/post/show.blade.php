@extends('admin.layouts.admin_design')
@section('siteTitle') Blog Details @endsection

@section('content')


<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Blog Detail
                    <small>Welcome to Blog</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('viewpost')}}">Post</a></li>
                    <li class="breadcrumb-item active">Blog Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5"><a href="blog-details.html">{{$posts->title}}</a></h3>
                        <ul class="meta">
                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: {{$posts->user->name}}</a></li>
                            <li></i>on {{$posts->created_at->toFormattedDateString()}}</li>
                        </ul>
                    </div>                    
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="{{ asset('public/uploads/posts/'.$posts->image) }}" alt="Awesome Image">
                            <div class="social_share">                            
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-instagram"></i></button>
                            </div>
                        </div>
                        <p>{{$posts->body}}</p>
                    </div>
                          <a href="{{route('viewpost')}}" class="btn btn-danger wave-effect">BACK</a>

                </div>
                
             
            </div>
            <div class="col-lg-4 col-md-12 right-box">
                <div class="card">
                    <div class="body ">
                        
                      @if($posts->Is_approved==0)
                      <a href="{{route('approve',$posts->id)}}" class="btn btn-success waves-effect "  >
                        <i class="material-icons">done</i>  
                          <span>Approve</span>
                      </a>
                      @else
                             <button type="button" class="btn  btn-success" disabled>
                         <i class="material-icons">done</i> 
                          <span>Approved</span>
                          </button>
               
                          @endif
                        </div>
                   
                </div>
                <div class="card">
                    <div class="header bg-cyan">
                        <h2><strong>Categories</strong> </h2>                        
                    </div>
                    <div class="body widget popular-post">
                        @foreach($posts->categories as $value)
                        <span class="label bg-cyan">{{$value->name}}</span>
                        @endforeach
                    </div>
                </div>                
                <div class="card">
                    <div class="header bg-amber">
                        <h2><strong>Tag</strong> </h2>                        
                    </div>
                    <div class="body widget tag-clouds">
                        @foreach($posts->tags as $value)
                        <span class="tag badge badge-success">{{$value->name}}</span>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}">
@endsection
@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>

    
 
   <script src="{{ asset('public/adminAssets/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/adminAssets/assets/js/jquery.sweet-alert.custom.js') }}"></script>

    <script>
       
        @if(session('flash_message'))
        toastr.success("{{ Session::get('flash_message') }}");
        @endif

        @if(session('flash_check'))
        toastr.info("{{ Session::get('flash_check') }}");
        @endif

        @if(session('flash_error'))
        toastr.warning("{{ Session::get('flash_error') }}");
        @endif

        @if(session('flash_delete'))
        toastr.error("{{ Session::get('flash_delete') }}");
        @endif
    </script>

  

@endsection