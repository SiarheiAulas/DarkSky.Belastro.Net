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
                popupContent: '<div style="position: relative; padding-right: 20px;">' +
                              '<div class="title">{{$point->name}}</div>' +
                              '@isset($point->sqm)<div class="description">SQM={{$point->sqm}}<sup>m</sup>/"<sup>2</sup></div>@endisset' +
                              '<div class="description">Рельеф: @isset($point->hills){{$point->hills}}@endisset @isset($point->plato){{$point->plato}}@endisset @isset($point->valley){{$point->valley}}@endisset</div>' +
                              '<div class="description">Горизонт:@isset($point->south){{$point->south}};@endisset @isset($point->west){{$point->west}};@endisset @isset($point->north){{$point->north}};@endisset @isset($point->east){{$point->east}}@endisset</div>' +
                              '<div class="description">Транспорт: @isset($point->auto1){{$point->auto1}};@endisset @isset($point->auto2){{$point->auto2}};@endisset @isset($point->train){{$point->train}};@endisset @isset($point->bus){{$point->bus}}@endisset</div>' +
                              '<div class="description"><a href="{{Route('locations.show', $point->id)}}">Подробнее</a></div>' +
                              '</div>',
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
        
        var allInfoWindows = [];
        
        locations.forEach(function(element, index) {
            var marker = new google.maps.Marker({
                position: element.position,
                map: map,
                title: element.title,
                icon: element.img,
            });
            
            var infowindow = new google.maps.InfoWindow({
                content: element.popupContent
            });
            
            allInfoWindows.push(infowindow);
            
            marker.addListener('click', function() {
                allInfoWindows.forEach(function(iw) {
                    if (iw !== infowindow) {
                        iw.close();
                    }
                });
                
                infowindow.open(map, marker);
                
                setTimeout(function() {
                    customizeInfoWindow(infowindow);
                }, 100);
            });
        });
        
        function customizeInfoWindow(infowindow) {
            var infoWindowDiv = document.querySelector('.gm-style-iw-c');
            if (!infoWindowDiv) return;
            
            var contentContainer = infoWindowDiv.querySelector('div[style*="overflow"]') || 
                                   infoWindowDiv.firstElementChild;
            if (!contentContainer) return;
            
            if (contentContainer.querySelector('.custom-close-btn')) {
                return;
            }
            
            var googleCloseBtn = infoWindowDiv.querySelector('.gm-ui-hover-effect');
            if (googleCloseBtn) {
                googleCloseBtn.style.display = 'none';
            }
            
            var closeBtn = document.createElement('button');
            closeBtn.className = 'custom-close-btn';
            closeBtn.innerHTML = '×';
            closeBtn.title = 'Закрыть';
            closeBtn.style.cssText = `
                position: absolute;
                top: 4px;
                right: 4px;
                width: 22px;
                height: 22px;
                background: #fff;
                border: 1px solid #ddd;
                border-radius: 50%;
                font-size: 16px;
                line-height: 5px;
                text-align: center;
                cursor: pointer;
                z-index: 1000;
                padding: 0;
                margin: 0;
                color: #665;
                outline: none;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                transition: all 0.2s;
            `;
            
            closeBtn.onmouseover = function() {
                this.style.background = '#f8f8f8';
                this.style.borderColor = '#bbb';
                this.style.color = '#333';
                this.style.boxShadow = '0 2px 5px rgba(0,0,0,0.15)';
            };
            
            closeBtn.onmouseout = function() {
                this.style.background = '#fff';
                this.style.borderColor = '#ddd';
                this.style.color = '#666';
                this.style.boxShadow = '0 1px 3px rgba(0,0,0,0.1)';
            };
            
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                infowindow.close();
            }, true); // Используем capture phase
            
            contentContainer.style.position = 'relative';
            contentContainer.style.paddingRight = '10px';
            contentContainer.style.paddingTop = '5px';
            
            contentContainer.appendChild(closeBtn);
        }
        
        map.getDiv().addEventListener('click', function(e) {
            if (e.target.closest('.gm-ui-hover-effect')) {
                e.preventDefault();
                e.stopPropagation();
                
                var infoWindowDiv = e.target.closest('.gm-style-iw-c');
                if (infoWindowDiv) {
                    allInfoWindows.forEach(function(iw) {
                        iw.close();
                    });
                }
            }
        }, true);
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
