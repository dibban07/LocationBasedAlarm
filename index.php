<?php
	session_start();
	include_once './header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Location Based Alarm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
	<style>
body, html {
    height: 10	0%;
}

.parallax {
    /* The image used */
    background-image: url('images/img_parallax.jpg');

    /* Full height */
    height: 60%; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

        #videoDiv {width: 100%; height: 500px; position: relative;}
#videoBlock,#videoMessage {width: 100%; height: 500px; position: absolute; top: 0; left: 0;}
#videoMessage *{padding:0.4em; margin:0}
#videoMessage {text-shadow: 2px 2px 2px #000000; color:white;z-index:99 }
#videoMessage h1{font-size: 3em;color:#ffffff;text-align:center;}
#videoMessage h2{font-size: 2.5em;color:#ffffff;text-align:center;}
#videoMessage h3{font-size: 2.0em;color:#ffffff;text-align:center;}
.change{
    opacity: 0.6;
}
.video-container {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
  height: 100%; 
  overflow: hidden;
}
.video-container video {
  /* Make video to at least 100% wide and tall */
  min-width: 100%; 
  min-height: 100%; 

  /* Setting width & height to auto prevents the browser from stretching or squishing the video */
  width: auto;
  height: 1000px;

  /* Center the video */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,300);
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

.card .card-image img{
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.card .card-image:hover img{
    -webkit-transform: scale(1.2) rotate(-7deg);
    -moz-transform: scale(1.2) rotate(-7deg);
    -ms-transform: scale(1.2) rotate(-7deg);
    -o-transform: scale(1.2) rotate(-7deg);
    transform: scale(1.2) rotate(-7deg);
}

.card{
    font-family: 'Roboto', sans-serif; 
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 10px;    
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;    
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}
.card .card-action a{
    font-size: 15px;
    color: #ffab40;
    text-transform:uppercase;
    margin-right: 20px;    
    -webkit-transition: color 0.3s ease;
    -moz-transition: color 0.3s ease;
    -o-transition: color 0.3s ease;
    -ms-transition: color 0.3s ease;
    transition: color 0.3s ease;
}
.card .card-action a:hover{    
    color:#ffd8a6;
    text-decoration:none;
}

.card .card-reveal{    
    padding: 20px;
    position: absolute;
    background-color: #FFF;
    width: 100%;
    overflow-y: auto;
    /*top: 0;*/
    left:0;
    bottom:0;
    height: 100%;
    z-index: 1;
    display: none;    
}

.card .card-reveal p{
    color: rgba(0, 0, 0, 0.71);
    margin:20px ;
}

.btn-custom{
    background-color: transparent;
    font-size:18px;
}
.btn.sharp {
  border-radius:0;
}
.btn {
    padding: 14px 24px;
    border: 0 none;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}
 
.btn:focus, .btn:active:focus, .btn.active:focus {
    outline: 0 none;
}
 
.btn-primary {
    background: #0099cc;
    color: #ffffff;
    opacity: 0.9;
}
 
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    background: #33a6cc;
}
 
.btn-primary:active, .btn-primary.active {
    background: #007299;
    box-shadow: none;
}

</style>
<script type="text/javascript">
        $(function(){

    $('#show').on('click',function(){        
        $('.card-reveal').slideToggle('slow');
    });
    
    $('.card-reveal .close').on('click',function(){
        $('.card-reveal').slideToggle('slow');
    });
});

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1300);
        return false;
      }
    }
  });
});
    </script>
</head>
<body id="top"><br><br><br>
	<div style="background-color: yellow; height: auto;"><h1 class="text-center" style="margin: auto;"><br>Location Based Task Reminder</h1><br>
		<center>
		<div class="btn-group">
					<a href="#about"><button type="button" class="btn btn-primary btn-lg sharp">About</button></a>&nbsp;&nbsp;&nbsp;
					<a href="#whyus"><button type="button" class="btn btn-primary btn-lg sharp">Why us?</button></a>&nbsp;&nbsp;&nbsp;
					<a href="#tutorial"><button type="button" class="btn btn-primary btn-lg sharp">Tutorial</button></a>&nbsp;&nbsp;&nbsp;
					<a href="#features"><button type="button" class="btn btn-primary btn-lg sharp">Features</button></a>&nbsp;&nbsp;&nbsp;
		</div></center><br>
		</div>
	<div class="parallax"></div>

		
		<div id="about" class="container" style="background-color: #fcfbf9;" >
				<div class="container-fluid">
				<center>
						<div class="mb-r center-on-small-only flex-center ">
            			<img src="images/location.png" alt="" class="img img-responsive" style="width: auto; height: auto; margin-left: 25%;"></div>
						<h3>After a tiring day at work when you are riding back home on a bus or train, often you lack the strength to keep your eyelids open. A lot of people actually take the opportunity to take a short nap, others just succumb to it. The trouble is waking up on time so that you do not sleep through your stop. But with a location based alarm, you will never have to worry about that.</h3>
						<a href="#whyus"><img src="images/img.png" width="80"></a>
				</center>	
				</div>
		</div>

