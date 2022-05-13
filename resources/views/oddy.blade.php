@extends('layouts.main')
    @section('content')
        <x-header/>
		<div class="about-page bg">
			<div class="about-title">
				{{$oddy->header}} 
			</div>
			<div class="abstract">
				<a href="{{$oddy->url}}">Перейти к статье на belastro.net</a>
			</div>
			<div class="abstract">{!!$oddy->description!!}</div>
		</div>
		<x-footer/>
	@endsection