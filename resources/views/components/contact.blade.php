@push('headStyles')
    <style>
        .page_cover {
            height: 200px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .title-fill:after, .title-fill.title-fill-anim:before, .title-fill.title-fill-anim:after {
            background-color: transparent;
        }

        .page_cover img {
            height: 200px;
        }

        .adress_container {
            margin-top: -100px;
        }

        .page_cover_title .title-fill:after {
            color:white;
        }

        .section_contact .four-columns {
            -ms-flex-preferred-size: 50%;
            flex-basis: 50%;
        }

        .section_contact iframe {
            border-radius: 5px;
            opacity: 0.9;
        }

        .contact-infos span {
            line-height: 50px;
        }
    </style>
@endpush

<div>
    <div class="page_cover" style="background-image: url({{'/storage/' . data_get($content, 'page_cover')}})">
        <div class="page_cover_title text-center">
            <h2 class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'page_cover_title_one')}}">{{data_get($content, 'page_cover_title_one')}}</h2><br>
        </div>
        <div class="overlay"></div>
    </div>

<!-- flex-min-height-box start -->
<section id="down" class="section_contact dark-bg-1 flex-min-height-box">
    <!-- flex-min-height-inner start -->
    <div class="flex-min-height-inner">
        <!-- container start -->
        <div class="container adress_container bottom-padding-60">

            <!-- flex-container start -->
            <div class="flex-container top-padding-90 contact-box">
                <!-- column start -->
                <div class="four-columns bottom-padding-60">
                    <div data-animation-container class="content-right-margin-20">
                        <p data-animation-child class="small-title-oswald red-color overlay-anim-box2" data-animation="overlay-anim2">{{__('_contacts')}}</p>
                        <p class="contact-infos title-style text-color-4">
                            <span data-animation-child class="overlay-anim-box2 overlay-light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($content, 'contact_phone')}}</span><br>
										<span data-animation-child class="overlay-anim-box2 overlay-light-bg-1 tr-delay02" data-animation="overlay-anim2">{{data_get($content, 'contact_email')}}</span><br>

                        </p>
                        <h6 data-animation-child class="flip-btn-box fade-anim-box tr-delay04" data-animation="fade-anim">
                            <a href="#" class="flip-btn pointer-large" data-text="{{data_get($content, 'contact_address')}}">{{data_get($content, 'contact_address')}}</a>
                        </h6>
                    </div>
                </div><!-- column end -->
                <!-- column start -->
                <div class="four-columns bottom-padding-60">
                    {!!data_get($content, 'contact_map_code')!!}
                </div><!-- column end -->

            </div><!-- flex-container end -->
        </div><!-- container end -->
    </div><!-- flex-min-height-inner end -->
</section><!-- flex-min-height-box end -->

<!-- contact-form-box start -->
<section class="contact-form-box flex-min-height-box" style="background-image:url({{'/storage/' . data_get($content, 'contact_form_bg')}})">
    <div class="bg-overlay"></div>
    <!-- flex-min-height-inner start -->
    <div class="flex-min-height-inner">
        <!-- contact-form-container start -->
        <div class="contact-form-container">
            <!-- container start -->
            <div class="container small top-bottom-padding-120 form-box">

                <!-- flex-container start -->
                <livewire:forms.contact-form />
            </div><!-- container end -->

            <!-- alert start -->
            <div class="js-popup-fade" id="m_sent">
                <div class="js-popup text-center">
                    <div class="popup-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="popup-alert title-style text-color-4">
                        Thank you!<br>
                        Your submission<br>
                        has been received!
                    </div>
                    <div class="flip-btn-box js-popup-close">
                        <div class="flip-btn pointer-large" data-text="Close">Close</div>
                    </div>
                </div>
            </div><!-- alert end -->

            <!-- alert start -->
            <div class="js-popup-fade" id="m_err">
                <div class="js-popup text-center">
                    <div class="popup-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="popup-alert title-style text-color-4">Error</div>
                    <div class="flip-btn-box js-popup-close">
                        <div class="flip-btn pointer-large" data-text="Close">Close</div>
                    </div>
                </div>
            </div><!-- alert end -->
        </div><!-- contact-form-container end -->
    </div><!-- flex-min-height-inner end -->
</section><!-- contact-form-box end -->
</div>
