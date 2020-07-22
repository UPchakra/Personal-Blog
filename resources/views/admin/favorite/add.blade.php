@extends('admin.layouts.admin_design')
@section('siteTitle') Favorite @endsection

@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Favorite
                <small class="text-muted">Welcome to Blog</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"> Favorite</a></li>
                </ul>
            </div>
        </div>
    </div>
       
        
    <div class="container-fluid">
        
        <!-- #END# Basic Examples --> 
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Favorite</strong>  </h2>  
                     

                    </div>
                     
                                                
                   <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th><i class="material-icons">favorite</i></th>
                                   

                                    <th><i class="material-icons">visibility</i></th>
                                    <th>Action</th>

                                    

                                    
                                </tr>
                            </thead>
                           
                            <tbody>
                                 @foreach($posts as $value)
                                <tr>
                                   <td>{{$loop->index+1}}</td>
                                    <td>{{str_limit($value->title,'10')}}</td>
                                    <td>{{$value->user->name}}</td>
                                    <td>{{ $value->favorite_to_users->count()}}</td>

                                    <td>{{$value->view_count}}</td>

                                    <td>
                                         <a href=""class="btn btn-default"><i class="zmdi zmdi-eye"></i></a>

                                        

                                        <a href="javascript:void(0);" rel="{{$value->id}}" rel1="delete-fav" class="btn btn-default  deleteRecord"><i class="zmdi zmdi-delete"></i></a>
                                    </td>

                                  
                                </tr>
                               @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
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
