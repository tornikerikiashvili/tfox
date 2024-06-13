<div>

    <x-sections.slider :slides="$slides"/>
    <x-sections.categories :categories="$categories" :content="$content"/>
    <x-sections.projects :projects="$projects" :content="$content"/>




    <!-- section start -->
    <section class="dark-bg-2">
        <!-- container start -->
        <div class="container small top-bottom-padding-120">
            <!-- medium-title start -->
            <h2 data-animation-container class="large_font">
                <span data-animation-child class="title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_one')}}">{{data_get($content, 'partners_title_one')}}</span><br>
                <span data-animation-child class="title-fill tr-delay01" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_two')}}">{{data_get($content, 'partners_title_two')}}</span><br>
                <span data-animation-child class="title-fill tr-delay02" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_three')}}">{{data_get($content, 'partners_title_three')}}</span>
            </h2><!-- medium-title end -->

            <!-- client-list start -->
            <ul class="client-list d-flex-wrap top-padding-60">
               @foreach ($partners as $partner)
                <li>
                    <a href="#" class="pointer-large d-block">
                        <div class="brand-box">
                            <img loading="lazy" src="{{data_get($partner, 'image.main.url')}}" alt="Brand" class="hover-opac-img">
                            <img src="{{data_get($partner, 'image.hover.url')}}" alt="Brand" class="opac-img">
                        </div>
                    </a>
                </li>
               @endforeach
            </ul><!-- client-list end -->
        </div><!-- container end -->
    </section><!-- section end -->

  <!-- latest-news start -->
  <section class="latest-news top-padding-120 bottom-padding-30 light-bg-1" data-midnight="black">
    <!-- container start -->
    <div class="container">
        <!-- text-center start -->
        <div data-animation-container class="text-center">
            <h2 data-animation-child class="large_font text-height-10 text-color-1 overlay-anim-box2" data-animation="overlay-anim2">{{data_get($content, 'news_title')}}</h2><br>
            <p data-animation-child class="fade-anim-box tr-delay02 text-color-1 xsmall-title-oswald top-margin-5" data-animation="fade-anim">{{data_get($content, 'news_teaser')}}</p>
        </div><!-- text-center end -->

        <!-- flex-container start -->
        <div class="flex-container response-999 top-padding-60">
            @foreach ($news as $item )
            <!-- column start -->
            <div class="four-columns bottom-padding-90">
                <article class="content-right-margin-20 light-bg-2" data-animation-container>
                    <a href="{{App::getLocale() . '/article/' . data_get($item, 'metadata.slug')}}" class="pointer-large animsition-link hover-box d-block">
                        <div class="overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2">
                            <img loading="lazy" class="hover-img" src="{{'/storage/' . data_get($item, 'cover_image')}}" alt="blog img">
                        </div>
                        <h3 class="news_component_title text-color-1 top-margin-30 blog-title content-padding-l-r-20">
                            <span data-animation-child class="overlay-anim-box2 hover-content overlay-dark-bg-2 tr-delay01" data-animation="overlay-anim2">{{data_get($item, 'title')}}</span>
                        </h3>
                    </a>
                    <div class="content-padding-bottom-20 content-padding-l-r-20">
                        {{-- <ul data-animation-child class="blog-category top-margin-30 fade-anim-box tr-delay04 text-color-2" data-animation="fade-anim">
                            <li><i class="fas fa-thumbtack text-color-3"></i></li>
                            <li class="p-letter-style pointer-small hover-color"><a href="#">branding</a></li>
                            <li class="p-letter-style pointer-small hover-color"><a href="#">design</a></li>
                            <li class="p-letter-style pointer-small hover-color"><a href="#">art</a></li>
                        </ul>
                        <ul data-animation-child class="blog-tags top-margin-10 fade-anim-box tr-delay05 text-color-2" data-animation="fade-anim">
                            <li><i class="fas fa-tags text-color-3"></i></li>
                            <li class="p-letter-style pointer-small hover-color"><a href="#">template</a></li>
                            <li class="p-letter-style pointer-small hover-color"><a href="#">post formats</a></li>
                        </ul> --}}

                    </div>
                </article>
            </div><!-- column end -->
            @endforeach


        </div><!-- flex-container end -->
    </div><!-- container end -->
</section><!-- latest-news end -->

    <!-- video-content-bg start -->
    <div class="video-content-bg" style="background-image:url({{'/storage/' . data_get($content, 'video_cover')}})">
        <div class="bg-overlay"></div>
        <a href="{{data_get($content, 'video_link')}}" class="video-play-button popup-youtube pointer-large">
            <span></span>
        </a>
    </div><!-- video-content-bg end -->
</div>
