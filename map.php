<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    
    <div id="map"></div>
    <script>
    function markers(){

    	var marker = new google.maps.Marker({
          position: dallas,
          map: map

        });
        var marker2 = new google.maps.Marker({
          position: austin,
          map: map
          
        });
        return marker, marker2;
    }
		
		
      function initMap() {
        var dallas = {lat: 32.803, lng: -96.7699};
        var austin = {lat: 30.267, lng: -97.7431};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: dallas
        });

        var marker = new google.maps.Marker({
          position: dallas,
          map: map

        });
        var marker2 = new google.maps.Marker({
          position: austin,
          map: map
          
        });
  //       var list = [[32.8300338,-96.8254269],[32.832584,-96.797592],[32.774082,-96.5739136],[33.00611,-96.71947]];

  //       var listlength = list.length;
		// for(var i=0;i < listlength; i++){

		// 	var latitude = list[i][0];
		// 	var longitude = list[i][1];
		// 	this["location"+i] = {lat: latitude , lng: longitude};
		// 	var location = "location"+i;
		// 	this["marker"+i] = new google.maps.Marker({

  //         position: this.location,
  //         map: map
  //         });


		// }

        
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6LqkH8-PsQ7nxGdMQ6t2Rjc_lxYQ-kQw&callback=initMap">
    </script>
  </body>
</html>