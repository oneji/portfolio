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
                        
                        <div class="pb-3">
                            <header class="header-post">
                                <div class="header-post__date">{{ $portfolioItem['subtitle_'.App::getLocale()] }}</div>
                                <h1 class="title title--h1">{{ $portfolioItem['title_'.App::getLocale()] }}</h1>
                                <div class="header-post__image-wrap">
                                    <img class="cover lazyload" src="{{ asset($portfolioItem['cover_image']) }}" alt="" />
                                </div>
                            </header>
                            <div class="caption-post">
                                {!! $portfolioItem['description_'.App::getLocale()] !!}
                            </div>
                            <div class="gallery-post">
                                @if($portfolioItem['screenshots'] !== null)
                                    @foreach (json_decode($portfolioItem['screenshots']) as $screenshot)
                                        <img class="gallery-post__item cover lazyload" src="{{ asset($screenshot->link) }}" data-zoom alt="" />
                                    @endforeach                                    
                                @endif
                            </div>
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