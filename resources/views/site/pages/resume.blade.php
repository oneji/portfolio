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
                        <div class="pb-3">
                            <h1 class="title title--h1 title__separate">Resume</h1>
                        </div>
                        
                        <!-- Experience -->
                        <div class="pb-0">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="title title--h3"><img class="title-icon" src="{{ asset('icons/icon-education.svg') }}" alt="" /> Education</h2>
                                    <div class="timeline">
                                        <!-- Item -->
                                        @foreach ($education as $educationItem)
                                            <article class="timeline__item">
                                                <h5 class="title title--h5 timeline__title">{{ $educationItem['study_place'] }}</h5>

                                                @if ($educationItem['finish_date'] !== null)
                                                    <span class="timeline__period">
                                                        {{ 
                                                            Carbon\Carbon::parse($educationItem['start_date'])->toFormattedDateString() .' - '. 
                                                            Carbon\Carbon::parse($educationItem['finish_date'])->toFormattedDateString()
                                                        }}
                                                    </span>
                                                @else     
                                                    <span class="timeline__period">{{ Carbon\Carbon::parse($educationItem['start_date'])->toFormattedDateString() .' - Current' }}</span>                                     
                                                @endif

                                                <p class="timeline__description">{{ $educationItem['description'] }}</p>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="col-12 col-lg-6">
                                    <h2 class="title title--h3"><img class="title-icon" src="{{ asset('icons/icon-experience.svg') }}" alt="" /> Experience</h2>
                                    <div class="timeline">
                                        <!-- Item -->
                                        @foreach ($experience as $experienceItem)
                                            <article class="timeline__item">
                                                <h5 class="title title--h5 timeline__title">{{ $experienceItem['occupation'] .', '. $experienceItem['company'] }}</h5>

                                                @if ($experienceItem['finish_date'] !== null)
                                                    <span class="timeline__period">
                                                        {{ 
                                                            Carbon\Carbon::parse($experienceItem['start_date'])->toFormattedDateString() .' - '. 
                                                            Carbon\Carbon::parse($experienceItem['finish_date'])->toFormattedDateString()
                                                        }}
                                                    </span>
                                                @else     
                                                    <span class="timeline__period">{{ Carbon\Carbon::parse($experienceItem['start_date'])->toFormattedDateString() .' - Current' }}</span>                                     
                                                @endif

                                                <p class="timeline__description">{{ $experienceItem['job_description'] }}</p>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Skills -->
                        <div class="box-inner box-inner--rounded">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="title title--h3">Design Skills</h2>
                                    <div class="box box__second">
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>Web Design</span><span>80%</span></div>
                                            </div>
                                            <div class="progress-text"><span>Web Design</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>Graphic Design</span><span>75%</span></div>
                                            </div>
                                            <div class="progress-text"><span>Graphic Design</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>Photoshop</span><span>90%</span></div>
                                            </div>
                                            <div class="progress-text"><span>Photoshop</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>Illustrator</span><span>50%</span></div>
                                            </div>
                                            <div class="progress-text"><span>Illustrator</span></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                                    <h2 class="title title--h3">Coding Skills</h2>
                                    <div class="box box__second">
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>WordPress</span><span>70%</span></div>
                                            </div>
                                            <div class="progress-text"><span>WordPress</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>Javascript</span><span>70%</span></div>
                                            </div>
                                            <div class="progress-text"><span>Javascript</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>HTML</span><span>100%</span></div>
                                            </div>
                                            <div class="progress-text"><span>HTML</span></div>
                                        </div>
                                        
                                        <!-- Progress -->
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-text"><span>PHP</span><span>30%</span></div>
                                            </div>
                                            <div class="progress-text"><span>PHP</span></div>
                                        </div>
                                    </div>
                                </div>
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