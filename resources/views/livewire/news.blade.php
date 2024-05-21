@push('headStyles')
 <style>
    .search-btn  {
       display: flex;
       align-items: center;
       justify-content: center;
    }

    .widget-categories a, .sidebar-box h4 {
       padding-left: 15px;
       transition: 0.5s ease;
    }
    .widget-categories a:hover {
        background-color:#505253;
    }
    .widget-categories a.act {
        background-color:#505253;
    }

    .recent-entry {
        align-items:center;
    }

 </style>
@endpush
<!-- blog start -->
<div id="down" class="blog container bottom-padding-30 top-padding-120 light-bg-1" data-midnight="black">
    <!-- flex-container start -->
    <div class="flex-container">
        <!-- column start -->
        <div class="eight-columns latest-news">

            @foreach ($newsList as $item)

                <!-- blog-entry start -->
                <article class="bottom-padding-90">
                    <div class="light-bg-2">
                        <a href="{{App::getLocale() . '/article/' . data_get($item, 'id')}}" class="pointer-large animsition-link hover-box d-block">
                            <div class="overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2">
                                <img class="hover-img" src="{{data_get($item, 'cover_image.url')}}" alt="blog img">
                            </div>
                            <div class="content-padding-l-r-20" >
                                <h3 class="main_news_title title-style text-color-1 top-margin-30 blog-title">
                                    <span class=" hover-content" >{{data_get($item, 'title')}}</span>
                                </h3>
                                <p  class="hover-content p-style-medium text-color-2" >{{data_get($item, 'teaser')}}</p>
                            </div>
                        </a>
                        <div class="content-padding-l-r-20 content-padding-bottom-20" >
                            <div class="blog-autor-date top-margin-30 text-color-1">
                                <a style="visibility:hidden" class="xsmall-title-oswald pointer-small hover-color" href="#">Balanchaev Balancha</a>
                                <a class="xsmall-title-oswald pointer-small hover-color" href="#">{{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('d')}} {{__(\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('M'))}}, {{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('Y')}}</a>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- blog-entry end -->
            @endforeach

            <!-- loading more btn start -->
            {{-- <div class="bottom-padding-90 text-center">
                <div class="arrow-btn-box">
                    <a href="#" class="arrow-btn pointer-large">Loading more</a>
                </div>
            </div><!-- loading more btn end --> --}}
        </div><!-- column end -->
        <!-- column start -->
        <aside class="four-columns bottom-padding-90">
            <!-- sidebar start -->
            <div class="sidebar content-left-margin-40 red-bg">
                <!-- sidebar-box start -->
                <div class="sidebar-box">
                    <!-- form search start -->
                    {{-- <div class="top-bottom-padding-90">
                        <form wire:ignore class="form-search">
                            <input type="text" class="search-control pointer-small" placeholder="Search...">
                            <a href="{{App::getLocale() . '/news?categoryId=' . $categoryId . '?keyword=' . $keyword}}" class="search-btn pointer-large" type="button"><i class="fas fa-search"></i></a>
                        </form>
                    </div><!-- form search end --> --}}


                    {{-- <div class="top-padding-30 widget-categories bottom-padding-90">
                        <h4 class="p-style-bold-up red-color">{{__('_categories')}}</h4>
                        <ul class="top-margin-30 red-color">
                            @foreach ($categories as $cat )
                            <li>
                                <a href="{{App::getLocale() . '/news?categoryId=' . data_get($cat, 'id')}}" class="pointer-small small-title-oswald {{ data_get($cat, 'id') == $categoryId ? 'act' : ''}}">{{data_get($cat, 'extra_attributes.title')}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}

                    <!-- recent posts start -->
                    <div class="bottom-padding-30 top-padding-30">
                        <h4 class="p-style-bold-up red-color">{{__('_recent_news')}}</h4>
                        <!-- recent posts content start -->
                        <div class="top-margin-30">

                            @foreach ($recentnews as $item)
                                <!-- recent-entry start -->
                                    <div class="recent-entry">
                                        <a href="{{App::getLocale() . '/article/' . data_get($item, 'id')}}" class="recent-entry-img-box pointer-large animsition-link">
                                            <img src="{{data_get($item, 'cover_image.url')}}" alt="title">
                                        </a>
                                        <div class="recent-desc">
                                            <a href="{{App::getLocale() . '/article/' . data_get($item, 'id')}}" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">{{data_get($item, 'title')}}</a>
                                            <div class="p-style-xsmall text-color-4 text-height-10 top-margin-5">{{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('d')}} {{__(\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('M'))}}, {{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('Y')}}</div>
                                        </div>
                                    </div>
                                <!-- recent-entry end -->
                            @endforeach

                        </div><!-- recent posts content end -->
                    </div><!-- recent posts end -->

                </div><!-- sidebar-box end -->
            </div><!-- sidebar end -->
        </aside><!-- column end -->
    </div><!-- flex-container end -->
</div><!-- blog end -->
