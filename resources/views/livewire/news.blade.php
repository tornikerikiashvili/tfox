@push('headStyles')
 <style>
    .search-btn  {
       display: flex;
       align-items: center;
       justify-content: center;
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
                        <a href="single_post.html" class="pointer-large animsition-link hover-box d-block">
                            <div class="overlay-anim-box2 overlay-dark-bg-2" data-animation="overlay-anim2">
                                <img class="hover-img" src="{{data_get($item, 'cover_image.url')}}" alt="blog img">
                            </div>
                            <div class="content-padding-l-r-20" data-animation-container>
                                <h3 class="title-style text-color-1 top-margin-30 blog-title">
                                    <span data-animation-child class="overlay-anim-box2 hover-content overlay-dark-bg-2" data-animation="overlay-anim2">{{data_get($item, 'title.one')}}</span><br>
                                    <span data-animation-child class="overlay-anim-box2 hover-content overlay-dark-bg-2 tr-delay01" data-animation="overlay-anim2">{{data_get($item, 'title.two')}}</span><br>
                                    <span data-animation-child class="overlay-anim-box2 hover-content overlay-dark-bg-2 tr-delay02" data-animation="overlay-anim2">{{data_get($item, 'title.three')}}</span>
                                </h3>
                                <p data-animation-child class="fade-anim-box hover-content tr-delay03 p-style-medium text-color-2" data-animation="fade-anim">{{data_get($item, 'teaser')}}</p>
                            </div>
                        </a>
                        <div class="content-padding-l-r-20 content-padding-bottom-20" data-animation-container>
                            <div data-animation-child class="blog-autor-date top-margin-30 fade-anim-box tr-delay02 text-color-1" data-animation="fade-anim">
                                <a style="visibility:hidden" class="xsmall-title-oswald pointer-small hover-color" href="#">Balanchaev Balancha</a>
                                <a class="xsmall-title-oswald pointer-small hover-color" href="#">{{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('d')}} {{__(\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('M'))}}, {{\Carbon\Carbon::parse(data_get($item, 'published_at'))->format('Y')}}</a>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- blog-entry end -->
            @endforeach

            <!-- loading more btn start -->
            <div class="bottom-padding-90 text-center">
                <div class="arrow-btn-box">
                    <a href="#" class="arrow-btn pointer-large">Loading more</a>
                </div>
            </div><!-- loading more btn end -->
        </div><!-- column end -->
        <!-- column start -->
        <aside class="four-columns bottom-padding-90">
            <!-- sidebar start -->
            <div class="sidebar content-left-margin-40 red-bg">
                <!-- sidebar-box start -->
                <div class="sidebar-box">
                    <!-- form search start -->
                    <div class="top-bottom-padding-90">
                        <form wire:ignore class="form-search">
                            <input type="text" class="search-control pointer-small" placeholder="Search...">
                            <a href="/asd" class="search-btn pointer-large animsition-link" type="button"><i class="fas fa-search"></i></a>
                        </form>
                    </div><!-- form search end -->

                    <!-- widget-categories start -->
                    <div class="widget-categories bottom-padding-90">
                        <h4 class="p-style-bold-up red-color">categories</h4>
                        <ul class="top-margin-30 red-color">
                            @foreach ($categories as $cat )
                            <li>
                                <a href="{{App::getLocale() . '/news?categoryId=' . data_get($cat, 'id')}}" class="pointer-small small-title-oswald  animsition-link">{{data_get($cat, 'extra_attributes.title')}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- widget-categories end -->

                    <!-- recent posts start -->
                    <div class="bottom-padding-90">
                        <h4 class="p-style-bold-up red-color">recent posts</h4>
                        <!-- recent posts content start -->
                        <div class="top-margin-30">
                            <!-- recent-entry start -->
                            <div class="recent-entry">
                                <a href="single_post.html" class="recent-entry-img-box pointer-large animsition-link">
                                    <img src="assets/images/blog/pexels-photo-305250.jpeg" alt="title">
                                </a>
                                <div class="recent-desc">
                                    <a href="single_post.html" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">Shaman lumbersexual yr portland pug</a>
                                    <div class="p-style-xsmall text-color-4 text-height-10 top-margin-5">December 28, 2018</div>
                                </div>
                            </div><!-- recent-entry end -->
                            <!-- recent-entry start -->
                            <div class="recent-entry">
                                <a href="single_post.html" class="recent-entry-img-box pointer-large animsition-link">
                                    <img src="assets/images/blog/pexels-photo-348523.jpeg" alt="title">
                                </a>
                                <div class="recent-desc">
                                    <a href="single_post.html" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">Chambray enamel pin synth shabby</a>
                                    <div class="p-style-xsmall text-color-4 text-height-10 top-margin-5">December 18, 2018</div>
                                </div>
                            </div><!-- recent-entry end -->
                            <!-- recent-entry start -->
                            <div class="recent-entry">
                                <a href="single_post.html" class="recent-entry-img-box pointer-large animsition-link">
                                    <img src="assets/images/blog/pexels-photo-1057120.jpeg" alt="title">
                                </a>
                                <div class="recent-desc">
                                    <a href="single_post.html" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">Waistcoat shaman air plant ethical</a>
                                    <div class="p-style-xsmall text-color-4 text-height-10 top-margin-5">December 14, 2018</div>
                                </div>
                            </div><!-- recent-entry end -->
                            <!-- recent-entry start -->
                            <div class="recent-entry">
                                <a href="single_post.html" class="recent-entry-img-box pointer-large animsition-link">
                                    <img src="assets/images/blog/pexels-photo-1280553.jpeg" alt="title">
                                </a>
                                <div class="recent-desc">
                                    <a href="single_post.html" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">Chambray master cleanse health goth</a>
                                    <div class="p-style-xsmall text-color-4 text-height-10 top-margin-5">December 10, 2018</div>
                                </div>
                            </div><!-- recent-entry end -->
                        </div><!-- recent posts content end -->
                    </div><!-- recent posts end -->

                </div><!-- sidebar-box end -->
            </div><!-- sidebar end -->
        </aside><!-- column end -->
    </div><!-- flex-container end -->
</div><!-- blog end -->
