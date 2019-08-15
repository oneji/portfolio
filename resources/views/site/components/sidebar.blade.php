<!-- Sidebar -->
<aside class="col-12 col-md-12 col-xl-3">
    <div class="sidebar box pb-0 sticky-column">
        <img class="avatar avatar--180" src="{{ '/'.$about['photo'] }}" alt="Photo">
        <div class="text-center">
            <h3 class="title title--h3 sidebar__user-name"><span class="weight--500">{{ $about['first_name'] }}</span> {{ $about['last_name'] }}</h3>
            <div class="badge badge--gray">{{ $about['dev_status'] }}</div>
            
            <!-- Social -->
            <div class="social">
                <a class="social__link" href="https://www.facebook.com/"><i class="font-icon icon-facebook"></i></a>
                <a class="social__link" href="https://www.linkedin.com/"><i class="font-icon icon-linkedin2"></i></a>
            </div>
        </div>
        
        <div class="sidebar__info box-inner box-inner--rounded">
            <ul class="contacts-block">
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Birthday">
                    <i class="font-icon icon-calendar"></i> {{ $about['birthday'] }}
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Address">
                    <i class="font-icon icon-location"></i> {{ $about['residence'] }}
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="E-mail">
                    <a href="mailto:{{ $about['email'] }}"><i class="font-icon icon-envelope"></i>{{ $about['email'] }}</a>
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Phone">
                    <i class="font-icon icon-phone"></i> {{ $about['phone'] }}
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Skype">
                    <a href="skype:{{ $about['skype'] }}"><i class="font-icon icon-skype"></i>{{ $about['skype'] }}</a>
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="WeChat">
                    <i class="font-icon icon-envelope"></i>{{ $about['wechat'] }}
                </li>
            </ul>
            @if ($about['cv'] !== null)
                <a href="{{ route('admin.cv.download') }}" class="btn btn--blue-gradient" href="#"><i class="font-icon icon-download"></i> Download CV</a>
            @endif
        </div>
    </div>	
</aside>