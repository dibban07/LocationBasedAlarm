<?php
session_start();
include_once './blogic.php';
if(!isset($_SESSION['sid']))
      header("location:index.php");
include_once './header.php';
$msg="";
if(isset($_REQUEST['submit'])){
		$address = $_REQUEST['locname'];
    $address = preg_replace('/\s+/', '+', $address);
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyCE0Bxo57qXesi2_yq6sJ-l__7zAKqIef0";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);
		//echo $response;
		if(($response_a->status) == "OK")
		{
			$lat = $response_a->results[0]->geometry->location->lat;
			$lng = $response_a->results[0]->geometry->location->lng;
			$qry = "insert into info(iid,locname,rem,lat,lng) values('$_SESSION[sid]','$_REQUEST[locname]','$_REQUEST[remnote]','$lat','$lng')";
			//echo $qry;
			$x = ExecuteNonQuery($qry);        
        	if($x>0)
        	{
            	$msg = "Reminder Added!";
              header("location:location.php?lat=$lat&lng=$lng&msg=1");
        	}
        	else
        	{
            	$msg = "<font color='green'>There is a problem adding reminder!</font>".mysql_error();
              header("location:location.php?&wrongmsg=1");
        	}
		}
		else
		{
				$msg = "Location not found. Enter a valid location";
        echo $msg;
		}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body style="background-image: url(images/location.jpg); background-repeat: none;">
  <br><br><br><br><br><br><br><br>
  <div class="row text-center">
        <div style="background-color: #1844c9;">
          <center><h2> Add new location based alarm</h2></center>
        </div>
    </div>
    <br><br><br>
  <div class="container" style="background-color: #b3c1d6; border-radius: 10px;>

    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-4">
              <form method="post">
                  <br>
                  <div class="form-group">Enter Location:<input class="form-control" type="text" name="locname" placeholder="Bhubaneswar"></div>
                  <div class="form-group">Reminder Note: <input class="form-control" type="text" name="remnote" placeholder="Call Mom"></div><br>
                  <div class="form-group"><input class="btn btn-primary btn-lg pull-right" type="submit" name="submit" value="Add Reminder"></div>
                  <div><?php if(isset($_REQUEST['msg'])){ echo "Reminder Added Successfully";}?>
                       <?php if(isset($_REQUEST['wrongmsg'])){ echo "Reminder could not be added";}?>
                  </div>
                </form> 
            </div>
            <div class="cold-md-8">
                <div id="map"></div>
            </div>
        </div>
  </div>
  <br><br><br><br><br><br>
        <div class="row">
            <div class="container" style="background-color: #bed2e2; border-radius: 10px;>
                  
            <div class="container-fluid">
            <h2><b>Location based alarms</b></h2>
            <table class="table">
          <thead class="thead-inverse">
              <tr>
                  <th>Name of Location</th>
                  <th>Reminder Note</th>
              </tr>
            </thead>
          <tbody>
    
          <?php 
          $qry = "select * from info where iid='$_SESSION[sid]' and date is null";
          $res = ExecuteQuery($qry);
          //echo $res;
          if(mysql_affected_rows()>0){
            while($r = mysql_fetch_array($res)){
              if($r == "Array"){
                  echo "<div>
            <h2><b>Location based alarms</b></h2>
            <table border='1'>
            <thead>
              <tr>
                  <th>Name of Location</th>
              <th>Reminder Note</th>
              </tr>
            </thead>
            <tbody>";
              }
              echo "<tr><td>{$r[1]}</td><td>{$r[2]}</td><td><a href='delete.php?locname=$r[1]'>Delete</a></td></tr>\n";
            }
        }
?>
</tbody>
</table>  
</div>

<br><br><br><br><br><br>
            </div>          
        </div>
    <script>
    function initMap() {
        var uluru = {lat: <?php if(isset($_REQUEST['lat'])){echo $_REQUEST['lat'];}?>, lng: <?php if(isset($_REQUEST['lng'])){echo $_REQUEST['lng'];}?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      /*var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          //center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
      }
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: <?php /*if(isset($_REQUEST['lat'])){echo $_REQUEST['lat'];*/?>position.coords.latitude,
              lng: <?php /*if(isset($_REQUEST['lng'])){echo $_REQUEST['lng'];*/?>position.coords.longitude
              };
              var marker = new google.maps.Marker({
                position: pos,
                map: map
              });
            // /infoWindow.setPosition(pos);
            //infoWindow.setContent('Location found.');

              map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

        var marker;

        function placeMarker(location) {
  if ( marker ) {

    marker.setPosition(location);
  } else {

    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
}

    */
    
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE0Bxo57qXesi2_yq6sJ-l__7zAKqIef0&callback=initMap"
    async defer></script>
  </body>
<?php include_once './footer.php'; ?> 
</html>