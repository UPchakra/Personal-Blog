@extends('front.layouts.front_design')

@section('Title') {{$posts->title}} @endsection

@section('content')
<div class="main-slider">
		<div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
			data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
			data-swiper-breakpoints="true" data-swiper-loop="true" >
			<div class="swiper-wrapper">

          @foreach($categories as $category)
				<div class="swiper-slide">
					<a class="slider-category" href="#">
						<div class="blog-image"><img src="{{asset('public/uploads/categories/'.$category->image)}}" alt="{{$category->name}}"></div>

						<div class="category">
							<div class="display-table center-text">
								<div class="display-table-cell">
									<h3><b>{{$category->name}}</b></h3>
								</div>
							</div>
						</div>

					</a>
				</div><!-- swiper-slide -->
			@endforeach
				
			</div><!-- swiper-wrapper -->

		</div><!-- swiper-container -->

	</div><

	<section class="post-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 no-right-padding">

					<div class="main-post">

						<div class="blog-post-inner">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('public/uploads/profile/'.$posts->user->image)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$posts->user->name}}</b></a>
									<h6 class="date">{{$posts->created_at->diffForHumans()}}</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><a href="#"><b>{{$posts->title}}</b></a></h3>

							<div class="para">
								{!! html_entity_decode($posts->body)!!}
							</div>

							

							<ul class="tags">
								@foreach($posts->tags as $tag)
								<li><a href="{{route('postbytag',$tag->slug)}}">{{$tag->name}}</a></li>
								@endforeach
							</ul>
						</div><!-- blog-post-inner -->

						<div class="post-icons-area">
							<ul class="post-icons">
								@guest
								<li><a href="javascripts:void(0);"onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{$posts->favorite_to_users->count()}}</a></li>

									@else
									  <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $posts->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$posts->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $posts->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $posts->id }}" method="POST" action="{{ route('addfav',$posts->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
									@endguest
									<li><a href="#"><i class="ion-chatbubble"></i>{{$posts->comments->count()}}</a></li>
									<li><a href="#"><i class="ion-eye"></i>{{$posts->view_count}}</a></li>
							</ul>

							<ul class="icons">
								<li>SHARE : </li>
								<li><a href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="ion-social-twitter"></i></a></li>
								<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
							</ul>
						</div>

						


					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->

				<div class="col-lg-4 col-md-12 no-left-padding">

					<div class="single-post info-area">

						<div class="sidebar-area about-area">
							<h4 class="title"><b>ABOUT AUTHOR</b></h4>
							<p>{{$posts->user->about}}</p>
						</div>

						
						<div class="tag-area">

							<h4 class="title"><b>CATEGORIES</b></h4>
							<ul>
								@foreach($posts->categories as $category)
								<li><a href="{{route('postbycategory',$category->slug)}}">{{$category->name}}</a></li>
								@endforeach
								
							</ul>

						</div><!-- subscribe-area -->

					</div><!-- info-area -->

				</div><!-- col-lg-4 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- post-area -->


	<section class="recomended-area section">
		<div class="container">
				<div class="row">
				@foreach($randomposts as $ran)

				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('public/uploads/posts/'.$ran->image)}}" alt="{{$ran->title}} Image"></div>

							<a class="avatar" href="#"><img src="{{asset('public/uploads/profile/'.$ran->user->image)}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('details',$ran->slug)}}"><b>{{$ran->title}}</b></a></h4>

								<ul class="post-footer">
									@guest
									<li><a href="javascripts:void(0);"onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{$ran->favorite_to_users->count()}}</a></li>

									@else
									  <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $ran->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$ran->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $ran->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $ran->id }}" method="POST" action="{{ route('addfav',$ran->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
									@endguest
									<li><a href="#"><i class="ion-chatbubble"></i>{{$ran->comments->count()}}</a></li>
									<li><a href="#"><i class="ion-eye"></i>{{$ran->view_count}}</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->

				@endforeach
			</div><!-- row -->

		</div><!-- container -->
	</section>

	<section class="comment-section">
		<div class="container">
			<h4><b>POST COMMENT</b></h4>
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="comment-form">
						@guest
						 <p>For post a new comment. You need to login first. <a href="{{ route('adminlogin') }}">Login</a></p>

						@else

						<form method="post" action="{{route('comment',$posts->id)}}">
							@csrf
							<div class="row">


								<div class="col-sm-12">
									<textarea name="comment" rows="2" class="text-area-messge form-control"
										placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
								</div><!-- col-sm-12 -->
								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
						@endguest

					</div><!-- comment-form -->

					<h4><b>COMMENTS({{ $posts->comments()->count() }})</b></h4>
					 @if($posts->comments->count() > 0)
                        @foreach($posts->comments as $comment)

					<div class="commnets-area">

						<div class="comment">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('public/uploads/profile/'.$comment->user->image)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$comment->user->name}}</b></a>
									<h6 class="date">on {{ $comment->created_at->diffForHumans()}}</h6>
								</div>

								<div class="right-area">
									<h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
								</div>

							</div><!-- post-info -->

							<p>{{ $comment->comment }}</p>

						</div>


					</div><!-- commnets-area -->
					@endforeach
					@else

					<div class="commnets-area ">

                        <div class="comment">
                            <p>No Comment yet. Be the first :)</p>
                    </div>
                    </div>

                    @endif

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>
	</section>



@endsection