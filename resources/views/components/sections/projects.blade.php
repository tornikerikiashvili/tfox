@push('headStyles')
    <style>
     @media screen and (max-width: 767px) {
        .top-padding-120 {
            padding-top: 60px;
        }
     }

     .project_item_title {
        font-size: 21px;
        line-height: 1.5;
     }
    </style>
@endpush
<!-- section start -->
 <section class="light-bg-1 bottom-padding-30 top-padding-120" data-midnight="black">

    <!-- container start -->
    <div data-animation-container class="container small bottom-padding-60 text-center">
        <h2 data-animation-child class="large-title text-height-10 text-color-1 overlay-anim-box2" data-animation="overlay-anim2">{{data_get($content, 'projects_title')}}</h2><br>
        <p data-animation-child class="fade-anim-box tr-delay02 text-color-1 xsmall-title-oswald top-margin-5" data-animation="fade-anim">{{data_get($content, 'projects_teaser')}}</p>
    </div><!-- container end -->
@foreach ($projects as $project)

   @if ($loop->index === 0)
    <!-- bottom-padding-90 start -->
    <div class="bottom-padding-90">
        <!-- portfolio-content start -->
        <div class="portfolio-content flex-min-height-box">
            <!-- portfolio-content-inner start -->
            <div class="portfolio-content-inner flex-min-height-inner">
                <!-- flex-container start -->
                <div class="flex-container container small">
                    <!-- column start -->
                    <div data-animation-container class="six-columns">
                        <div class="content-right-margin-40">
                            <span class="small-title-oswald red-color overlay-anim-box2" data-animation="overlay-anim2">{{data_get($project, 'type')}}</span>
                            <h3 class="title-style text-color-1">
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($project, 'title')}}</span>
                            </h3>
                            <p data-animation-child class="p-style-small text-color-2 fade-anim-box tr-delay04" data-animation="fade-anim">{{data_get($project, 'teaser')}}</p>

                            {{-- <div data-animation-child class="arrow-btn-box top-margin-30 fade-anim-box tr-delay05" data-animation="fade-anim">
                                <a href="project.html" class="arrow-btn pointer-large animsition-link">{{__('_read_more')}}</a>
                            </div> --}}

                        </div>
                    </div><!-- column end -->
                    <!-- column start -->
                    <div id="selector1" class="six-columns top-padding-60">
                        <a href="{{App::getLocale() . '/project/' . data_get($project, 'id')}}" class="animsition-link  portfolio-content-bg-box pointer-large hover-box hidden-box">
                            <div data-src="{{data_get($project, 'cover_image.url')}}" class="item portfolio-content-bg hover-img overlay-anim-box2 light-bg-1" data-animation="overlay-anim2" style="background-image:url({{data_get($project, 'cover_image.url')}})"></div>
                        </a>
                    </div><!-- column end -->
                </div><!-- flex-container end -->
            </div><!-- portfolio-content-inner end -->
        </div><!-- portfolio-content end -->
    </div><!-- bottom-padding-90 end -->
    @elseif ($loop->index === 1)
    <!-- bottom-padding-90 start -->
    <div class="bottom-padding-90">
        <!-- portfolio-content start -->
        <div class="portfolio-content flex-min-height-box">
            <!-- portfolio-content-inner start -->
            <div class="portfolio-content-inner flex-min-height-inner">
                <!-- flex-container start -->
                <div class="flex-container reverse container small">
                    <!-- column start -->
                    <div class="six-columns top-padding-60">
                        <a href="{{App::getLocale() . '/project/' . data_get($project, 'id')}}" class="portfolio-content-bg-box pointer-large hover-box hidden-box animsition-link">
                            <div class="portfolio-content-bg hover-img overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2" style="background-image:url({{data_get($project, 'cover_image.url')}})"></div>
                        </a>
                    </div><!-- column end -->
                    <!-- column start -->
                    <div data-animation-container class="six-columns">
                        <div class="content-left-margin-40">
                            <span class="small-title-oswald red-color overlay-anim-box2" data-animation="overlay-anim2">{{data_get($project, 'type')}}</span>
                            <h3 class="title-style text-color-1">
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($project, 'title')}}</span>
                            </h3>
                            <p data-animation-child class="p-style-small text-color-2 fade-anim-box tr-delay04" data-animation="fade-anim">{{data_get($project, 'teaser')}}</p>

                            {{-- <div data-animation-child class="arrow-btn-box top-margin-30 fade-anim-box tr-delay05" data-animation="fade-anim">
                                <a href="project.html" class="arrow-btn pointer-large animsition-link">{{__('_read_more')}}</a>
                            </div> --}}

                        </div>
                    </div><!-- column end -->
                </div><!-- flex-container end -->
            </div><!-- portfolio-content-inner end -->
        </div><!-- portfolio-content end -->
    </div><!-- bottom-padding-90 end -->
