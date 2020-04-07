@extends('layouts.nav')
 @section('title', 'song details')
<style>
    p {
        color: black !important;
    }
</style>
@section('content')
	<!-- Player section -->
	<section class="player-section set-bg" data-setbg="{{asset('img/player-bg.jpg')}}">
		<div class="player-box">
            @include('layouts.msg')

			<div class="tarck-thumb-warp">
				<div class="tarck-thumb">
                <img src="{{asset('img/wave-thumb.jpg')}}" alt="">
					{{-- <button onclick="wavesurfer.playPause();" class="wp-play"></button> --}}
				</div>
			</div>
			<au class="wave-player-warp">
				<div class="row">
					<div class="col-lg-8">
						<div class="wave-player-info">
							<h2>{{$songs->author}}</h2>
							<p>{{$songs->name}}</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="songs-links">
							<a href="/download"><img src="{{asset('img/icons/p-2.png')}}" alt="" title="download"></a>
						</div>
					</div>
				</div>
				                      <audio class="ml-2" style="width:90%" src="/storage/songs/{{$songs->song}}" controls></audio>

			</div>
		</div>
	</section>
	<!-- Player section end -->

	<!-- Songs details section -->
	<section class="songs-details-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="song-details-box">
						<h3>Song Details</h3>
						<ul>
							<li><strong>Tags:</strong><span>guitar, piano, music, live, popular</span></li>
							<li><strong>Instruments:</strong><span>guitar, piano, drums, bass</span></li>
							<li><strong>Music Genre:</strong><span>{{$songs->genre}}</span></li>
							<li><strong>Song released on:</strong><span>{{$songs->year_released}}</span></li>
							<li><strong>Music Label of Author:</strong><span>{{$songs->music_label}}</span></li>

                        </ul>
					<p><strong>About this Song:</strong><span> {{$songs->about}}.</span></p>
               </div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="row">
						{{-- <div class="col-lg-6"> --}}
							<div class="song-details-box">
								<h3 class="ml-4">About the Artist</h3>
								<div class="artist-details"  align="center">
									<img src="/storage/cover_images/{{$songs->cover_image}}" alt="">
									<div class="ad-text">
										<h5>{{$songs->author}}</h5>
										<span>Artist/ Songwriter</span>
										<p>{{$songs->about_artist}}. </p>
									</div>
								</div>
							</div>
						{{-- </div> --}}

					{{-- </div> --}}
				</div>
			</div>
		</div>
	</section>
	<!-- Songs details section -->

    <!-- Similar Songs section -->
	<section class="similar-songs-section">
		<div class="container">
			<h3 class="text-center">Other Songs</h3>

              <div class="row">
		        @if(count($otherSongs)> 0)
                        @foreach($otherSongs as $song)

               	<div class="col-xl-4 col-sm-6">
					<div class="similar-song">
                    <img style="height:200px; width:100%" class="ss-thumb" src="/storage/cover_images/{{$song->cover_image}}" alt="">
						<h4>{{ $song->author }}</h4>
                    <p>{{substr($song->name, 0, 28)}} <a href="/songs/{{$song->id}}">.. <i class="fa fa-plus-square"></i></a></p>
                    <audio src="/storage/songs/{{$song->song}}" controls style="width:100%"></audio>
                </div>
					</div>
         	 @endforeach
             @endif
		</div>
		</div>
    </section>


@endsection
