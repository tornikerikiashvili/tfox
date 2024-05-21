
@push('headStyles')
<style>
    .space_gap {
         height: 50px;
         width: 100%;
         border-top: 1px solid #525252;
         margin-top: 50px;
    }

    .goals_title {
        text-wrap: unset;
    }
</style>

@endpush
<div>

    <!-- page-head start -->
			<section id="up" class="page-head flex-min-height-box dark-bg-2">
				<!-- page-head-bg -->
				<div class="page-head-bg overlay-loading2" style="background-image: url({{'/storage/' . data_get($content, 'page_cover')}});"></div>

				<!-- flex-min-height-inner start -->
	  			<div class="flex-min-height-inner">
		  			<!-- flex-container start -->
		  			<div class="container top-bottom-padding-120 flex-container response-999">
			  			<!-- column start -->
			  			<div class="six-columns six-offset">
				  			<div class="content-left-margin-40">

				  				<h3 class="large-title-bold text-color-4">
									<span class="page_cover_title_line_two overlay-loading2 overlay-light-bg-1 tr-delay04">{{data_get($content, 'page_cover_title_one')}}</span>
								</h3>
                                <h2 class="overlay-loading2 tr-delay03 medium-title red-color">{{data_get($content, 'page_cover_title_two')}}</h2>
				  			</div>
			  			</div><!-- column end -->
		  			</div><!-- flex-container end -->
	  			</div><!-- flex-min-height-inner end -->

	  			<!-- scroll-btn start -->
				<a href="{{App::getLocale() . '/about#down'}}" class="scroll-btn pointer-large">
					<div class="scroll-arrow-box">
						<span class="scroll-arrow"></span>
					</div>
					<div class="scroll-btn-flip-box">
						<span class="scroll-btn-flip" data-text="{{__('_scroll')}}">{{__('_scroll')}}</span>
					</div>
				 </a><!-- scroll-btn end -->
			</section><!-- page-head end -->


   			<!-- flex-min-height-box start -->
               <section id="down" class="dark-bg-1 flex-min-height-box about-page">
				<!-- flex-min-height-inner start -->
				<div class="flex-min-height-inner">
					<!-- container start -->
					<div class="container top-bottom-padding-120">
						<!-- flex-container start -->
						<div data-animation-container class="flex-container">
							<!-- column start -->
							<div class="four-columns">
								<div class="content-right-margin-20">
									<h2 data-animation-child class="goals_title title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_mission_title')}}">{{data_get($content, 'about_mission_title')}}</h2>
								</div>
							</div>
							<div class="eight-columns">
								<div class="content-left-margin-10">
									<p data-animation-child class="p-style-large text-color-5 fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($content, 'about_mission_text')}} </p>
								</div>
							</div><!-- column end -->

                            <div class="space_gap"></div>

							<!-- column start -->
							<div class="four-columns">
								<div class="content-right-margin-20">
									<h2 data-animation-child class="goals_title title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_goal_title')}}">{{data_get($content, 'about_goal_title')}}</h2>
								</div>
							</div>
							<div class="eight-columns">
								<div class="content-left-margin-10">
									<p data-animation-child class="p-style-large text-color-5 fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($content, 'about_goal_text')}} </p>
								</div>
							</div><!-- column end -->

                            <div class="space_gap"></div>

							<!-- column start -->
							<div class="four-columns">
								<div class="content-right-margin-20">
									<h2 data-animation-child class="goals_title title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_values_title')}}">{{data_get($content, 'about_values_title')}}</h2>
								</div>
							</div>
							<div class="eight-columns">
								<div class="content-left-margin-10">
									<p data-animation-child class="p-style-large text-color-5 fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($content, 'about_values_text')}} </p>
								</div>
							</div><!-- column end -->


						</div><!-- flex-container end -->
					</div><!-- container end -->
				</div><!-- flex-min-height-inner end -->
			</section><!-- flex-min-height-box end -->



             <!-- section start -->
    <section class="dark-bg-2">
        <!-- container start -->
        <div class="container small top-bottom-padding-120">
            <!-- medium-title start -->
            <h2 data-animation-container class="medium-title">
                <span data-animation-child class="title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_one')}}">{{data_get($content, 'partners_title_one')}}</span><br>
                <span data-animation-child class="title-fill tr-delay01" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_two')}}">{{data_get($content, 'partners_title_two')}}</span><br>
                <span data-animation-child class="title-fill tr-delay02" data-animation="title-fill-anim" data-text="{{data_get($content, 'partners_title_three')}}">{{data_get($content, 'partners_title_three')}}</span>
            </h2><!-- medium-title end -->

            <!-- client-list start -->
            <ul class="client-list d-flex-wrap top-padding-60">
               @foreach ($partners as $partner)
                <li>
                    <a href="#" class="pointer-large d-block">
                        <div class="brand-box">
                            <img src="{{data_get($partner, 'image.main.url')}}" alt="Brand" class="hover-opac-img">
                            <img src="{{data_get($partner, 'image.hover.url')}}" alt="Brand" class="opac-img">
                        </div>
                    </a>
                </li>
               @endforeach
            </ul><!-- client-list end -->
        </div><!-- container end -->
    </section><!-- section end -->


            <section class="light-bg-1 top-padding-60" data-midnight="black">
				<!-- container start -->
				<div data-animation-container class="container small bottom-padding-60">

					<div class="about_text top-margin-30">
						<h2 data-animation-child class=" text-color-2 medium-title fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($content, 'about_title')}}</h2>
						<p data-animation-child class="p-style-large text-color-1 fade-anim-box tr-delay02" data-animation="fade-anim">{!!data_get($content, 'about_text')!!}</p>


					</div>
				</div><!-- container end -->


			</section><!-- section end -->
</div>
