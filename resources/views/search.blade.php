
@extends('layouts.nav')
 @section('title', 'Search results')
<style>
    p {
        color: black !important;
    }
</style>
@section('content')
	<!-- Player section -->
	<div class="p-4">

<section class="help-section spad pt-0">
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

<h2 class="text-center mb-3"><b> Search Results for </b><ins class="text-warning">{{$query}}</ins></h2>
@include('layouts.msg')
     @if (count($song)> 0)
         @foreach ($song as $song)
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
         {{-- {{ $song->links() }} --}}
     @endif
     <section class="  ">
		<div class="container-fluid">
			     <hr class="bg-dark">
<h3 class="text-center mb-4">Other Songs</h3>

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

    </div>


@endsection
