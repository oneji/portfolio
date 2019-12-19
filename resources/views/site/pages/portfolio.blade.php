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
                            <h1 class="title title--h1 title__separate">Portfolio</h1>
                        </div>
                        
                        <!-- News -->
						<div class="news-grid pb-0">
							@foreach ($portfolioItems as $portfolioItem)
								<!-- Post -->
								<article class="news-item box">
									<div class="news-item__image-wrap overlay overlay--45">
										<a class="news-item__link" href="{{ route('site.portfolio.item', [ 'slug' =>  $portfolioItem['slug'] ]) }}"></a>
										<img class="cover lazyload" src="{{ asset($portfolioItem['cover_image']) }}" alt="" />
									</div>
									<div class="news-item__caption">
										<h2 class="title title--h4">{{ $portfolioItem['title'] }}</h2>
										<p>{{ $portfolioItem['subtitle'] }}</p>
									</div>
								</article>
							@endforeach
						</div>
                    </div>
                    
                    <!-- Footer -->
                    <footer class="footer">© 2019</footer>
                </div>
            </div>
        </div>
    </main>

    <div class="back-to-top"></div>
@endsection