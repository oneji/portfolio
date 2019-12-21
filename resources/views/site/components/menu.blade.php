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
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.home' ? 'active' : null }}" href="{{ route('site.home') }}">About</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.resume' ? 'active' : null }}" href="{{ route('site.resume') }}">Resume</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.portfolio' ? 'active' : null }}" href="{{ route('site.portfolio') }}">Portfolio</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.contact' ? 'active' : null }}" href="{{ route('site.contact') }}">Contact</a></li>
    </ul>
</div>