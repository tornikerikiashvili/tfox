@push('headStyles')
    <style>
        .project_inner_content p  {
            font-size: 16px;
            line-height: 1.8;
            font-weight: 600;
            letter-spacing: 0px;
            color: #888888;
        }
    </style>
@endpush

<!-- light-bg-1 start -->

<div class="light-bg-1 top-padding-120 bottom-padding-60" data-midnight="black">
    <!-- flex-container start -->
    <div class="flex-container container project-content">

        @foreach (data_get($project, 'gallery') as $img)
            <!-- column start -->
            <div class="four-columns bottom-padding-60">
                <div class="content-right-margin-20">
                    <a class="photo-popup pointer-zoom" href="{{data_get($img, 'url')}}">
                        <img src="{{data_get($img, 'url')}}" alt="title">
                    </a>
                </div>
            </div><!-- column end -->
        @endforeach
        <!-- column start -->
        <div class="four-columns bottom-padding-60">
            <div class="content-right-margin-20">
                <h2 class=" text-color-1">
                    {{data_get($project, 'title')}}
                </h2>
            </div>
        </div><!-- column end -->
        <!-- column start -->
        <div class="eight-columns bottom-padding-60">
            <div class="content-left-margin-10 project_inner_content">
                {!!data_get($project, 'content_top')!!}
            </div>
        </div><!-- column end -->



    </div><!-- flex-container end -->

</div><!-- light-bg-1 end -->
<div class="text-center red-bg" data-midnight="black">
    <a href="{{App::getLocale() . '/projects'}}" class="pointer-large animsition-link overlay-btn-box">
        <span class="overlay-btn" data-text="{{__('_all')}}">{{__('_all')}}</span>
    </a>
</div>

