@extends('layouts.nav')

@section('title', 'Song listing | Contact Us')

@section('content')
<div class="  mt-4">
<div class="row">

    				<div class="col-lg-12 p-0">
					<div class="contact-warp">
						<div class="section-title mb-0">
							<h2>Get in touch</h2>
						</div>
						<p>Here you can contact us and we'll respond as quick as we can. if you see any detail about any song that
                            is not correct please let us know as well.. </p>

						<form class="contact-from" action="{{ route('storecontacts') }}" method="POST">
							<div class="row">
								<div class="col-md-6">
                                    @csrf
                                @error('name')  <li class="text-danger">{{ $message }}</li> @enderror

                                    <input type="text" name="name" placeholder="Your name">
								</div>
								<div class="col-md-6">
                                @error('email')  <li class="text-danger">{{ $message }}</li> @enderror
                                    <input type="text" placeholder="Your e-mail" name="email">
								</div>
								<div class="col-md-12">
                                                                     @error('subject')  <li class="text-danger">{{ $message }}</li> @enderror
                                <input type="text" name="subject" placeholder="Subject">
                                   @error('message')  <li class="text-danger">{{ $message }}</li> @enderror

                                    <textarea placeholder="Message" name="message"></textarea>

									<button class="site-btn mt-3">send message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
</div>
</div>
@endsection
