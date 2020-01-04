<!-- Sidebar -->
<aside class="col-12 col-md-12 col-xl-3">
    <div class="sidebar box pb-0 sticky-column">
        <img class="avatar avatar--180" src="{{ asset($about['photo']) }}" alt="Photo">
        <div class="text-center">
            <h3 class="title title--h3 sidebar__user-name"><span class="weight--500">{{ $about['first_name_'.App::getLocale()] }}</span> {{ $about['last_name_'.App::getLocale()] }}</h3>
            <div class="badge badge--gray">{{ $about['dev_status_'.App::getLocale()] }}</div>
            
            <!-- Social -->
            <div class="social">
                <a class="social__link" href="{{ $about['facebook'] }}" target="_blank"><i class="font-icon icon-facebook"></i></a>
                <a class="social__link" href="{{ $about['linkedin'] }}" target="_blank"><i class="font-icon icon-linkedin2"></i></a>
                <a class="social__link" href="{{ $about['github'] }}" target="_blank"><i class="font-icon icon-github"></i></a>
            </div>
        </div>
        
        <div class="sidebar__info box-inner box-inner--rounded">
            <ul class="contacts-block">
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="{{ __('headings.birthday') }}">
                    <i class="font-icon icon-calendar"></i> {{ $about['birthday'] }}
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="{{ __('headings.address') }}">
                    <i class="font-icon icon-location"></i> {{ $about['residence_'.App::getLocale()] }}
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="{{ __('headings.email') }}">
                    <a href="mailto:{{ $about['email'] }}"><i class="font-icon icon-envelope"></i>{{ $about['email'] }}</a>
                </li>
                <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="{{ __('headings.phone') }}">
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
                <a href="{{ $about['cv'] }}" target="_blank" class="btn btn--blue-gradient"><i class="font-icon icon-download"></i> {{ __('headings.openCV') }}</a>
            @endif
        </div>
    </div>	
</aside>