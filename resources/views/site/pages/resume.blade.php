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
                            <h1 class="title title--h1 title__separate">{{ __('pages.resume') }}</h1>
                        </div>
                        
                        <!-- Education -->
                        <div class="pb-0">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h2 class="title title--h3"><img class="title-icon" src="{{ asset('icons/icon-education.svg') }}" alt="" /> {{ __('headings.education') }}</h2>
                                    <div class="timeline">
                                        <!-- Item -->
                                        @foreach ($education as $educationItem)
                                            <article class="timeline__item">
                                                <h5 class="title title--h5 timeline__title">{{ $educationItem['study_place_'.App::getLocale()] }}</h5>

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

                                                <p class="timeline__description">{{ $educationItem['description_'.App::getLocale()] }}</p>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="col-12 col-lg-6">
                                    <h2 class="title title--h3"><img class="title-icon" src="{{ asset('icons/icon-experience.svg') }}" alt="" /> {{ __('headings.experience') }}</h2>
                                    <div class="timeline">
                                        <!-- Item -->
                                        @foreach ($experience as $experienceItem)
                                            <article class="timeline__item">
                                                <h5 class="title title--h5 timeline__title">{{ $experienceItem['occupation_'.App::getLocale()] .', '. $experienceItem['company_'.App::getLocale()] }}</h5>

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

                                                <p class="timeline__description">{{ $experienceItem['job_description_'.App::getLocale()] }}</p>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Skills -->
                        <div class="box-inner box-inner--rounded">
                            <div class="row">
                                
                                <div class="col-12 col-lg-12 mt-4 mt-lg-0">
                                    <h2 class="title title--h3">{{ __('headings.codingSkills') }}</h2>
                                    <div class="box box__second">
                                        @foreach ($skills as $skill)
                                            <div class="skill-item btn btn--blue-gradient" href="#"></i>{{ $skill['skill_name'] }}</div>
                                        @endforeach                                        
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