
@push('headStyles')
<style>
    .space_gap {
         height: 50px;
         width: 100%;
         border-top: 1px solid #525252;
         margin-top: 50px;
    }

    .about_text p {

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
					  			<h2 class="overlay-loading2 tr-delay03 medium-title red-color">{{data_get($content, 'page_cover_title_one')}}</h2>
				  				<h3 class="large-title-bold text-color-4">
									<span class="overlay-loading2 overlay-light-bg-1 tr-delay04">{{data_get($content, 'page_cover_title_two')}}</span>
								</h3>
				  			</div>
			  			</div><!-- column end -->
		  			</div><!-- flex-container end -->
	  			</div><!-- flex-min-height-inner end -->

	  			<!-- scroll-btn start -->
				<a href="#down" class="scroll-btn pointer-large">
					<div class="scroll-arrow-box">
						<span class="scroll-arrow"></span>
					</div>
					<div class="scroll-btn-flip-box">
						<span class="scroll-btn-flip" data-text="Scroll">Scroll</span>
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
									<h2 data-animation-child class="title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_mission_title')}}">{{data_get($content, 'about_mission_title')}}</h2>
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
									<h2 data-animation-child class="title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_goal_title')}}">{{data_get($content, 'about_goal_title')}}</h2>
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
									<h2 data-animation-child class="title-style title-fill" data-animation="title-fill-anim" data-text="{{data_get($content, 'about_values_title')}}">{{data_get($content, 'about_values_title')}}</h2>
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
				<!-- flex-container start -->
				<div class="flex-container container bottom-padding-60 top-padding-120">
					<!-- column start -->
					<div class="four-columns bottom-padding-60">
						<div data-animation-container class="content-right-margin-20 team-title-box">
							<h2 data-animation-child class="small-title-oswald overlay-anim-box2 red-color" data-animation="overlay-anim2">{{data_get($content, 'team_subtitle')}}</h2>
							<h3 class="title-style text-color-4">
								<span data-animation-child class="overlay-anim-box2 overlay-light-bg-1 tr-delay01" data-animation="overlay-anim2">{{data_get($content, 'team_title_one')}}</span><br>
								<span data-animation-child class="overlay-anim-box2 overlay-light-bg-1 tr-delay02" data-animation="overlay-anim2">{{data_get($content, 'team_title_two')}}</span><br>
								<span data-animation-child class="overlay-anim-box2 overlay-light-bg-1 tr-delay03" data-animation="overlay-anim2">{{data_get($content, 'team_title_three')}}</span>
							</h3>
						</div>
					</div><!-- column end -->
					<!-- column start -->


                    @foreach ($team as $item)
                        <div class="four-columns bottom-padding-60">
                            <a data-animation-container href="#" class="content-left-right-margin-10 hover-box pointer-large d-block">
                                <div data-animation-child class="overlay-anim-box2 overlay-dark-bg-1 team-img-box" data-animation="overlay-anim2">
                                    <img class="hover-img" src="{{data_get($item, 'image.url')}}" alt="Balanchaev Balancha">
                                </div>
                                <div class="team-content">
                                    <h4 data-animation-child class="small-title-oswald text-color-4 hover-content fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($item, 'title')}}</h4><br>
                                    <p data-animation-child class="p-letter-style text-color-4 hover-content fade-anim-box tr-delay02" data-animation="fade-anim">{{data_get($item, 'teaser')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <!-- column end -->

				</div><!-- flex-container end -->
			</section><!-- section end -->


            <section class="light-bg-1 top-padding-60" data-midnight="black">
				<!-- container start -->
				<div data-animation-container class="container small bottom-padding-60">

					<div class="about_text top-margin-30">
						<h2 data-animation-child class=" text-color-2 text-height-20 fade-anim-box tr-delay01" data-animation="fade-anim">{{data_get($content, 'about_title')}}</h2>
						<p data-animation-child class="p-style-large text-color-1 fade-anim-box tr-delay02" data-animation="fade-anim">{!!data_get($content, 'about_text')!!}</p>


					</div>
				</div><!-- container end -->


			</section><!-- section end -->
</div>
