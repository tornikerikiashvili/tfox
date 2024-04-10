   	<!-- dark-bg-2 start -->
       <section id="down" class="dark-bg-1 top-bottom-padding-120">
        <!-- container start -->
        <div data-animation-container class="text-center container small">
            <h2 data-animation-child class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="Recent Works">Recent Works</h2><br>
            <p data-animation-child class="tr-delay02 xsmall-title-oswald top-margin-5 title-fill" data-animation="title-fill-anim" data-text="We Offer Digital Solutions">We Offer Digital Solutions</p>
            <p data-animation-child class="text-color-5 p-style-small fade-anim-box tr-delay04" data-animation="fade-anim">Yuccie mixtape williamsburg synth green juice cloud bread. Migas asymmetrical small batch, pitchfork kale chips iPhone aesthetic listicle squid glossier. Edison bulb ethical 90's iceland af. Offal tacos four loko, intelligentsia.</p>
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
