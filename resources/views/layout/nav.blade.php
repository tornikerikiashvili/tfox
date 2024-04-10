
<!-- nav-container start -->
<nav class="nav-container dark-bg-1">
    <!-- nav-logo start -->
    <div class="nav-logo">
        <img src="assets/images/logo/logo-white.png" alt="logo">
    </div><!-- nav-logo end -->

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
        <!-- nav-box start -->
   @foreach (data_get($page, 'navigations.0.items') as $item)
      @if(!empty(data_get($item, 'children')))
        <li class="nav-box nav-bg-change dropdown-open">

            <a class="pointer-large nav-link">
                <span class="nav-btn" data-text="{{data_get($item, 'data.title')}}">{{data_get($item, 'data.title')}}</span>
            </a>

            <!-- dropdown start -->
            <ul class="dropdown">
                @foreach (data_get($item, 'children') as $item)
                    <li class="nav-box">
                        <a href="{{App::getLocale() . data_get($item, 'data.url')}}" class="animsition-link pointer-large">
                            <span class="nav-btn" data-text="{{data_get($item, 'data.title')}}">{{data_get($item, 'data.title')}}</span>
                        </a>
                    </li>
                @endforeach
            </ul><!-- dropdown end -->

            <div class="nav-bg" style="background-image: url({{'/storage/' . data_get($item, 'data.image')}});"></div>
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
