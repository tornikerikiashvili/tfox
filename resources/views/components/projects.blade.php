@push('headStyles')
    <style>

.page_cover {
            height: 150px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .page_cover img {
            height: 200px;
        }

        .title-fill:after, .title-fill.title-fill-anim:before, .title-fill.title-fill-anim:after {
            background-color: transparent;
        }

        .overlay {
          width: 100%;
          height: 100%;
          background-color: black;
          position: absolute;
          opacity: 0.4;
          z-index: 1;
        }

        .page_cover_title {
            z-index: 2;
        }

        .page_cover_title .title-fill:after {
            color:white;
        }

         .page_cover_title_mobile {
                display:none;
            }

            @media screen and (max-width: 991px) {
                .page_cover_title {
             display:none;
            }

            .page_cover_title_mobile {
                display:block;
            }
            }


    </style>

@endpush


<div class="page_cover" style="background-image: url({{'/storage/' . data_get($content, 'page_cover')}})">
    <div wire:ignore class="page_cover_title text-center">
        <h2 class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'page_cover_title')}}">{{data_get($content, 'page_cover_title')}}</h2><br>
    </div>
    <div class="overlay"></div>
</div>




<!-- section start -->
<section class="light-bg-1" data-midnight="black">
    <!-- container start -->
    <div class="container bottom-padding-60 top-padding-60">
        <!-- text-center start -->
        <div wire:ignore class="page_cover_title_mobile text-center">
            <h2 class="large-title text-height-10 title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'page_cover_title')}}">{{data_get($content, 'page_cover_title')}}</h2><br>
        </div>

        <!-- flex-container start -->
        <div class="flex-container response-999 top-padding-60">
            @foreach ($projects as $project)
                <!-- column start -->
                <div class="four-columns bottom-padding-60">
                    <a data-animation-container href="{{App::getLocale() . '/project/' . data_get($project, 'id')}}" class="animsition-link content-right-margin-20 hover-box pointer-large d-block light-bg-2">
                        <div data-animation-child class="overlay-anim-box2 overlay-dark-bg-2 expertise-img-box" data-animation="overlay-anim2">
                            <img class="hover-img" src="{{data_get($project, 'cover_image.url')}}" alt="Digital products">
                        </div>
                        <div class="expertise content-padding-l-r-20 content-padding-bottom-20">
                            <h3 data-animation-child class="small-title-oswald text-color-1 hover-content fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($project, 'title')}}</h3>
                            <p data-animation-child class="p-style-xsmall text-color-1 hover-content fade-anim-box tr-delay02" data-animation="fade-anim">{{data_get($project, 'teaser')}}</p>
                        </div>
                    </a>
                </div><!-- column end -->
            @endforeach
        </div><!-- flex-container end -->
    </div><!-- container end -->
</section><!-- section end -->





