@extends('layouts.main')
@section('meta_description', 'DarkSky@Belastro.Net - интерактивная карта для астрономов-любителей. Поиск мест с темным небом в Беларуси: фильтр по засветке, рельефу и доступности. Сообщество для обмена локациями')
@section('content')
    <x-header/>
    <x-aside/>
    <main>
    <div id="map"></div>
    
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=<api-key>&libraries=maps,marker&loading=async">
    </script>
    
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
        mapId: "<example>"
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
                          '<div class="description"><a href="{{Route('locations.show', $point->id)}}" target="_blank">Подробнее</a></div>' +
                          '</div>',
            title: '{{$point->name}}',
            @if($point->host=='infinity')
                img: "{{asset('img/3r.png')}}",
                width: 25,
                height: 25
            @elseif($point->host=='hv')
                img: "{{asset('img/2r.png')}}",
                width: 25,
                height: 25
            @elseif($point->host=='vBug')
                img: "{{asset('img/6r.png')}}",
                width: 15,
                height: 25
            @elseif($point->host=='betelgeise')
                img: "{{asset('img/4r.png')}}",
                width: 25,
                height: 25
            @elseif($point->host=='cirrus')
                img: "{{asset('img/1r.png')}}",
                width: 19,
                height: 25
            @elseif($point->host=='domachevo')
                img: "{{asset('img/5r.png')}}",
                width: 25,
                height: 25
            @elseif($point->host=='observatory')
                img: "{{asset('img/7r.png')}}",
                width: 25,
                height: 25
            @else
                img: "{{asset('img/8r.png')}}",
                width: 30,
                height: 25
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
    
    // ИСПРАВЛЕНИЕ: Добавляем проверку загрузки библиотеки
    if (google.maps.importLibrary) {
        google.maps.importLibrary("marker").then(({AdvancedMarkerElement}) => {
            createMarkers(AdvancedMarkerElement);
        }).catch(() => {
            // Если importLibrary не работает, используем обычные маркеры
            createMarkers(null);
        });
    } else {
        // Для старых версий API
        createMarkers(null);
    }
    
    function createMarkers(MarkerClass) {
        locations.forEach(function(element, index) {
            var marker;
            var infowindow = new google.maps.InfoWindow({
                content: element.popupContent
            });
            
            if (MarkerClass) {
                // Используем AdvancedMarkerElement
                const markerContent = document.createElement('img');
                markerContent.src = element.img;
                markerContent.style.width = element.width + 'px';
                markerContent.style.height = element.height + 'px';
                markerContent.style.cursor = 'pointer';
                markerContent.alt = element.title || 'Маркер локации';
                
                marker = new MarkerClass({
                    position: element.position,
                    map: map,
                    title: element.title,
                    content: markerContent
                });
                
                // ИСПРАВЛЕНИЕ: Используем правильное событие для AdvancedMarkerElement
                marker.addEventListener('click', function() {
                    handleMarkerClick(infowindow, marker);
                });
            } else {
                // Используем обычный Marker
                marker = new google.maps.Marker({
                    position: element.position,
                    map: map,
                    title: element.title,
                    icon: {
                        url: element.img,
                        scaledSize: new google.maps.Size(element.width, element.height)
                    }
                });
                
                // ИСПРАВЛЕНИЕ: Используем стандартное событие
                marker.addListener('click', function() {
                    handleMarkerClick(infowindow, marker);
                });
            }
            
            allInfoWindows.push(infowindow);
        });
    }
    
    // ИСПРАВЛЕНИЕ: Выносим обработку клика в отдельную функцию
    function handleMarkerClick(infowindow, marker) {
        // Закрываем все другие окна
        allInfoWindows.forEach(function(iw) {
            if (iw !== infowindow) {
                iw.close();
            }
        });
        
        // Открываем новое окно
        infowindow.open({
            anchor: marker,
            map: map
        });
        
        // Добавляем кастомную кнопку закрытия
        setTimeout(function() {
            customizeInfoWindow(infowindow);
        }, 100);
    }
    
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
        }, true);
        
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

window.addEventListener('load', function() {
    if (typeof google !== 'undefined') {
        initMap();
    }
});
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
