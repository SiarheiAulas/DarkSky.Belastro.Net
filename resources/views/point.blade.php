@extends('layouts.main')
    @section('content')
        <x-header/>
		<div class="point-page bg clearfix">
			<div class="about-title">{{$location->name}} 
				@isset($location->code)
					({{$location->code}})  
				@endisset
				<a href="{{$location->url_gmap}}"><img src="{{asset('img/globus.png')}}" alt="link to Google Map"></a>
				<a href="{{$location->url_wiki}}"><img src="{{asset('img/wikimapia.ico')}}" alt="link to Wikimapia"></a>
				<a href="{{$location->url_openstr}}"><img src="{{asset('img/osm.ico')}}" alt="link to OpenStreetMap"></a>
			</div>
			<div class="abstract location-group">
				@isset($loc->link_ody)
					<a href="{{$loc->link_ody}}">Перейти к одиссее</a>
				@endisset
			</div>
			<div class="point-column">
				<div class="abstract"><strong>Координаты: </strong><span class="italic">{{$location->lat}}</span> с.ш., <span class="italic">{{$location->long}}</span> в.д.</div>
				@isset($location->distance)
					<div class="abstract"> 
						<strong>Расстояние от Минска: </strong>{{$location->distance}}
					</div>
				@endisset
				<div class="abstract">
				<strong>Рельеф: </strong>
					@isset($location->hills){{$location->hills}}@endisset
					@isset($location->valley){{$location->valley}}@endisset
					@isset($location->plato){{$location->plato}}@endisset
				</div>
			<div class="abstract">
				<strong>Доступна для видов транспорта: </strong>
					@isset($location->auto1){{$location->auto1}},@endisset
					@isset($location->auto2){{$location->auto2}},@endisset
					@isset($location->train){{$location->train}},@endisset
					@isset($location->bus){{$location->bus}}@endisset.
				</div>
			</div>
			<div class="point-column">
				<div class="abstract">
				<strong>Зона засветки: </strong>
					@isset($location->gray){{$location->gray}}@endisset
					@isset($location->blue){{$location->blue}}@endisset
					@isset($location->lightblue){{$location->lightblue}}@endisset
					@isset($location->green){{$location->green}}@endisset
					@isset($location->yellow){{$location->yellow}}@endisset
					@isset($location->orange){{$location->orange}}@endisset
					@isset($location->red){{$location->red}}@endisset
				</div>
				@isset($location->sqm)
					<div class="abstract"><strong>Яркость фона неба по показаням SQM-L: </strong><span class="italic">{{$location->sqm}} <sup>m</sup>/"<sup>2</sup></span></div>
				@endisset
			<div class="abstract">
				<strong>Открытый горизонт: </strong>
					@isset($location->south){{$location->south}},@endisset
					@isset($location->north){{$location->north}},@endisset
					@isset($location->west){{$location->west}},@endisset
					@isset($location->east){{$location->east}}@endisset.
				</div>
			</div>
			<div class="point-column w100">
				<!--@isset($location->mapimg)
					<div class="image2"><img src="{{asset('storage/'.$location->mapimg)}}" alt="map image"></div>
				@endisset -->
				<div class="abstract">{!!$location->description!!}</div>
				<!--@isset($location->pano)
					<div class="image2"><img src="{{asset('/storage/'.$location->pano)}}" alt="panoram image"></div>
				@endisset-->
			</div>
		</div>
		<x-footer/>
	@endsection