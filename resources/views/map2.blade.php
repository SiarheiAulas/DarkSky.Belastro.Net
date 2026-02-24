@extends('layouts.main')
    @section('content')
        <x-header/>
        <x-aside/>
        <main>
        <div id="map"></div>
            <script>

				var src = "{{asset('img/newkml/belarus.kml')}}";

                function initMap() {
                    var minsk = {lat: 53.90305300751979, lng: 27.563067765684398},
					myMapOptions = {
      					center: minsk,
      					mapTypeId: google.maps.MapTypeId.ROADMAP,
      					zoom: 7,
      					scrollwheel: true,
      					mapTypeControl: false,
      					zoomControl: true,
      					//draggable: draggable,
      					styles: [{"stylers": [{ "saturation": -100 }]}],
    				},
                    map = new google.maps.Map(document.getElementById('map'), myMapOptions),
					locations = [
					   	@foreach($points as $point)
							{
								position: {lat: {{$point->lat}}, lng: {{$point->long}} },
								popupContent:'<div class="title">{{$point->name}}</div>@isset($point->sqm)<div class="description">SQM={{$point->sqm}}<sup>m</sup>/"<sup>2</sup></div>@endisset<div class="description">Рельеф: @isset($point->hills){{$point->hills}}@endisset @isset($point->plato){{$point->plato}}@endisset @isset($point->valley){{$point->valley}}@endisset</div><div class="description">Горизонт:@isset($point->south){{$point->south}};@endisset @isset($point->west){{$point->west}};@endisset @isset($point->north){{$point->north}};@endisset @isset($point->east){{$point->east}}@endisset </div><div class="description">Транспорт: @isset($point->auto1){{$point->auto1}};@endisset @isset($point->auto2){{$point->auto2}};@endisset @isset($point->train){{$point->train}};@endisset @isset($point->bus){{$point->bus}}@endisset</div><div class="description"><a href="{{Route('locations.show', $point->id)}}">Подробнее</a></div>',
								title: '{{$point->name}}',
								@if($point->host=='infinity')
									img: "{{asset('img/3r.png')}}",
								@elseif($point->host=='hv')
									img: "{{asset('img/2r.png')}}",
								@elseif($point->host=='vBug')
									img: "{{asset('img/6r.png')}}",
								@elseif($point->host=='betelgeise')
									img: "{{asset('img/4r.png')}}",
								@elseif($point->host=='cirrus')
									img: "{{asset('img/1r.png')}}",
								@elseif($point->host=='domachevo')
									img: "{{asset('img/5r.png')}}",
								@elseif($point->host=='observatory')
									img: "{{asset('img/7r.png')}}",
								@else
									img: "{{asset('img/8r.png')}}",
								@endif

							},
						@endforeach

					];

					var kmlLayer = new google.maps.KmlLayer(src, {
          				suppressInfoWindows: true,
						preserveViewport: false,
						map: map,
					});
					//var mapOverlay = new google.maps.Rectangle({
    				//	fillColor: '#000000',
					//	fillOpacity: 0.1,
					//	strokeWeight: 0,
					//	map: map,
    				//	bounds: new google.maps.LatLngBounds(
					//			new google.maps.LatLng(-90, -180),
					//			new google.maps.LatLng(90, 180)
					//	)
					//});
					
					locations.forEach( function( element, index ){
					
					var marker = new google.maps.Marker({
							position: element.position,
							map: map,
							title: element.title,
						    icon: element.img,
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
                src="https://maps.googleapis.com/maps/api/js?key=<api-key>&callback=initMap">
            </script>
			
            <script>
                function showElement(){
                    
                }
            </script>
        </main>
        <x-footer/>
    @endsection
