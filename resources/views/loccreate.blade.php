@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page">
			@include('errors')
			<form action="{{Route('locations.store')}}" method="post" enctype="multipart/form-data">
		        @csrf
				<div class="row g-3">
					<div class="col-4">
						<label for="name" class="form-label">Название</label>
						<input type="text" name="name" id="name" placeholder="Назване площадки" value="{{old('name')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="lat" class="form-label">Широта</label>
						<input type="text" name="lat" id="lat" placeholder="Широта местности в формате google maps" value="{{old('lat')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="long" class="form-label">Долгота</label>
						<input type="text" name="long" id="long" placeholder="Долгота местности в формате google maps" value="{{old('long')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="direction" class="form-label">Направление</label>
						<select name="direction" id="direction" placeholder="Направление по отношению к Минску" class="form-control">
							<option value="s">Юг</option>
							<option value="n">Север</option>
							<option value="w">Запад</option>
							<option value="e">Восток</option>
						</select>
					</div>
					<div class="col-4">
						<label for="distance" class="form-label">Расстояние от Минска</label>
						<input type="text" name="distance" id="distance" placeholder="км" value="{{old('distance')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="transp" class="form-label">Транспортная доступность</label>
						<select name="transp" id="transp" placeholder="Транспортная доступность" class="form-control">
							<option value="auto">Авто</option>
							<option value="train">Поезд</option>
							<option value="bus">Автобус</option>
						</select>
					</div>
					<div class="col-4">
						<label for="lp" class="form-label">Зона засветки</label>
						<select name="lp" id="lp" placeholder="Зона засветки" class="form-control">
							<option value="gray">Серая</option>
							<option value="blue">Синяя</option>
							<option value="lightblue">Голубая</option>
							<option value="green">Зеленая</option>
							<option value="yellow">Желтая</option>
							<option value="orange">Оранжевая</option>
							<option value="red">Красная</option>
						</select>
					</div>
					<div class="col-4">
						<label for="sqm" class="form-label">SQM</label>
						<input type="text" name="sqm" id="sqm" placeholder="Актуальный уровень яркости фона неба" value="{{old('sqm')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="horizon" class="form-label">Открытый горизонт</label>
						<select name="horizon" id="horizon" placeholder="Зона засветки" class="form-control">
							<option value="s">Юг</option>
							<option value="n">Север</option>
							<option value="w">Запад</option>
							<option value="e">Восток</option>
						</select>
					</div>
					<div class="col-4">
						<label for="hills" class="form-label">Холмы</label>
						<select name="hills" id="hills" placeholder="Холмы" class="form-control">
							<option value="t">Да</option>
							<option value="f">Нет</option>
						</select>
					</div>
					<div class="col-4">
						<label for="host" class="form-label">Кто открыл</label>
						<select name="host" id="host" placeholder="Кто открыл" class="form-control">
							<option value="infinity">Infinity</option>
							<option value="vBug">Виктор Жук</option>
							<option value="betelgeise">Betelgeise</option>
							<option value="hv">Клуб hv</option>
							<option value="cirrus">Клуб Cirrus</option>
							<option value="domachevo">Иван Прокопюк</option>
							<option value="observatory">Обсерватория</option>
							<option value="astroplaces">AstroPlaces</option>
						</select>
					</div>
					<div class="col-4">
						<label for="url" class="form-label">URL</label>
						<input type="text" name="url" id="url" placeholder="Url страницы с подробным описанием" value="{{old('url')}}" class="form-control">
					</div>
					<div class="col-12">
						<label for="description", class="form-label">Краткое описание</label>
						<textarea id="description", class="form-control textarea-height", name="description", placeholder="Введите краткое описание для отображения на карте">{{old('description')}}</textarea>
						<script>
                        tinymce.init({
                            selector: 'textarea',
                            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                            toolbar_mode: 'floating',
                            tinycomments_mode: 'embedded',
                            tinycomments_author: 'Author name',
                        });
                    </script>
        			</div>
					<div class="col-6">
						<div class="custom-file">
							<label for="mapimg" class="custom-file-label">Выберите файл изображения карты</label>
							<input type="file" name="mapimg" id="mapimg" class="custom-file-input">
						</div>
						<div class="custom-file">
							<label for="pano" class="custom-file-label">Выберите файл изображения панорамы</label>
							<input type="file" name="pano" id="pano" class="custom-file-input">
						</div>
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
