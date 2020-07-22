@extends('admin.layouts.admin_design')
@section('siteTitle') Category @endsection

@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Category
                <small class="text-muted">Welcome to Blog</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"> Category</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">        
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add Category</strong></h2>
                        
                    </div>
                    <div class="body">
                        <form method="post" action="{{route('editcat',$categories->id)}}" >

                            @csrf
                            <div class="col-md-6">
                            <label for="name">Category Name</label>
                            <div class="form-group">                                
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Category Name" value="{{$categories->name}}">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <label for="image">Image</label>
                            <div class="form-group">
                                    <input type="hidden" name="current_image" value="{{$categories->image}}">

                                <input type="file" id="image" name="image" class="form-control" placeholder="Enter Image" >
                            </div>
                            </div>
                           
                            <input type="submit" class="btn btn-raised btn-primary btn-round waves-effect" value="Save">
                        </form>
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
