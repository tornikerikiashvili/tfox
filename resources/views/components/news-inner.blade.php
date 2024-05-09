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

    .entry-content p {
        font-size: 16px;
        line-height: 1.8;
        font-weight: 600;
        letter-spacing: 0px;
        font-family: 'Open Sans', sans-serif;
        color: #262626;
    }
    .entry-content blockquote {
        margin-top: 30px;
        padding: 20px;
        position: relative;
        background: #f05523;

    }

    .entry-content blockquote p {
        margin: 0;
    }

    .entry-content blockquote:before {
        content: '';
        width: 24px;
        height: 24px;
        background: #f05523;
        position: absolute;
        right: 30px;
        bottom: -11px;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }



 </style>
@endpush

<!-- blog start -->
<div id="down" class="blog container bottom-padding-30 top-padding-120 light-bg-1" data-midnight="black">
    <!-- flex-container start -->
    <div class="flex-container">
        <!-- column start -->
					<div class="eight-columns">
						<!-- single-post-content start -->
						<div class="light-bg-2">
							<a class="photo-popup pointer-zoom" href="assets/images/blog/bodypaint-female-girl-50595.jpg">
								<img src="{{data_get($news, 'cover_image.url')}}" alt="title">
							</a>
							<!-- content-margin-block start -->
							<div class="content-margin-block">
								<!-- entry-content start -->
								<article class="entry-content">
									{!!data_get($news, 'content')!!}
								</article><!-- entry-content end -->

								<!-- post-share start -->
								<div class="post-share">
									<span class="xsmall-title-oswald text-color-2">{{__('_share')}}: </span>
									<ul class="post-share-social text-color-1">
										<li><a class="pointer-small hover-color" href="#"><i class="fab fa-instagram"></i></a></li>
										<li><a class="pointer-small hover-color" href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a class="pointer-small hover-color" href="#"><i class="fab fa-pinterest-p"></i></a></li>
										<li><a class="pointer-small hover-color" href="#"><i class="fab fa-behance"></i></a></li>
									</ul>
								</div><!-- post-share end -->
							</div><!-- content-margin-block end -->
						</div><!-- single-post-content end -->

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

                    <!-- widget-categories start -->
                    <div class="top-padding-30 widget-categories bottom-padding-90">
                        <h4 class="p-style-bold-up red-color">{{__('_categories')}}</h4>
                        <ul class="top-margin-30 red-color">
                            @foreach ($categories as $cat )
                             <li>
                               <a href="{{App::getLocale() . '/news?categoryId=' . data_get($cat, 'id')}}" class="pointer-small small-title-oswald ">{{data_get($cat, 'extra_attributes.title')}}</a>
                             </li>
                            @endforeach
                        </ul>
                    </div><!-- widget-categories end -->

                    <!-- recent posts start -->
                    <div class="bottom-padding-90">
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
                                            <a href="{{App::getLocale() . '/article/' . data_get($item, 'id')}}" class="xsmall-title-oswald text-color-4 pointer-large animsition-link">{{data_get($item, 'title.main')}}</a>
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
