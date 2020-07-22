@extends('front.layouts.front_design')

@section('siteTitle') Tags @endsection

@section('content')
	<div class="slider display-table center-text">
		<h1 class="title display-table-cell"><b>{{$tags->name}}</b></h1>
	</div>

<section class="blog-area section">
		<div class="container">

			<div class="row">
				@if($posts->count()>0)

				@foreach($posts as $post)

				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('public/uploads/posts/'.$post->image)}}" alt="{{$post->title}} Image"></div>

							<a class="avatar" href="#"><img src="{{asset('public/uploads/profile/'.$post->user->image)}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('details',$post->slug)}}"><b>{{$post->title}}</b></a></h4>

								<ul class="post-footer">
									@guest
									<li><a href="javascripts:void(0);"onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a></li>

									@else
									  <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('addfav',$post->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
									@endguest
									<li><a href="#"><i class="ion-chatbubble"></i>{{$post->comments->count()}}</a></li>
									<li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->

				@endforeach
				@else
                  <div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							

							

							<div class="blog-info">

								<h4 class="title">
									<strong>Sorry No Post Found :</strong>
								</h4>

								

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
				@endif

				

			</div><!-- row -->


		</div><!-- container -->
	</section><!-- section -->



@endsection
