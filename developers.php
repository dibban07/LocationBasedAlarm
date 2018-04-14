<?php 
session_start();
include_once './header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,300);
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);

html, body{
  height: 100%;
  margin:0px;
  padding: 0px;
}
#particles-js{
  width: 100%;
  height: 100%;
  background: #111111;
}
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
    opacity: 0.8;
    box-shadow: 0 0 10px #000;
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
.card-content{
    background-color: #d9dde2;
}
.cen{
    text-align: center;
}
h1{
font-size: 6rem;
position: absolute;
top: 15%;
left: 40%;
color: #FFF;
font-family: teko;
font-weight: 400;
text-shadow: 5px 5px #5F6D72;
text-transform: uppercase;
}
.check{
	position: absolute;
	top: 55%;
}
.check2{
	position: absolute;
	top: 120%;
}

</style>

</head>
<body>
<div id="particles-js" style="height: 1500px;">
	<h1 style="color: white; margin-left: -13%; font-size: 60px;">Development Team</h1>
	
	<div class="container check text-center" style="margin-left: 10%;">
		<div class="container-fluid">
	    <div class="row">    
	        <div class="col-md-4 col-md-offset-2">
	            <div class="card">
	                <div class="card-image">
	                    <img class="img" src="images/developers/anubhab.jpg" >
	                    
	                </div><!-- card image -->
	                
	                <div class="card-content text-center cen" >
	                    <span class="card-title text-center">Anubhab Das</span>                    
	                </div><!-- card content -->
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center" style="text-align: center;">Web Developer</span>                    
	                </div><!-- card content -->
	            </div>
	        </div>
	        <div class="col-md-4">
	            <div class="card">
	                <div class="card-image">
	                    <img class="img" src="images/developers/sagnik.jpg" width="407" height="282">
	                    
	                </div><!-- card image -->
	                
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Sagnik Das</span>                    
	                </div><!-- card content -->
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Android Developer</span>                    
	                </div>
	            </div>
	        </div>
	    </div>


	    <div class="row check2">
	          <div class="col-md-4">
	            <div class="card">
	                <div class="card-image">
	                    <img class="img" src="images/developers/sagniks.jpg" width="407" height="282">
	                    
	                </div><!-- card image -->
	                
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Sagnik Sengupta</span>                    
	                </div><!-- card content -->
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Database Connectivity</span>                    
	                </div><!-- card content -->
	            </div>
	        </div>
	        <div class="col-md-4">
	            <div class="card">
	                <div class="card-image">
	                    <img class="img" src="images/developers/ak.jpg" width="407" height="282">
	                    
	                </div><!-- card image -->
	                
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Arnab Kar</span>                    
	                </div><!-- card content -->
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Front End Developer</span>                    
	                </div><!-- card content -->
	            </div>
	        </div>
	        <div class="col-md-4">
	            <div class="card">
	                <div class="card-image">
	                    <img class="img" src="images/developers/arka.jpg" width="407" height="282">
	                    
	                </div><!-- card image -->
	                
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Arka Prabha Das</span>                    
	                </div><!-- card content -->
	                <div class="card-content text-center cen">
	                    <span class="card-title text-center">Front End Developer</span>                    
	                </div><!-- card content -->
	            </div>
	        </div>  
	    </div>
	    </div>
	</div>
</div>  

	

<script src='http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>

<script src="confetti.js"></script>
<div>
		<?php include_once './footer.php'; ?>	
	</div>
</body>
</html>