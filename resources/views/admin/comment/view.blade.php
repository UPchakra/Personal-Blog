@extends('admin.layouts.admin_design')
@section('siteTitle') Comments @endsection

@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Comments
                <small class="text-muted">Welcome to Blog</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);"> Comments</a></li>
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
                        <h2><strong>All Comments</strong>  </h2>  
                     

                    </div>
                     
                                                
                   <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Comment Info</th>
                                    <th class="text-center">Post Info</th>
                                    
                                    <th class="text-center">Action</th>

                                    

                                    
                                </tr>
                            </thead>
                           
                            <tbody>
                                 @foreach($comments as $value)
                                <tr>
                                   <td>{{$loop->index+1}}</td>
                                    <td><div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="{{ asset('public/uploads/profile/'.$value->user->image) }}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $value->user->name }} <small>{{ $value->created_at->diffForHumans() }}</small>
                                                        </h4>
                                                        <p>{{ $value->comment }}</p>
                                                        <a target="_blank" href="{{ route('details',$value->post->slug.'#comments') }}">Reply</a>
                                                    </div>
                                                </div></td>
                                             <td> <div class="media">
                                                    <div class="media-right">
                                                        <a target="_blank" href="{{ route('details',$value->post->slug) }}">
                                                            <img class="media-object" src="{{asset('public/uploads/posts/'.$value->post->image) }}" width="64" height="64">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a target="_blank" href="{{ route('details',$value->post->slug) }}">
                                                            <h4 class="media-heading">{{ str_limit($value->post->title,'40') }}</h4>
                                                        </a>
                                                        <p>by <strong>{{ $value->post->user->name }}</strong></p>
                                                    </div>
                                                </div></td>
                                    

                                    <td>
                                        
                                        

                                        <a href="javascript:void(0);" rel="{{$value->id}}" rel1="delete-comment" class="btn btn-default  deleteRecord"><i class="zmdi zmdi-delete"></i></a>
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
