@if(isset($posts) && !empty($posts[0]->user_id))
	@foreach($posts as $post)
		<div class="row justify-content-center" style="padding-top: 5px; padding-bottom: 5px;">
			<div class="col-md-8">
				<div class="card" style="padding: 15px;">
					<div class="panel">
						<div class="panel-heading">
							<a href="{{Route('profile_action',$post->user_id)}}">{{ __($post->name) }}</a>
						</div>

						<div class="panel-body">
							{{ $post->post }}
						</div>

						<div class="panel-footer ">
							<div class="row">
								<div class="col-sm-2">
                                    <form id="like-form" action="{{ route('like_action') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="r_button">{{(($post->total_like ) ?'( '.$post->total_like.' )' :'')}}Like</button>
                                    </form>
								</div>
								<div class="col-sm-2">
                                    <form action="{{ route('comment_action') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="r_button">Comment</button>
                                    </form>
								</div>
								<div class="col-sm-2">
                                    <form action="{{ route('share_action') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <button type="submit" class="r_button">Share</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@else
	<div class="row justify-content-center" style="padding-top: 5px; padding-bottom: 5px;">
		<div class="col-md-8">
			<div class="card" style="padding: 15px;">
				<div class="panel">
					<center>Oh, You haven't any story.</center>
				</div>
			</div>
		</div>
	</div>
@endif