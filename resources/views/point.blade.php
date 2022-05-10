@extends('layouts.main')
    @section('content')
        <x-header/>
		<div class="about-page">
			<div class="about-title">{{$location->name}}</div>
			<div class="abstract">Координаты:<br>Широта: <span class="italic">{{$location->lat}}</span><br>Долгота: <span class="italic">{{$location->long}}</span></div>
			@isset($location->direction)
				<div class="abstract">Направление от Минска: {{$location->direction}} 
					@isset($location->distance)
						<br>Расстояние от Минска: {{$location->distance}}
					@endisset
				</div>
			@endisset
			@isset($location->sqm)
				<div class="abstract">Яркость фона неба по показаням SQM-L: <span class="italic">{{$location->sqm}} <sup>m</sup>/"<sup>2</sup></span></div>
			@endisset
			@isset($location->mapimg)
				<div class="image2"><img src="{{asset('/storage/'.$location->mapimg)}}" alt="map image"></div>
			@endisset
			<div class="abstract">{!!$location->description!!}</div>
			@isset($location->pano)
				<div class="image2"><img src="{{asset('/storage/'.$location->pano)}}" alt="panoram image"></div>
			@endisset
			@isset($location->url)
				<div class="abstract"><a href="{{$location->url}}">Ссылка на расширенное описание</a></div>
			@endisset
		</div>
		<x-footer/>
	@endsection