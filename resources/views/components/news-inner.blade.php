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

    .entry-content p img {
       height: auto;
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
							<a class="photo-popup pointer-zoom" href="{{'/storage/' . data_get($news, 'cover_image')}}">
								<img src="{{'/storage/' . data_get($news, 'cover_image')}}" alt="title">
							</a>
							<!-- content-margin-block start -->
							<div class="content-margin-block">
                                <h3 class="main_news_title text-color-1 top-margin-30 blog-title">
                                    <span class="hover-content" >{{data_get($news, 'title')}}</span>
                                </h3>
								<!-- entry-content start -->
                                    <article class="entry-content">
                                        {!!data_get($news, 'content')!!}
                                    </article>
                                <!-- entry-content end -->

                                	<!-- post-img-flex start -->
									<div class="post-img-flex">
                                        @foreach (data_get($news, 'inner_cover_image') as $img)
                                            <a  class="post-img-box photo-popup" href="{{data_get($img, 'url')}}">
                                                <div class="pointer-zoom">
                                                    <img src="{{data_get($img, 'url')}}" alt="title">
                                                </div>
                                            </a>
                                        @endforeach
									</div><!-- post-img-flex end -->

								<!-- post-share start -->
								<div class="post-share">
									<span class="xsmall-title-oswald text-color-2">{{__('_share')}}: </span>
									<ul class="post-share-social text-color-1">
										<li><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='  + encodeURIComponent(document.URL), '', '_blank, width=500, height=500, resizable=yes, scrollbars=yes'); return false;" class="pointer-small hover-color" href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a  onclick="window.open('https://linkedin.com/shareArticle?url=' + encodeURIComponent(document.URL), '', '_blank, width=500, height=500, resizable=yes, scrollbars=yes'); return false;" class="pointer-small hover-color" href="#"><i class="fab fa-linkedin-in"></i></a></li>
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



                    <!-- recent posts start -->
                    <div class="bottom-padding-30 top-padding-30">
                        <h4 class="p-style-bold-up red-color">{{__('_recent_news')}}</h4>
                        <!-- recent posts content start -->
                        <div class="top-margin-30">

                            @foreach ($recentnews as $item)
                                <!-- recent-entry start -->
                                    <div class="recent-entry">
                                        <a href="{{App::getLocale() . '/article/' . data_get($item, 'id')}}" class="recent-entry-img-box pointer-large animsition-link">
                                            <img src="{{'/storage/' . data_get($news, 'cover_image')}}" alt="title">
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
