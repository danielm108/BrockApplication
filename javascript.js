$(document).ready(function(){

var markers = [];

function addMarker(location) {
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
    }
        

        function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }
 
 function clearMarkers() {
        setMapOnAll(null);
      }
function showMarkers() {
        setMapOnAll(map);
      }

$("#interface").on("change", "table tr td #checked", function(){
    var client = $(this).parent().next().text();
					    // $.post('markervalueajax.php', 'val=' + clientstart, function (response) {
					     // alert(response);
					     if($(this).is(":checked")){
					     	
					     	alert(client+" marker added to map");
					     	var location = new google.maps.LatLng(32.8300338,-96.8254269);
					addMarker(location);
					setMapOnAll(map);
					showMarkers();

					// var myLatlng = new google.maps.LatLng(32.8300338,-96.8254269);
					// var mapOptions = {
					//   zoom: 11,
					//   center: myLatlng
					// }
					// var map = new google.maps.Map(document.getElementById("map"), mapOptions);

					// var marker = new google.maps.Marker({
					//     position: myLatlng,
					//     title:"Address Here"
					// });

					//  var dallas = {lat: 32.803, lng: -96.7699};
					//  var marker2 = new google.maps.Marker({
					//           position: dallas,
					//           map: map
					// });
					// // To add the marker to the map, call setMap();
					// marker.setMap(map);





					     }
					     else{
					     	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
					var dallas = {lat: 32.803, lng: -96.7699};
					 var marker = new google.maps.Marker({
					          position: dallas,
					          map: map
								});

					     	marker.setMap(null);
					     	alert(client+" marker removed from map");	

					     }
					     
					   });




$("#interface").on("change", "table tr th #mastercheck", function(){
    // var clientstart = $(this).parent().next().text();
    // $.post('markervalueajax.php', 'val=' + clientstart, function (response) {
     // alert(response);
     if($(this).is(":checked")){
     	alert("All markers added to map");
     	$('.checkbox').prop('checked',true);












     }
     else{
     	alert("All markers removed from map");	
     	$('.checkbox').prop('checked',false);
     }
     
   });


















})