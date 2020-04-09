@extends('layouts.nav')
<style>
    .form-control{
        box-shadow:none!important;
    }
</style>
@section('content')
<div class=" row mt-5">

    <div class="col-md-8 col-lg-8 offset-md-2">

        <h4 class="text-center bg-dark text-white-50 p-2">Edit your song</h4>
        {!! Form::open(['action' => ['SongsController@update',$song->id], 'method' => 'PUT', 'files' =>'true'] )!!}
          <div class="form-group">
              {{ Form::label('title', 'Title of song') }}
              {{ Form::text('title', $song->name, ['class' => 'form-control']) }}
              @error('title') <li class="text-danger"> {{ $message }}</li> @enderror
          </div>
          <div class="form-group">
            {{ Form::label('year_released', 'year the song was released ') }}
            {{ Form::date('year_released', $song->year_released, ['class' => 'form-control']) }}
            @error('year_released') <li class="text-danger"> {{ $message }}</li> @enderror
        </div>

        <div class="form-group">
            {{ Form::label('music_label', 'music label of singer') }}
            {{ Form::text('music_label', $song->music_label, ['class' => 'form-control']) }}
            @error('music_label') <li class="text-danger"> {{ $message }}</li> @enderror
        </div>
        <div class="form-group">
            {{ Form::label('event', 'Event or Concert it was sang') }}
            {{ Form::text('event', $song->event, ['class' => 'form-control']) }}
            @error('event') <li class="text-danger"> {{ $message }}</li> @enderror
        </div>
          <div class="form-group">
              {{ Form::label('genre', 'Genre of song') }}
              {{ Form::text('genre', $song->genre, ['class' => 'form-control']) }}
              @error('genre') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::label('author', 'Author of song') }}
              {{ Form::text('author', $song->author, ['class' => 'form-control']) }}
              @error('author') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::label('about', 'About this song') }}
              {{ Form::textarea('about', $song->about, ['class' => 'form-control']) }}
              @error('about') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::label('about_author', 'About the Author of this song') }}
              {{ Form::textarea('about_author', $song->about_artist, ['class' => 'form-control']) }}
              @error('about_author') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::label('song', 'Song to be uploaded') }} <br>
              {{ Form::file('song') }}
          <p><b>Name of song:</b> {{$song->name}}</p>
              @error('song') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::label('cover_image', 'cover image of song') }} <br>
              {{ Form::file('cover_image') }} <br>
          <img style="width:85px;height:70px" src="/storage/cover_images/{{$song->cover_image}}" alt="cover image">
              @error('cover_image') <li class="text-danger"> {{ $message }}</li> @enderror

          </div>
          <div class="form-group">
              {{ Form::submit('Upload Song', ['class' => 'btn btn-primary']) }}
          </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
