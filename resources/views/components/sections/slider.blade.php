@push('headStyles')
    <style>

        .border-btn-red.border-btn-box {
            border: 1px solid #f4f4f4;
        }

        .slider_overlay {
          width: 100%;
          height: 100%;
          background-color: black;
          position: absolute;
          opacity: 0.3;
        }

        .slide_mob {
            display:none;
        }

        @media (max-width: 767px) {
            .slide_mob {
            display:inline-block;
        }

        .slide_desk {
            display:none;
        }
        }

    </style>
@endpush
<section class="home-slider" id="up">
    <!-- swiper-wrapper start -->
      <div class="swiper-wrapper">
          <!-- swiper-slide start -->

        @foreach ($slides as $slide)
          <div class="swiper-slide flex-min-height-box home-slide {{data_get($slide, 'metadata.red') == true ? 'red-slide' : ''}}">
              <!-- slide-bg -->

              <div class="slide_desk slide-bg overlay-loading2 overlay-dark-bg-1" style="background-image:url('{{data_get($slide, 'images.desk.url')}}')">
                <div class="slider_overlay"></div>
            </div>
            <div class="slide_mob slide-bg overlay-loading2 overlay-dark-bg-1" style="background-image:url('{{data_get($slide, 'images.mob.url')}}')">
                <div class="slider_overlay"></div>
            </div>
              <!-- home-slider-content start -->
              <div class="home-slider-content flex-min-height-inner {{data_get($slide, 'metadata.red') == true ? 'dark-bg-1' : 'dark-bg-1'}}">
                  <!-- flex-container start -->
                  <div class="container top-bottom-padding-120 flex-container response-999">
                      <!-- column start -->
                      @if (data_get($slide, 'metadata.red') == true)
                        <div class="six-columns">
                            <h2 class="large_font">
                                @if (data_get($slide, 'title.one'))
                                  <span class="slider-title-fill slider-tr-delay01" data-text="{{data_get($slide, 'title.one')}}">{{data_get($slide, 'title.one')}}</span><br>
                                @endif
                                @if (data_get($slide, 'title.two'))
                                <span class="slider-title-fill slider-tr-delay02" data-text="{{data_get($slide, 'title.two')}}">{{data_get($slide, 'title.two')}}</span><br>
                                @endif
                                @if (data_get($slide, 'title.three'))
                                <span class="slider-title-fill slider-tr-delay03" data-text="{{data_get($slide, 'title.three')}}">{{data_get($slide, 'title.three')}}</span>
                                @endif
                            </h2>
                            <div class="small-title-oswald text-height-20 d-flex-wrap top-margin-20">
                                <span class="slider-title-fill slider-tr-delay04 top-margin-10" data-text="{{data_get($slide, 'teaser')}}">{{data_get($slide, 'teaser')}}</span>
                            </div>
                            @if (data_get($slide, 'cta_button.link'))
                                <div class="arrow-btn-box slider-fade slider-tr-delay06 top-margin-30">
                                  <a href="{{App::getLocale() . data_get($slide, 'cta_button.link')}}" class="arrow-btn pointer-large">{{data_get($slide, 'cta_button.title')}}</a>
                                </div>
                            @endif

                        </div>
                      @else
                      <div class="six-columns six-offset">
                          <div class="content-left-margin-40">
                              <h2 class="large_font">
                                @if (data_get($slide, 'title.one'))
                                  <span class="slider-title-fill slider-tr-delay01" data-text="{{data_get($slide, 'title.one')}}">{{data_get($slide, 'title.one')}}</span><br>
                                @endif
                                @if (data_get($slide, 'title.two'))
                                <span class="slider-title-fill slider-tr-delay02" data-text="{{data_get($slide, 'title.two')}}">{{data_get($slide, 'title.two')}}</span><br>
                                @endif
                                @if (data_get($slide, 'title.three'))
                                <span class="slider-title-fill slider-tr-delay03" data-text="{{data_get($slide, 'title.three')}}">{{data_get($slide, 'title.three')}}</span>
                                @endif



                              </h2>
                              <p class="p-style-bold-up text-height-20 d-flex-wrap">
                                  <span class="slider-title-fill slider-tr-delay04" data-text="{{data_get($slide, 'teaser')}}">{{data_get($slide, 'teaser')}}</span>
                              </p>
                              @if (data_get($slide, 'cta_button.link'))
                                <div class="slider-fade slider-tr-delay07 top-margin-30">
                                    <div class="border-btn-box border-btn-red pointer-large">
                                    <div class="border-btn-inner">
                                            <a href="{{App::getLocale() . data_get($slide, 'cta_button.link')}}" class="border-btn" data-text="{{data_get($slide, 'cta_button.title')}}">{{data_get($slide, 'cta_button.title')}}</a>
                                    </div>
                                </div>
                                </div>
                              @endif

                          </div>
                      </div><!-- column end -->
                      @endif
                  </div><!-- flex-container end -->
              </div><!-- home-slider-content end -->
          </div><!-- swiper-slide end -->
        @endforeach

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

      <!-- swiper-pagination -->
      <div class="swiper-pagination"></div>

      <!-- scroll-btn start -->
    <a href="{{App::getLocale() . '#down'}}" class="scroll-btn pointer-large">
        <div class="scroll-arrow-box">
            <span class="scroll-arrow"></span>
        </div>
        <div class="scroll-btn-flip-box">
            <span class="scroll-btn-flip" data-text="{{__('_scroll')}}">{{__('_scroll')}}</span>
        </div>
     </a><!-- scroll-btn end -->
</section><!-- home-slider end -->
