@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')



	<!-- Contact Us Header -->
	<div class="container-fluid p-0" style="margin-top:55px; background: url(img/bg.jpg) repeat;">
		<div style="width: 100%; background-color: rgba(0, 0, 0, 0.5);">
			<div class="container py-4">
				<h1 class="text-white text-center">Contact Us</h1>
				<h3 class="text-center text-white">We'd Love to help you. Ask us Anything...</h3>
			</div>
		</div>
	</div>


	<!-- Contact US form -->
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('success') }}
                </div>
                @endif
				<form class="py-3" action="{{route('contact.store')}}" method="POST">
                    @csrf
					<div class="form-group row">
				    	<label for="name" class="col-3 col-form-label">Your Name</label>
				    	<div class="col-9">
				    		<input type="text" class="form-control" id="email" placeholder="Your Name" name="name">
				    	</div>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
					</div>
					<div class="form-group row">
				    	<label for="email" class="col-3 col-form-label">Your Email</label>
				    	<div class="col-9">
				    		<input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
				    	</div>
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
				  	</div>
					<div class="form-group row">
				    	<label for="subject" class="col-3 col-form-label">Subject</label>
				    	<div class="col-9">
				    		<input type="text" class="form-control" id="subject" placeholder="Message Subject" name="subject">
				    	</div>
                        @error('subject')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
					</div>
					<div class="mb-3 row">
				    	<label class="col-3 col-form-label" for="validationTextarea">Your Message</label>
				    	<div class="col-9">
				      		<textarea rows="5" class="form-control" id="message" placeholder="Write your message here..." name="message"></textarea>
				    	</div>
                        @error('message')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
				    </div>
					<div class="form-group row">
						<div class="col-sm-12">
				    		<button type="submit" class="py-2 px-4 float-right btn btn-primary">Send Message</button>
				    	</div>
					</div>
				</form>
			</div>
			<div class="col-3"></div>
		</div>
	</div>

@endsection
