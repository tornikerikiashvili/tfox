
    <style>
        .lang-link {
            font-size: 21px;
            padding: 0 5px;
        }

        .lang-li {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 15px;
            transition: 1s ease;
        }

    </style>

<!-- nav-container start -->
<nav class="nav-container dark-bg-1">
    <!-- nav-logo start -->
    @if (App::getLocale() == 'ka')
    <div class="nav-logo">
        <img src="assets/images/logo/logo-white-ge.webp" alt="logo">
    </div>
    @else
        <div class="nav-logo">
            <img src="assets/images/logo/logo-white.webp" alt="logo">
        </div>
    @endif

    <!-- nav-logo end -->


    <!-- menu-close -->
    <div class="menu-close pointer-large"></div>

    <!-- dropdown-close-box start -->
    <div class="dropdown-close-box">
        <div class="dropdown-close pointer-large">
            <span></span>
        </div>
    </div><!-- dropdown-close-box end -->

    <!-- nav-menu start -->
    <ul class="nav-menu dark-bg-1">
        <li style="color:white" class="lang-li">
            <a class="lang-link nav-link" style="{{App::getLocale() == 'en' ? 'color:#f15922' : 'white'}}" href="en/{{data_get(Route::getCurrentRoute()->parameters(), 'slug')}}">{{'EN'}}</a>/
            <a class="lang-link nav-link" style="{{App::getLocale() == 'ka' ? 'color:#f15922' : 'white'}}" href="ka/{{data_get(Route::getCurrentRoute()->parameters(), 'slug')}}">{{'GE'}}</a>
        </li>
        <!-- nav-box start -->
   @foreach (data_get($page, 'navigations.0.items') as $item)
      @if(!empty(data_get($item, 'children')))
        <li class="nav-box nav-bg-change dropdown-open">

            <a class="pointer-large nav-link">
                <span class="nav-btn" data-text="{{data_get($item, 'data.title')}}">{{data_get($item, 'data.title')}}</span>
            </a>
            <div class="nav-bg" style="background-image: url({{'/storage/' . data_get($item, 'data.image')}});"></div>
            <!-- dropdown start -->
            <ul class="dropdown">
                @foreach (data_get($item, 'children') as $item)
                    <li class="nav-box">
                        <a href="{{App::getLocale() . data_get($item, 'data.url')}}" class="animsition-link pointer-large">
                            <span class="nav-btn" data-text="{{data_get($item, 'data.title')}}">{{data_get($item, 'data.title')}}</span>
                        </a>
                        <div class="nav-bg" style="background-image: url({{'/storage/' . data_get($item, 'data.image')}});"></div>
                    </li>
                @endforeach
            </ul><!-- dropdown end -->
        </li><!-- nav-box end -->
      @else
        <!-- nav-box start -->
        <li class="nav-box nav-bg-change">
            <a href="{{App::getLocale() . data_get($item, 'data.url')}}" class="animsition-link pointer-large nav-link">
                <span class="nav-btn" data-text="{{data_get($item, 'data.title')}}">{{data_get($item, 'data.title')}}</span>
            </a>
            <div class="nav-bg" style="background-image: url({{'/storage/' . data_get($item, 'data.image')}});"></div>
        </li><!-- nav-box end -->
       @endif
    @endforeach
    </ul><!-- nav-menu end -->
</nav><!-- nav-container end -->
