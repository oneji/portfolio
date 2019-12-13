@extends('site.layouts.main')

@section('content')
    <main class="main">
        <div class="container gutter-top">
            <div class="row sticky-parent">
                <!-- Sidebar -->
                @component('site.components.sidebar', [ 'about' => $about ])
                @endcomponent
                <!-- Content -->
                <div class="col-12 col-md-12 col-xl-9">
                    <div class="box">
                        <!-- Menu -->
                        @component('site.components.menu')
                        @endcomponent
                        
                        <!-- About -->
                        <div class="pb-3">
                            <h1 class="title title--h1 title__separate">Contact</h1>
                        </div>
                        
                        <!-- Contact -->
                        <h2 class="title title--h3">Contact Form</h2>
                        
                        @if (Session::has('success'))
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                        @endif
							
                        <form action="{{ route('site.contact.save') }}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row">
				                <div class="form-group col-12 col-md-6">
									<i class="font-icon icon-user"></i>
                                    <input type="text" class="input input__icon form-control" id="name" name="name" placeholder="Full name" required="required" autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')">
								    <div class="help-block with-errors"></div>
				                </div>
				                <div class="form-group col-12 col-md-6">
									<i class="font-icon icon-envelope"></i>
                                    <input type="email" class="input input__icon form-control" id="email" name="email" placeholder="Email address" required="required" autocomplete="on" oninvalid="setCustomValidity('Email is incorrect')" onkeyup="setCustomValidity('')">
								    <div class="help-block with-errors"></div>
				                </div>
				                <div class="form-group col-12 col-md-12">
                                    <textarea class="textarea form-control" id="message" name="message" placeholder="Your Message"  rows="4" required="required" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')"></textarea>
								    <div class="help-block with-errors"></div>
				                </div>
						    </div>
							<div class="row">
				                <div class="col-12 col-md-6 order-2 order-md-1 text-center text-md-left">
					                <div id="validator-contact" class="hidden"></div>
				                </div>
				                <div class="col-12 col-md-6 order-1 order-md-2 text-right">
                                    <button type="submit" class="btn"><i class="font-icon icon-send"></i> Send Message</button>
				                </div>
			                </div>
		                </form>
                    </div>
                    
                    <!-- Footer -->
                    <footer class="footer">© 2019</footer>
                </div>
            </div>
        </div>
    </main>

    <div class="back-to-top"></div>
@endsection