@elseif ($loop->index === 2)
    <!-- bottom-padding-90 start -->
    <div class="bottom-padding-90">
        <!-- portfolio-content start -->
        <div class="portfolio-content flex-min-height-box">
            <!-- portfolio-content-inner start -->
            <div class="portfolio-content-inner flex-min-height-inner">
                <!-- flex-container start -->
                <div class="flex-container container small">
                    <!-- column start -->
                    <div data-animation-container class="six-columns">
                        <div class="content-right-margin-40">
                            <span class="small-title-oswald red-color overlay-anim-box2" data-animation="overlay-anim2">{{data_get($project, 'type')}}</span>
                            <h3 class="title-style text-color-1">
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($project, 'title')}}</span>
                            </h3>
                            <p data-animation-child class="p-style-small text-color-2 fade-anim-box tr-delay04" data-animation="fade-anim">{{data_get($project, 'teaser')}}</p>

                            {{-- <div data-animation-child class="arrow-btn-box top-margin-30 fade-anim-box tr-delay05" data-animation="fade-anim">
                                <a href="project.html" class="arrow-btn pointer-large animsition-link">{{__('_read_more')}}</a>
                            </div> --}}

                        </div>
                    </div><!-- column end -->
                    <!-- column start -->
                    <div class="six-columns top-padding-60">
                        <a href="{{App::getLocale() . '/project/' . data_get($project, 'id')}}" class="portfolio-content-bg-box pointer-large hover-box hidden-box animsition-link">
                            <div class="portfolio-content-bg hover-img overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2" style="background-image:url({{data_get($project, 'cover_image.url')}})"></div>
                        </a>
                    </div><!-- column end -->
                </div><!-- flex-container end -->
            </div><!-- portfolio-content-inner end -->
        </div><!-- portfolio-content end -->
    </div><!-- bottom-padding-90 end -->
    @elseif ($loop->index === 3)
    <!-- bottom-padding-90 start -->
    <div class="bottom-padding-90">
        <!-- portfolio-content start -->
        <div class="portfolio-content flex-min-height-box">
            <!-- portfolio-content-inner start -->
            <div class="portfolio-content-inner flex-min-height-inner">
                <!-- flex-container start -->
                <div class="flex-container reverse container small">
                    <!-- column start -->
                    <div class="six-columns top-padding-60">
                        <a href="{{App::getLocale() . '/project/' . data_get($project, 'id')}}" class="portfolio-content-bg-box pointer-large hover-box hidden-box animsition-link">
                            <div class="portfolio-content-bg hover-img overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2" style="background-image:url({{data_get($project, 'cover_image.url')}})"></div>
                        </a>
                    </div><!-- column end -->
                    <!-- column start -->
                    <div data-animation-container class="six-columns">
                        <div class="content-left-margin-40">
                            <span class="small-title-oswald red-color overlay-anim-box2" data-animation="overlay-anim2">{{data_get($project, 'type')}}</span>
                            <h3 class="project_item_title title-style text-color-1">
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($project, 'title.one')}}</span><br>
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay02" data-animation="overlay-anim2">{{data_get($project, 'title.two')}}</span><br>
                                <span data-animation-child class="overlay-anim-box2 light-bg-1 tr-delay03" data-animation="overlay-anim2">{{data_get($project, 'title.three')}}</span>
                            </h3>
                            <p data-animation-child class="p-style-small text-color-2 fade-anim-box tr-delay04" data-animation="fade-anim">{{data_get($project, 'teaser')}}</p>

                            {{-- <div data-animation-child class="arrow-btn-box top-margin-30 fade-anim-box tr-delay05" data-animation="fade-anim">
                                <a href="project.html" class="arrow-btn pointer-large animsition-link">{{__('_read_more')}}</a>
                            </div> --}}

                        </div>
                    </div><!-- column end -->
                </div><!-- flex-container end -->
            </div><!-- portfolio-content-inner end -->
        </div><!-- portfolio-content end -->
    </div><!-- bottom-padding-90 end -->
    @endif
    @endforeach
</section><!-- section end -->





