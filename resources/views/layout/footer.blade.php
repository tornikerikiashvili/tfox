<!-- footer start -->
<footer class="footer dark-bg-1">
    <!-- flex-container start -->
    <div class="flex-container container top-bottom-padding-90">
        <!-- column start -->
        <div class="two-columns bottom-padding-60">
            <div class="content-right-margin-10 footer-center-mobile">
                <img class="footer-logo" src="assets/images/logo/logo-white.png" alt="logo">
            </div>
        </div><!-- column end -->
        <!-- column start -->
        <div class="three-columns bottom-padding-60">
            <div class="content-left-right-margin-10">
                <ul class="footer-menu text-color-4">

                    @foreach (data_get($page, 'navigations.1.items') as $item)
                      <li>
                        <a class="pointer-large animsition-link small-title-oswald hover-color" href="{{App::getLocale() . data_get($item, 'data.url')}}">{{data_get($item, 'data.title')}}</a>
                      </li>
                    @endforeach
                </ul>
            </div>
        </div><!-- column end -->
        <!-- column start -->
        <div class="four-columns bottom-padding-60">
            <div class="content-left-right-margin-10 footer-center-mobile">
                <ul class="footer-information text-color-4">
                    <li><i class="far fa-envelope"></i><a href="mailto:{{data_get($page, 'communications.contacts.email')}}" class="xsmall-title-oswald">{{data_get($page, 'communications.contacts.email')}}</a></li>
                    <li><i class="fas fa-mobile-alt"></i><a href="tel:{{data_get($page, 'communications.contacts.phone')}}" class="xsmall-title-oswald">{{data_get($page, 'communications.contacts.phone')}}</a></li>
                    @if(App::getLocale() == 'ka')
                       <li><i class="fas fa-map-marker-alt"></i><a target="_blank" href="{{data_get($page, 'communications.contacts.direction_link')}}" class="xsmall-title-oswald text-height-17">{{data_get($page, 'communications.contacts.address')}}</a></li>
                    @else
                       <li><i class="fas fa-map-marker-alt"></i><a target="_blank" href="{{data_get($page, 'communications.contacts.direction_link')}}" class="xsmall-title-oswald text-height-17">{{data_get($page, 'communications.contacts.address_en')}}</a></li>
                    @endif



                </ul>
            </div>
        </div><!-- column end -->
        <!-- column start -->
        <div class="three-columns bottom-padding-60">
            <div class="content-left-margin-10">
                <ul class="footer-social">
                    @foreach (data_get($page, 'communications.socials.links') as $social)
                        <li>
                            <div class="flip-btn-box">
                                <a target="_blank" href="{{data_get($social, 'link')}}" class="flip-btn pointer-small" data-text="{{data_get($social, 'title')}}">{{data_get($social, 'title')}}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><!-- column end -->
        <!-- column start -->
        <div class="twelve-columns">
            <p class="p-letter-style text-color-4 footer-copyright">&copy; 2024 Tfox.ge</a></p>
        </div><!-- column end -->
    </div><!-- flex-container end -->
</footer><!-- footer end -->


