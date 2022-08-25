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
		<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Restaurant</span></p>
	            <h1 class="mb-4 bread">Room</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">
          				<div class="item">
          					<div class="room-img" style="background-image: url(../storage/{{$room['image']}});"></div>
          				</div>
          			
          			</div>
          		</div>
          		<div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
          			<h2 class="mb-4"> {{$cat['name']}} Room<span>- (  {{$room['guestCount']}} Persons)</span></h2>
    						<pre>{{$room['description']}}</pre>
    						
                
          		</div>
          		<div class="col-md-12 room-single ftco-animate mb-5 mt-4">
          			<h3 class="mb-4">Take A Tour</h3>
          			<div class="block-16">
		              <figure>
		                <img src="../storage/{{$room['image']}}" alt="Image placeholder" class="img-fluid">
		                <a href="https://www.youtube.com/watch?v=4_aVHri1eZ4" class="play-button popup-vimeo"><span class="icon-play"></span></a>
		              </figure>
		            </div>
          		</div>

          	
          	</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            
              <div class="card">
          <div class="card-body">
            
            <center><h5 class="card-title"> USD {{$room['price']}}</h5></center>
            <div class="table-responsive-sm">
            <table class="table ">
   
      <tr>
        <th>IN </th>
        <td>{{$startDate}}</td>
      </tr>
      <tr>
        <th>Out </th>
        <td>{{$endDate}}</td>
      </tr>
   
    
  </table>
  </div>
  <center>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
  Book
</button>
    
 
          </div>
    </div>
            </div>

          </div>
        </div>
      </div>
    </section> <!-- .section -->



    <div class="modal fade"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      {!! Form::open(['method' => 'POST', 'route' => ['book']]) !!}
      <!-- <form method="POST" action="/book">
      {{ csrf_field() }} -->
      <div class="panel panel-default">
          
          <div class="panel-body">
              
                  <div class="col-xs-12 form-group">
                      {!! Form::label('first_name', trans('quickadmin.customers.fields.first-name').'*', ['class' => 'col-form-label']) !!}
                      {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('first_name'))
                          <p class="help-block">
                              {{ $errors->first('first_name') }}
                          </p>
                      @endif
                  </div>
              
                  <div class="col-xs-12 form-group">
                      {!! Form::label('last_name', trans('quickadmin.customers.fields.last-name').'*', ['class' => 'control-label']) !!}
                      {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('last_name'))
                          <p class="help-block">
                              {{ $errors->first('last_name') }}
                          </p>
                      @endif
                  </div>
           
                  <div class="col-xs-12 form-group">
                      {!! Form::label('address', trans('quickadmin.customers.fields.address').'*', ['class' => 'control-label']) !!}
                      {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('address'))
                          <p class="help-block">
                              {{ $errors->first('address') }}
                          </p>
                      @endif
                  </div>
           
           
                  <div class="col-xs-12 form-group">
                      {!! Form::label('phone', trans('quickadmin.customers.fields.phone').'', ['class' => 'control-label']) !!}
                      {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('phone'))
                          <p class="help-block">
                              {{ $errors->first('phone') }}
                          </p>
                      @endif
                  </div>
            
                  <div class="col-xs-12 form-group">
                      {!! Form::label('email', trans('quickadmin.customers.fields.email').'*', ['class' => 'control-label']) !!}
                      {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('email'))
                          <p class="help-block">
                              {{ $errors->first('email') }}
                          </p>
                      @endif
                  </div>
            
                  <div class="col-xs-12 form-group">
                      {!! Form::label('country_id', trans('quickadmin.customers.fields.country').'', ['class' => 'control-label']) !!}
                      {!! Form::select('country_id', $countries, old('country_id'), ['class' => 'form-control select2']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('country_id'))
                          <p class="help-block">
                              {{ $errors->first('country_id') }}
                          </p>
                      @endif
                  </div>

                  <div class="col-xs-12 form-group">
                      {!! Form::label('additional_information', trans('quickadmin.bookings.fields.additional-information').'', ['class' => 'control-label']) !!}
                      {!! Form::text('additional_information', old('additional_information'), ['class' => 'form-control', 'placeholder' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('additional_information'))
                          <p class="help-block">
                              {{ $errors->first('additional_information') }}
                          </p>
                      @endif
                  </div>


                  <input type="hidden" class="form-control" name="room_id" value="{{$room['id']}}" id="recipient-name">
                  <input type="hidden" class="form-control" name="startDate" value="{{$startDate}}" id="recipient-name">
                  <input type="hidden" class="form-control" name="endDate" value="{{$endDate}}" id="recipient-name">
        

              
          </div>
      </div>

     <center> {!! Form::submit(trans('quickadmin.qa_book'), ['class' => 'btn btn-danger']) !!}  </center>
{!! Form::close() !!}


      </div>
      
    </div>
  </div>
</div>
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