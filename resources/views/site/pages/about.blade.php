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
                    <div class="box pb-0">
                        <!-- Menu -->
                        @component('site.components.menu')
                        @endcomponent
                        
                        <!-- About -->
						<div class="pb-0 pb-sm-2">
                            <h1 class="title title--h1 title__separate">{{ __('pages.about') }}</h1>
                            <p>{{ $about['description_'.App::getLocale()] }}</p>
                        </div>
                        
                        <!-- What -->
						<div class="box-inner pb-0">
						    <h2 class="title title--h3">What I'm Doing</h2>
							<div class="row">
							    <!-- Case Item -->
							    <div class="col-12 col-lg-6">
							        <div class="case-item box box__second">
									    <img class="case-item__icon" src="{{ asset('icons/icon-design.svg') }}" alt="" />
										<div>
									        <h3 class="title title--h5">Web Design</h3>
										    <p class="case-item__caption">The most modern and high-quality design made at a professional level.</p>
										</div>	
									</div>
								</div>
								
								<!-- Case Item -->
								<div class="col-12 col-lg-6">
							        <div class="case-item box box__second">
									    <img class="case-item__icon" src="{{ asset('icons/icon-dev.svg') }}" alt="" />
										<div>
									        <h3 class="title title--h5">Web Development</h3>
										    <p class="case-item__caption">High-quality and professional development of sites at the professional level.</p>
										</div>
									</div>
								</div>
								
								<!-- Case Item -->
								<div class="col-12 col-lg-6">
								    <div class="case-item box box__second">
								        <img class="case-item__icon" src="{{ asset('icons/icon-app.svg') }}" alt="" />
										<div>
								            <h3 class="title title--h5">Mobile Apps</h3>
									        <p class="case-item__caption">Professional development of applications for iOS and Android.</p>
										</div>
								   </div>
								</div>
								
								<!-- Case Item -->
								<div class="col-12 col-lg-6">
								    <div class="case-item box box__second">
									    <img class="case-item__icon" src="{{ asset('icons/icon-photo.svg') }}" alt="" />
										<div>
									        <h3 class="title title--h5">Photography</h3>
										    <p class="case-item__caption">I make high-quality photos of any category at a professional level.</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
                    </div>
                    
                    <!-- Footer -->
                    <footer class="footer">© {{ now()->year }}</footer>
                </div>
            </div>
        </div>
    </main>

    <div class="back-to-top"></div>
@endsection