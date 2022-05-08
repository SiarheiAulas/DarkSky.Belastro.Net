@extends('layouts.main')
    @section('content')
        <x-header/>
        <x-aside/>
        <main>
        <div id="map"></div>
            <script>
                function initMap() {
                    var minsk = {lat: 53.90305300751979, lng: 27.563067765684398},
					myMapOptions = {
      					center: minsk,
      					mapTypeId: google.maps.MapTypeId.ROADMAP,
      					zoom: 7,
      					scrollwheel: false,
      					mapTypeControl: false,
      					zoomControl: true,
      					//draggable: draggable,
      					styles: [{"stylers": [{ "saturation": -100 }]}],
    				},
                    map = new google.maps.Map(document.getElementById('map'), myMapOptions),
					locations = [
					   	@foreach($points as $point)
							{
								position: {lat: <?=$point->lat?>, lng: <?=$point->long?>},
								popupContent:'<div class="title">{{$point->name}}</div><div class="description"><a href="{!!$point->url!!}">Подробнее</a></div>',
								title: '{{$point->name}}'
							},
						@endforeach

					];
                    locations.forEach( function( element, index ){
    					var marker = new google.maps.Marker({
							position: element.position,
							map: map,
							title: element.title,
						}),
						infowindow = new google.maps.InfoWindow({
        					content: element.popupContent
						});        
    					marker.addListener('click', function () {
							infowindow.open(map, marker);
						});       
  					});
			}
		    </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9GgiMwhGv4SZbgQfeutw5NynnPXQUjmw&callback=initMap">
            </script>
			
            <script>
                function showElement(){
                    
                }
            </script>
        </main>
        <x-footer/>
    @endsection
