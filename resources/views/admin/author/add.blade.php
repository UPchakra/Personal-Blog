@extends('admin.layouts.admin_design')
@section('siteTitle') Post @endsection

@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Post
                <small class="text-muted">Welcome to Post</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"> Post</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">     
     <form method="post" action="{{route('addauthor')}}"  enctype="multipart/form-data" >

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add post</strong></h2>
                        
                    </div>
                    <div class="body">

                            @csrf
                            
                            <div class="form-group">  
                            <label for="title">Title</label>

                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Post Title">
                            </div>
                            
                            <div class="form-group">  
                            <label for="image">Image</label>


                                <input name="image" id="image" type="file" class="form-control" placeholder="Enter image">
                            </div>
                            <div class="form-group">  
                            
                                <input name="status" id="status" type="checkbox" class="fill-in">
                            <label for="status">Public</label>

                            </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6    ">
                <div class="card">
                    <div class="header">
                        <h2><strong>Category And Tags</strong></h2>
                        
                    </div>
                    <div class="body">

                            @csrf
                            <div class="form-group">     

                            <label for="category">category</label>

                               <select class="form-control show-tick" name="categories[]" id="category" multiple>
                                   <option disabled selected>Please Select Category</option>
                                                 @foreach($categories as $value)
                                                     <option value="{{$value->id}}">{{$value->name}}</option>
                                                 @endforeach
                                </select>
                        </div>
                        <div class="form-group">     

                            <label for="tag">Tagss</label>

                               <select class="form-control show-tick" name="tags[]" id="tag" multiple>
                                   <option disabled selected>Please Select tags</option>
                                                 @foreach($tags as $value)
                                                     <option value="{{$value->id}}">{{$value->name}}</option>
                                                 @endforeach
                                </select>
                        </div>


                           
                            <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Save">
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add post</strong></h2>
                        
                    </div>
                    <div class="body">

                            @csrf
                            <div class="col-md-6">
                            <label for="title">Title</label>
                            <div class="form-group">                                
                                <input type="text" id="body" name="body" class="form-control" placeholder="Enter Post Title">
                            </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </form>
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
