@push('headStyles')
   <style>
    .inner_specifications ul {
        text-transform: uppercase;
        font-size: 12px;
        line-height: 1.4;
        font-weight: 600;
        letter-spacing: 1px;
        font-family: 'Oswald', sans-serif;
        margin-right: 20px;
        color: white;
    }

    .inner_specifications ul li {
        margin-top: 13px;
        padding-left: 20px;
        position: relative;
    }

    .inner_specifications ul li:before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #f05523;
    position: absolute;
    top: 50%;
    left: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

.inner_content p, .inner_content ul li {
    font-size: 18px;
    line-height: 1.8;
    font-weight: 400;
    letter-spacing: 0px;
    color: white;
}
.inner_content strong {
   color: #f05523;
}


@media screen and (max-width: 768px) {
    .inner_content p, .inner_content ul li {
        font-size: 13px;
        line-height: 1.2;
        font-weight: bold;
    }

.inner_content ul li {
       margin-left: 15px;
       list-style-type:disc;
    }
}

    </style>
@endpush
<div>

    		<!-- flex-min-height-box start -->
			<div id="down" class="dark-bg-1 flex-min-height-box">
				<!-- flex-min-height-inner start -->
				<div class="flex-min-height-inner">
					<!-- flex-container start -->
					<div class="flex-container container small top-padding-120 bottom-padding-60 project-content">
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


						<div class="inner_content twelve-columns bottom-padding-60">
							<div >
                                <h2 class="title-style text-color-4">
                                    {{data_get($product, 'name')}}
                                </h2>
                               </br>
							{!!data_get($product, 'content')!!}
							</div>
						</div><!-- column end -->



					</div><!-- flex-container end -->
				</div><!-- flex-min-height-inner end -->
			</div><!-- flex-min-height-box end -->

            <div class="text-center red-bg" data-midnight="black">
				<a href="{{App::getLocale() . '/products?category=' . data_get($categories, data_get($product, 'category_id')) . '&filter=' . data_get($product, 'category_id')}}" class="pointer-large animsition-link overlay-btn-box">
					<span class="overlay-btn" data-text="{{__('_back')}}">{{__('_back')}}</span>
				</a>
			</div>
</div>
