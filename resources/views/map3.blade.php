@extends('layouts.main')
    @section('content')
        <x-header/>
        <main>
	<div id="map"></div>
           <script>
    var src = "{{asset('img/newkml/belarus.kml')}}";

    function initMap() {
        var minsk = {lat: 53.90305300751979, lng: 27.563067765684398},
        myMapOptions = {
            center: minsk,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 10,
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
        
        // Храним все InfoWindow для доступа
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
            
            // При клике на маркер
            marker.addListener('click', function() {
                // Закрываем все другие окна
                allInfoWindows.forEach(function(iw) {
                    if (iw !== infowindow) {
                        iw.close();
                    }
                });
                
                // Открываем текущее окно
                infowindow.open(map, marker);
                
                // Отложенная инициализация - ждем пока Google создаст DOM
                setTimeout(function() {
                    customizeInfoWindow(infowindow);
                }, 100);
            });
        });
        
        // Функция кастомизации окна
        function customizeInfoWindow(infowindow) {
            // Находим текущее открытое окно
            var infoWindowDiv = document.querySelector('.gm-style-iw-c');
            if (!infoWindowDiv) return;
            
            // Находим контейнер контента
            var contentContainer = infoWindowDiv.querySelector('div[style*="overflow"]') || 
                                   infoWindowDiv.firstElementChild;
            if (!contentContainer) return;
            
            // Проверяем, есть ли уже наша кнопка
            if (contentContainer.querySelector('.custom-close-btn')) {
                return;
            }
            
            // Скрываем стандартную кнопку Google
            var googleCloseBtn = infoWindowDiv.querySelector('.gm-ui-hover-effect');
            if (googleCloseBtn) {
                googleCloseBtn.style.display = 'none';
            }
            
            // Создаем нашу кнопку
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
                line-height: 20px;
                text-align: center;
                cursor: pointer;
                z-index: 1000;
                padding: 0;
                margin: 0;
                color: #666;
                outline: none;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                transition: all 0.2s;
            `;
            
            // Hover эффекты
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
            
            // Обработчик клика
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                infowindow.close();
            }, true); // Используем capture phase
            
            // Добавляем padding к контенту для кнопки
            contentContainer.style.position = 'relative';
            contentContainer.style.paddingRight = '30px';
            contentContainer.style.paddingTop = '5px';
            
            // Добавляем кнопку в контейнер
            contentContainer.appendChild(closeBtn);
        }
        
        // Слушаем все клики на карте через делегирование
        map.getDiv().addEventListener('click', function(e) {
            // Если кликнули на кнопку закрытия (стандартную Google)
            if (e.target.closest('.gm-ui-hover-effect')) {
                e.preventDefault();
                e.stopPropagation();
                
                // Находим соответствующее InfoWindow и закрываем его
                var infoWindowDiv = e.target.closest('.gm-style-iw-c');
                if (infoWindowDiv) {
                    // Закрываем все окна (простой способ)
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
        <x-aside/>
        <x-footer/>
    @endsection
