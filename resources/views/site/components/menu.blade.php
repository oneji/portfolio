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
        <li class="nav__item"><a href="about.html">About</a></li>
        <li class="nav__item"><a class="{{ Route::currentRouteName() === 'site.resume' ? 'active' : null }}" href="{{ route('site.resume') }}">Resume</a></li>
        <li class="nav__item"><a href="portfolio.html">Portfolio</a></li>
        <li class="nav__item"><a href="contact.html">Contact</a></li>
    </ul>
</div>