<div class="parallax"></div>

<div class="container" id="whyus" style="background-color: #fcfbf9; width: 90%; border: 1px #359dff;">
	<div class="container-fluid">
<!--Section: Features v.4-->
<section class="section feature-box">
    <!--Section heading-->
    <h1 class="section-heading text-center" style="background-color: yellow;">Why Us?</h1>
    <!--Section sescription-->
    <p class="section-description lead">Location Based Alarm is a geo-located alarm that goes off when you are about to arrive at your selected destination. And the best thing? The map closes and the app goes into the background periodically your location using GPS sensor.</p>

    <!--First row-->
    <div class="row features-small">

        <!--First column-->
        <div class="col-md-4">
            <!--First row-->
            <div class="row">
                <div class="col-2">
                    <i class="fa fa-flag-checkered indigo-text"></i>
                </div>
                <div class="col-10">
                    <h2 class="feature-title"><span class="glyphicon glyphicon-signal" style="color: blue; size: 3px;"></span> Technology</h2>
                    <p class="grey-text">GPS Location based alarm clock which will wake you up when you arrive at your location.</p>
                    <div style="height:30px"></div>
                </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
                <div class="col-2">
                    <i class="fa fa-flask blue-text"></i>
                </div>
                <div class="col-10">
                    <h2 class="feature-title"><span class="glyphicon glyphicon-edit" style="color: yellow; size: 3px;"></span> Organized with Security</h2>
                    <p class="grey-text">This app can provide you that by letting you send text messages to your family or friends when you reach a specific location without needing you to use your phone.</p>
                    <div style="height:30px"></div>
                </div>
            </div>
            <!--/Second row-->

        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-4 mb-r center-on-small-only flex-center ">
            <img src="images/rem.png" alt="" class="img img-responsive" style="width: 200px; height: 200px; margin: auto;">
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-md-4">
            <!--First row-->
            <div class="row">
                <div class="col-2">
                    <i class="fa fa-heart"></i>
                </div>
                <div class="col-10">
                    <h2 class="feature-title"><span class="glyphicon glyphicon-map-marker" style="color: red; size: 3px;"></span> Alarms with Google Maps</h2>
                    <p class="grey-text">Click the Location icon and add the specific location for Geo reminder.</p>
                    <div style="height:30px"></div>
                </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
                <div class="col-2">
                    <i class="fa fa-flash orange-text"></i>
                </div>
                <div class="col-10">
                    <h2 class="feature-title"><span class="glyphicon glyphicon-comment" style="color: green; size: 3px;"></span> Push notifications</h2>
                    <p class="grey-text">You have three types of location based notification options i-e Push Notification. You can set any of these or all of these according to your requirements.</p>
                    <div style="height:30px"></div>
                </div>
            </div>
            <!--/Second row-->

        <!--/Third column-->
    </div>
    <!--/First row-->
<center><a href="#tutorial"><img src="images/img.png" width="80"></a></center>
</section>
<!--/Section: Features v.4-->
</div>
</div>

	<div class="parallax"></div>
	
	<div class="container" id="tutorial" style="width: 100%;">
		<div class="container-fluid">
			<div class="row">
				<div id="videoDiv"> 
        			<div id="videoBlock"> 
                		<div class="video-container" style="border: 1px solid black;">
            				<video preload="preload" id="video" autoplay="autoplay" loop="loop" height="600" class="change" controls muted>        
   			            		<source src="video/location.mp4" type="video/mp4"></source>
            				</video> 
            			</div>
            			<div id="videoMessage">
                			<h1 style="color: black; background-color: yellow;">Welcome to our Android app!</h1>
            			</div>
        			</div>
    			</div>
			</div>
		</div>
		<center><a href="#features"><img src="images/img.png" width="80"></center>
	</div>

	<div class="parallax"></div>

	<div class="container" id="features" style="background-color: white;">
	<h1 class="section-heading text-center" style="background-color: yellow;">Features</h1>
    <div class="row">    
        <div class="col-md-4">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="images/mob.png">
                    
                </div><!-- card image -->
                
                <div class="card-content text-center" style="margin:auto;">
                    <span class="card-title text-center">Add Location</span>                    
                </div><!-- card content -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="images/mob2.png">
                    
                </div><!-- card image -->
                
                <div class="card-content text-center">
                    <span class="card-title text-center">Schedule Reminders</span>                    
                </div><!-- card content -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="images/mob4.png">
                    
                </div><!-- card image -->
                
                <div class="card-content text-center">
                    <span class="card-title text-center">Make life organised</span>                    
                </div><!-- card content -->
            </div>
        </div>
    </div>
    <center><a href="#top"><img src="images/up.png" width="80"></a></center>
</div>	

	<div class="parallax"></div>
</body>
<?php
	include_once './footer.php'
?>
</html>