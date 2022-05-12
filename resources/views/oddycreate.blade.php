@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page">
			@include('errors')
			<form action="{{Route('oddys.store')}}" method="post" enctype="multipart/form-data">
		        @csrf
				<div class="row g-3">
					<div class="col-12">
						<label for="header" class="form-label">Название:</label>
						<input type="text" name="header" id="header" placeholder="Назване Одиссеи" value="{{old('header')}}" class="form-control">
					</div>
					<div class="col-12">
						<label for="url" class="form-label">URL:</label>
						<input type="text" name="url" id="url" placeholder="URL (belastro.net)" value="{{old('url')}}" class="form-control">
					</div>
					<div class="col-12">
						<div class="btn-center">
							<button class="btn btn-primary btn-sm btn-wide", type="submit">Добавить</button>
						</div>
					</div>				
					
				</div>
			</form>
        </div>
        <x-footer/>
    @endsection
