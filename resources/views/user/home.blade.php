

  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Roxandrea - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Roxandrea</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="index" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="about" class="nav-link">About</a></li>
				<li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
		<div class="hero">
			<div class="container-wrap d-flex justify-content-end align-items-end">
				<a href="https://www.youtube.com/watch?v=ism1XqnZJEg" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
					<span class="ion-ios-play play"></span>
				</a>
			</div>
	    <section class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center">
	          <div class="col-md-8 ftco-animate">
	          	<div class="text mb-5 pb-5">
		            <h1 class="mb-3">Roxandrea</h1>
		            <h2>More than a hotel... an experience</h2>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center">
	          <div class="col-md-8 ftco-animate">
	          	<div class="text mb-5 pb-5">
		            <h1 class="mb-3">Experience Epic Beauty</h1>
		            <h2>Roxandrea Hotel &amp; Resort</h2>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>
	    </section>
	  </div>

    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 pr-1 aside-stretch">
    				<form  action="home_rooms" class="booking-form">
	        		<div class="row">
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap bg-white align-self-stretch py-3 px-4">
				    					<label for="#">Check-in Date</label>
				    					<input type="text" name ="startDate" class="form-control checkin_date" placeholder="Check-in date">
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap bg-white align-self-stretch py-3 px-4">
				    					<label for="#">Check-out Date</label>
				    					<input type="text"  name ="endDate" class="form-control checkout_date" placeholder="Check-out date">
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap bg-white align-self-stretch py-3 px-4">
			      					<label for="#">Room</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
								{!! Form::select('type', $categories, old('category_id'), ['class' => 'form-control select2']) !!}
			                    <!-- <select name="type" id="" class="form-control">
			                    	<option value="SUITE">Suite</option>
			                      <option value="FAMILY">Family Room</option>
			                      <option value="DULUXE3">Deluxe Room</option>
			                      <option value="CLASSIC">Classic Room</option>
			                      <option value="SUPERIOR">Superior Room</option>
			                      <option value="LUXURY">Luxury Room</option>
			                    </select> -->
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap bg-white align-self-stretch py-3 px-4">
			      					<label for="#">Guests</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="count" id="" class="form-control">
			                    	<option value="1">1 Adult</option>
			                      <option value="2">2 Adult</option>
			                      <option value="3">3 Adult</option>
			                      <option value="4">4 Adult</option>
			                      <option value="5">5 Adult</option>
			                      <option value="6">6 Adult</option>
			                    </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <input type="Submit" class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block" value="Check Availability">
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
    </section>


		<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-wrap">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-3">
						<a href="#" class="services-wrap img align-items-end d-flex" style="background-image: url(images/room-3.jpg);">
							<div class="text text-center pb-2">
								<h3>Special Rooms</h3>
							</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="#" class="services-wrap img align-items-end d-flex" style="background-image: url(images/swimming-pool.jpg);">
							<div class="text text-center pb-2">
								<h3>Swimming Pool</h3>
							</div>
						</a>
					</div>
					<div class="col-md-3">
						<a href="#" class="services-wrap img align-items-end d-flex" style="background-image: url(images/resto.jpg);">
							<div class="text text-center pb-2">
								<h3>Restaurant</h3>
							</div>
						</a>
					</div>
					<div class="col-md-3">
						<div class="services-wrap services-overlay img align-items-center d-flex" style="background-image: url(images/sleep.jpg);">
							<div class="text text-center pb-2">
								<h3 class="mb-0">Suites &amp; Rooms</h3>
								<span>Special Rooms</span>
								<div class="d-flex mt-2 justify-content-center">
								<div class="icon">
									<a href="#"><span class="ion-ios-arrow-forward"></span></a>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Welcome to Roxandrea Hotel</span>
            <h2 class="mb-4">A New Vision of Luxury Hotel</h2>
          </div>
        </div>  
        <div class="row d-flex">
          <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-reception-bell"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Friendly Service</h3>
              </div>
            </div>      
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services active py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-serving-dish"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Get Breakfast</h3>
              </div>
            </div>    
          </div>
          <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-car"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Transfer Services</h3>
              </div>
            </div>      
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-spa"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Suits &amp; SPA</h3>
              </div>
            </div>      
          </div>
          <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="ion-ios-bed"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Cozy Rooms</h3>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light ftco-room">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Roxandrea Rooms</span>
            <h2 class="mb-4">Hotel Master's Rooms</h2>
          </div>
        </div>  
    		<div class="row no-gutters">
    			<div class="col-lg-6">
    				<div class="room-wrap">
    					<div class="img d-flex align-items-center" style="background-image: url(images/bg_3.jpg);">
    						<div class="text text-center px-4 py-4">
    							<h2>Welcome to <a href="index.html">Roxandrea</a> Hotel</h2>
    							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img" style="background-image: url(images/room-1.jpg);"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Suite Room</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img order-md-last" style="background-image: url(images/room-2.jpg);"></a>
    					<div class="half right-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Family Room</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img order-md-last" style="background-image: url(images/room-3.jpg);"></a>
    					<div class="half right-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Deluxe Room</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img" style="background-image: url(images/room-4.jpg);"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Luxury Room</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex">
    					<a href="#" class="img" style="background-image: url(images/room-6.jpg);"></a>
    					<div class="half left-arrow d-flex align-items-center">
    						<div class="text p-4 p-xl-5 text-center">
    							<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
    							<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
	    						<h3 class="mb-3"><a href="rooms.html">Superior Room</a></h3>
	    						<p class="pt-1"><a href="room-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our Happy Guest Says</h2>
          </div>
        </div>  
        <div class="row justify-content-center">
          <div class="col-md-8 ftco-animate">
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel ftco-owl">
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                  	<p class="star"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">Nathan Smith</p>
		                    <span class="position">Guests</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                  	<p class="star"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">Nathan Smith</p>
		                    <span class="position">Guests</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                  	<p class="star"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">Nathan Smith</p>
		                    <span class="position">Guests</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                  	<p class="star"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">Nathan Smith</p>
		                    <span class="position">Guests</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap py-4 pb-5">
		                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text text-center">
		                  	<p class="star"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
		                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
		                    <p class="name">Nathan Smith</p>
		                    <span class="position">Guests</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb px-0">
			<div class="container-fluid px-0">
				<div class="row no-gutters justify-content-end">
					<div class="col-md-12">
						<div id="home" class="video-hero" style="height: 800px; background-image: url(images/bg_1.jpg); background-size:cover; background-position: center center;">
							<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=ism1XqnZJEg',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>
							<div class="container">
								<div class="row justify-content-start d-flex align-items-end height-text ">
									<div class="col-md-8">
										<div class="text">
											<h1>We're Most Recommended Hotel</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		



    <section class="instagram">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Photos</span>
            <h2><span>Instagram</span></h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(images/insta-1.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(images/insta-2.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(images/insta-3.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(images/insta-4.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(images/insta-5.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Roxandrea</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Rooms</a></li>
                <li><a href="#" class="py-2 d-block">Amenities</a></li>
                <li><a href="#" class="py-2 d-block">Gift Card</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Career</a></li>
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>.Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="http://critssl.com/Resturent/styles/js/jquery.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/popper.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/bootstrap.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.easing.1.3.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.waypoints.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.stellar.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/owl.carousel.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.magnific-popup.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/aos.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.animateNumber.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/bootstrap-datepicker.js"></script>
  <!-- // <script src="js/jquery.timepicker.min.js"></script> -->
  <script src="http://critssl.com/Resturent/styles/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="http://critssl.com/Resturent/styles/js/google-map.js"></script>
  <script src="http://critssl.com/Resturent/styles/js/main.js"></script>
    
  </body>
</html>