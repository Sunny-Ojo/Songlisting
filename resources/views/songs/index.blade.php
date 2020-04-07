@extends('layouts.nav')
@section('title',' All songs')
@section('content')

<section class="help-section spad p-4 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title mb-0 ">
						<h5>Need Help to find music? </h5>
					</div>
					<p>Type the name of the song in the search box . </p>
				</div>
				<div class="col-lg-5">
					<div class="d-flex h-85 align-items-right ">
                    <form class="search-form float-right" action="{{route('search')}}" method="GET">
                    <input type="text" name="search" placeholder="Search for a song" value="{{old('search')}}">
                    @error('search') <li class="text-danger">{{$message}}</li> @enderror
                            <button>Search</button>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>
@include('layouts.msg')

        <h2 class="text-center mb-3"><ins>All Songs</ins></h2>

     @if (count($songs)> 0)
         @foreach ($songs as $song)
             <div class="song-item p-3">
				<div class="row">
					<div class="col-lg-4">
                    <a href="/songs/{{$song->id}}">
                   <div class="song-info-box">
							<img src="/storage/cover_images/{{ $song->cover_image }}" alt="">
							<div class="song-info">
								<h4>{{ $song->author }}</h4>
                                <p>{{ $song->name }}</p>

							</div>
                        </div>

                    </a>

                    </div>
                    <div class="col-md-8 col-lg-8 mt-3">
                        <audio src="/storage/songs/{{$song->song}}" controls style="width:90%"></audio>

                    </div>

</div>
</div>

         @endforeach
         {{ $songs->links() }}
     @else
     <div class="jumbotron ">
     <h4 class="float-left text-danger">Sorry, we don't have any song at the moment.. Kindly check back later.</h4> <br>
        <h2 class="text-center text-warning">OR</h2>
        <p class="text-center">You can upload your own songs from <a href="/songs/create">here.</a></p>
     </div>
     @endif

@endsection
