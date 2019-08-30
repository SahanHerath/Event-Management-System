<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Hotel-profile</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">
	
	<!-- Stylesheets -->
	
	<link href="cvportfolio/common-css/bootstrap.css" rel="stylesheet">
	
	<link href="cvportfolio/common-css/ionicons.css" rel="stylesheet">
	
	<link href="cvportfolio/common-css/fluidbox.min.css" rel="stylesheet">
	
	<link href="cvportfolio/01-cv-portfolio/css/styles.css" rel="stylesheet">
	
	<link href="cvportfolio/01-cv-portfolio/css/responsive.css" rel="stylesheet">
	
</head>
<body>
	@foreach($hotel as $hotel1)	
	
	
	<section class="intro-section" style="background-image: url(uploads/hall/{{$hotel1->Cover_photo}})">
		<div class="container">
		
			<div class="row">
				
				<div class="offset-0 col-md-10 col-lg-4">
					<div class="intro">
						<div class="profile-img"><img src="uploads/hall/{{$hotel1->Main_logo}}" alt=""></div>
						<h2><b>{{$hotel1->Hotel_Name}}</b></h2>
						<ul class="information margin-tb-30">
							<li><b>ADDRESS : </b>{{$hotel1->Address}}</li>
							<li><b>TELEPHONE : </b>{{$hotel1->Contact_No}}</li>
                            <li><b>EMAIL : </b>{{$hotel1->email}}</li>
						</ul>
						<ul class="social-icons">
							@if($hotel1->instagram!=null)
							<li><a href="{{$hotel1->instagram}}"><i class="ion-social-instagram"></i></a></li>
                            @endif
                            @if($hotel1->facebook!=null)
							<li><a href="{{$hotel1->facebook}}"><i class="ion-social-facebook"></i></a></li>
							@endif
                            @if($hotel1->Link!=null)
							<li><a href="{{$hotel1->Link}}"><i class="ion-social-twitter"></i></a></li>
							@endif
						</ul>
					</div><!-- intro -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- intro-section -->
	
	
	
	
	<section class="about-section section">
		<div class="container">
			
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>Description</b></h3>
					</div>
				</div><!-- col-sm-4 -->
				<div class="col-sm-8">
					<p class="margin-b-50">{{$hotel1->Description}}</p>
				</div><!-- col-sm-8 -->
			<!-- row -->
		</div><!-- container -->
	</section><!-- about-section -->
	@endforeach
	<section class="education-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3><b>Listing</b></h3>
					</div>
				</div><!-- col-sm-4 -->
			</div><!-- row -->

			<div class="row">
			@foreach($hall as $hall1)
				<div class="offset-0 col-lg-4 col-md-6">
					<div class="feature_item"><a class="btn btn-bg-yellow" href="#">
						<img src="uploads/hall/{{$hall1->Main_pic}}"  width="300" height="200 ">
						<br><br>
						<h3><b>{{$hall1->Hall_Name}}</h3></b>
                        <h5>{{$hall1->Hall_Name}}</h5>
						</a>
					</div>
				</div>
			@endforeach
			</div>

		</div><!-- container -->
	</section><!-- about-section -->

	
	

	
	<footer>
		<p class="copyright">
		Copyright 2019 All rights reserved | Team Evora <i class="ion-heart" aria-hidden="true"></i>

		</p>


	</footer>
	
	
	<!-- SCIPTS -->
	
	<script src="cvportfolio/common-js/jquery-3.2.1.min.js"></script>
	
	<script src="cvportfolio/common-js/tether.min.js"></script>
	
	<script src="cvportfolio/common-js/bootstrap.js"></script>
	
	<script src="cvportfolio/common-js/isotope.pkgd.min.js"></script>
	
	<script src="cvportfolio/common-js/jquery.waypoints.min.js"></script>
	
	<script src="cvportfolio/common-js/progressbar.min.js"></script>
	
	<script src="cvportfolio/common-js/jquery.fluidbox.min.js"></script>
	
	<script src="cvportfolio/common-js/scripts.js"></script>
	
</body>
</html>