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
                                <div class="header-post__date">{{ $portfolioItem['subtitle'] }}</div>
                                <h1 class="title title--h1">{{ $portfolioItem['title'] }}</h1>
                                <div class="header-post__image-wrap">
                                    <img class="cover lazyload" src="{{ asset($portfolioItem['cover_image']) }}" alt="" />
                                </div>
                            </header>
                            <div class="caption-post">
                                <p>{{ $portfolioItem['description'] }}<p>
                            </div>
                            <div class="gallery-post">
                                @if($portfolioItem['screenshots'] !== null)
                                    @foreach (json_decode($portfolioItem['screenshots']) as $screenshot)
                                        <img class="gallery-post__item cover lazyload" src="{{ asset($screenshot->link) }}" data-zoom alt="" />
                                    @endforeach                                    
                                @endif
                            </div>
                            <div class="caption-post">
                                <h3 class="title title--h3">If you’re not prepared to be wrong, you’ll never come up with anything original.</h3>
                                <p>Here is one of the few effective keys to the design problem: the ability of the designer to recognize as many of the constraints as possible his willingness and enthusiasm for working within these constraints. The most profound technologies are those that disappear. They weave themselves into the fabric of everyday life until they are indistinguishable from it.</p>
                                <blockquote class="block-quote">
                                    <p>The alternative to good design is always bad design. There is no such thing as no design.</p>
                                    <span class="block-quote__author">Adam Judge</span>
                                </blockquote>
                                <p>Above all, think of life as a prototype. We can conduct experiments, make discoveries, and change our perspectives. We can look for opportunities to turn processes into projects that have tangible outcomes.</p>
                                <p>We can learn how to take joy in the things we create whether they take the form of a fleeting experience or an heirloom that will last for generations. We can learn that reward comes in creation and re-creation, no just in the consumption of the world around us. Active participation in the process of creation is our right and our privilege. We can learn to measure the success of our ideas not by our bank accounts by their impact on the world.</p>
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