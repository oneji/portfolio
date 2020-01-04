<!-- Menu -->
<div class="circle-menu">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>
<div class="inner-menu js-menu">
    <ul class="nav">
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.home' ? 'active' : null }}" href="{{ route('site.home') }}">{{ __('pages.about') }}</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.resume' ? 'active' : null }}" href="{{ route('site.resume') }}">{{ __('pages.resume') }}</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.portfolio' ? 'active' : null }}" href="{{ route('site.portfolio') }}">{{ __('pages.portfolio') }}</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.contact' ? 'active' : null }}" href="{{ route('site.contact') }}">{{ __('pages.contact') }}</a></li>
    </ul>
</div>