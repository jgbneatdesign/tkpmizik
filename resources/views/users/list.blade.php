@foreach ($users as $user)

<a
    href="{{ $user->url }}"
    class="list-group-item">
	 	<div class="row">
	 		<div class="col-xs-4">

	 			@if ($user->image)

	 			<img
	 				src="{{ TKPM::asset($user->image, 'thumbs') }}"
	 				class="pull-left img-thumbnail img-responsive">
	 			@else

	 				<h3 class="list-group-item-heading text-center">
	 					<i class="fa fa-user fa-2x"></i>
	 				</h3>

	 			@endif
	 		</div>
	 		<div class="col-xs-8">
  			<h4 class="list-group-item-heading">{{ $user->firstname }}</h4>
  			<p class="list-group-item-text">
  				gen {{ $user->musics_count }}
  				<span class="visible-xs-inline">
  					Mizik
  				</span>
  				<i class="fa fa-music"></i>
  				ak {{ $user->videos_count }}
  				<span class="visible-xs-inline">
  					Videyo
  				</span>
  				<i class="fa fa-video-camera"></i>
  			</p>
  		</div>
  	</div>
</a>

@endforeach