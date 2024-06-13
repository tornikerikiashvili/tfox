
 <!-- header start -->
 <header class="fixed-header">
    <!-- header-flex-box start -->
    <div class="header-flex-box">
        <!-- logo start -->

        @if (App::getLocale() == 'ka')
        <a href="{{App::getLocale()}}" class="logo pointer-large animsition-link">
            <div class="logo-img-box">
                <img class="logo-white" src="assets/images/logo/logo-white-ge.webp" alt="logo">
                <img class="logo-black" src="assets/images/logo/logo-black-ge.webp" alt="logo">
            </div>
        </a>
        @else
            <a href="{{App::getLocale()}}" class="logo pointer-large animsition-link">
                <div class="logo-img-box">
                    <img class="logo-white" src="assets/images/logo/logo-white.webp" alt="logo">
                    <img class="logo-black" src="assets/images/logo/logo-black.webp" alt="logo">
                </div>
            </a>
        @endif


        <!-- logo end -->

        <div class="main_search">
            <button class="openBtn" onclick="openSearch()"><i class="fa fa-search"></i></button>
        </div>

        <!-- menu-open start -->
        <div class="menu-open pointer-large">
            <span class="hamburger"></span>
        </div><!-- menu-open end -->
    </div><!-- header-flex-box end -->
</header><!-- header end -->


