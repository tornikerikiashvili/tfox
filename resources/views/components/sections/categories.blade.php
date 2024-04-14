   	@push('headStyles')
        <style>
        .slide_overlay {
            width: 100%;
            height: 100%;
            background-color: black;
            position: absolute;
            opacity: 0.3;
            transition: 0.5s;
            z-index: 1;
        }

        .portfolio-slider2 .portfolio-slider2-content {
            z-index: 2;
        }
        </style>
    @endpush

    <!-- dark-bg-2 start -->
       <section id="down" class="dark-bg-1 top-bottom-padding-120">
        <!-- container start -->
        <div data-animation-container class="text-center container small">
            <h2 data-animation-child class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'product_title')}}">{{data_get($content, 'product_title')}}</h2><br>
            <p data-animation-child class="tr-delay02 xsmall-title-oswald top-margin-5 title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'product_subtitle')}}">{{data_get($content, 'product_subtitle')}}</p><br>
            <p data-animation-child class="text-color-5 p-style-small fade-anim-box tr-delay04" data-animation="fade-anim">{{data_get($content, 'product_teaser')}}</p>
        </div><!-- container end -->

        <!-- portfolio-slider2 start -->
        <div class="portfolio-slider2 top-bottom-padding-90">
            <!-- swiper-wrapper start -->
              <div class="swiper-wrapper">

                <!-- slide start -->
                    @foreach ($categories as $category)
                    @php
                        $childrenCat = Arr::first(App\Models\ProductCategory::where('parent_id', data_get($category, 'id'))->orderBy('order')->select('id')->get());
                    @endphp

                        <a href="{{App::getLocale() . '/products?category=' . data_get($category, 'id') . '&children=' . data_get($childrenCat, 'id')}}" class="swiper-slide hover-box animsition-link pointer-large">

                            <div class="hidden-box">
                                <div class="slide_overlay"></div>
                                <img class="hover-img" src="{{data_get($category, 'metadata.cover_image.url', '/assets/images/backgrounds/business-calligraphy-chinese-lanterns-1455969.jpg')}}" alt="project">
                            </div>

                            <div class="portfolio-slider2-content">
                                <h2 class="title-style text-color-4">
                                    <span class="hidden-box d-block text-height-10">
                                        <span class="portfolio-slider-fade portfolio-slider-tr-01">{{data_get($category, 'slide_title.one')}}</span>
                                    </span>
                                    <span class="hidden-box d-block text-height-10">
                                        <span class="portfolio-slider-fade portfolio-slider-tr-02">{{data_get($category, 'slide_title.two')}}</span>
                                    </span>
                                    <span class="hidden-box d-block text-height-10">
                                        <span class="portfolio-slider-fade portfolio-slider-tr-03">{{data_get($category, 'slide_title.three')}}</span>
                                    </span>
                                </h2>
                            </div>

                        </a>
                    @endforeach
                <!-- slide end -->

              </div><!-- swiper-wrapper end -->
              <!-- swiper-button-next start -->
            <div class="swiper-button-next">
                <div class="slider-arrow-next-box">
                    <span class="slider-arrow-next"></span>
                </div>
            </div><!-- swiper-button-next end -->
            <!-- swiper-button-prev start -->
            <div class="swiper-button-prev">
                <div class="slider-arrow-prev-box">
                    <span class="slider-arrow-prev"></span>
                </div>
            </div><!-- swiper-button-prev end -->
        </div><!-- portfolio-slider2 end -->
    </section><!-- dark-bg-2 end -->
