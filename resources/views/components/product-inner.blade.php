<div>

    		<!-- flex-min-height-box start -->
			<div id="down" class="dark-bg-1 flex-min-height-box">
				<!-- flex-min-height-inner start -->
				<div class="flex-min-height-inner">
					<!-- flex-container start -->
					<div class="flex-container container small top-padding-120 bottom-padding-60 project-content">
						<!-- column start -->
						<div class="four-columns bottom-padding-60">
							<div class="content-right-margin-20">
								<ul class="text-color-4 xsmall-title-oswald list-dots">
									@foreach (data_get($product, 'specifications') as $item)
                                      <li>{{data_get($item, 'title')}}</li>
                                    @endforeach

								</ul>
							</div>
						</div><!-- column end -->
						<!-- column start -->
						<div class="eight-columns bottom-padding-60">
							<div class="content-left-margin-20">
                                <h2 class="title-style text-color-4">
                                    {{data_get($product, 'name')}}
                                </h2>
                               </br>
								<p class="p-style-large text-color-4">{{data_get($product, 'content')}}</p>
							</div>
						</div><!-- column end -->

                        @foreach (data_get($product, 'gallery') as $item)
                        <!-- column start -->
					<div class="four-columns bottom-padding-60">
						<div class="content-right-margin-20">
							<a class="photo-popup pointer-zoom" href="{{data_get($item, 'url')}}">
								<img src="{{data_get($item, 'url')}}" alt="title">
							</a>
						</div>
					</div><!-- column end -->
                    @endforeach

					</div><!-- flex-container end -->
				</div><!-- flex-min-height-inner end -->
			</div><!-- flex-min-height-box end -->

            <div class="text-center top-bottom-padding-120 red-bg" data-midnight="black">
				<a href="{{App::getLocale() . '/products?category=' . data_get($categories, data_get($product, 'category_id')) . '&filter=' . data_get($product, 'category_id')}}" class="pointer-large animsition-link overlay-btn-box">
					<span class="overlay-btn" data-text="{{__('_back')}}">{{__('_back')}}</span>
				</a>
			</div>
</div>
