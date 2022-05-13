@extends('layouts.main')
    @section('content')
        <x-header/>
		<div class="about-page bg">
			<div class="about-title">{{$location->name}} 
				@isset($location->code)
					({{$location->code}})
				@endisset
			</div>
			<div class="abstract">
				@isset($loc->link_ody)
					<a href="{{$loc->link_ody}}">Перейти к одиссее</a>
				@endisset
			</div>
			<div class="abstract">Координаты:<br>Широта: <span class="italic">{{$location->lat}}</span><br>Долгота: <span class="italic">{{$location->long}}</span></div>
			<div class="abstract">
				<a href="{{$location->url_gmap}}"><img src="{{asset('img/globus.png')}}" alt="link to Google Map"></a>
				<a href="{{$location->url_wiki}}"><img src="{{asset('img/wikimapia.ico')}}" alt="link to Wikimapia"></a>
				<a href="{{$location->url_openstr}}"><img src="{{asset('img/osm.ico')}}" alt="link to OpenStreetMap"></a>
			</div>
			@isset($location->distance)
				<div class="abstract"> 
					Расстояние от Минска: {{$location->distance}}
				</div>
			@endisset
			<div class="abstract">
			Зона засветки: 
				@isset($location->gray){{$location->gray}}@endisset
				@isset($location->blue){{$location->blue}}@endisset
				@isset($location->lightblue){{$location->lightblue}}@endisset
				@isset($location->green){{$location->green}}@endisset
				@isset($location->yellow){{$location->yellow}}@endisset
				@isset($location->orange){{$location->orange}}@endisset
				@isset($location->red){{$location->red}}@endisset
			</div>
			@isset($location->sqm)
				<div class="abstract">Яркость фона неба по показаням SQM-L: <span class="italic">{{$location->sqm}} <sup>m</sup>/"<sup>2</sup></span></div>
			@endisset
			<div class="abstract">
			Рельеф:
				@isset($location->hills){{$location->hills}}@endisset
				@isset($location->valley){{$location->valley}}@endisset
				@isset($location->plato){{$location->plato}}@endisset
			</div>
			<div class="abstract">
			Открытый горизонт:
				@isset($location->south){{$location->south}},@endisset
				@isset($location->north){{$location->north}},@endisset
				@isset($location->west){{$location->west}},@endisset
				@isset($location->east){{$location->east}}@endisset.
			</div>
			<div class="abstract">
			Доступна для видов транспорта:
				@isset($location->auto1){{$location->auto1}},@endisset
				@isset($location->auto2){{$location->auto2}},@endisset
				@isset($location->train){{$location->train}},@endisset
				@isset($location->bus){{$location->bus}}@endisset.
			</div>
			@isset($location->mapimg)
				<div class="image2"><img src="{{asset('/storage/'.$location->mapimg)}}" alt="map image"></div>
			@endisset
			<div class="abstract">{!!$location->description!!}</div>
			@isset($location->pano)
				<div class="image2"><img src="{{asset('/storage/'.$location->pano)}}" alt="panoram image"></div>
			@endisset
		</div>
		<x-footer/>
	@endsection