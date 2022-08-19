@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page bg">
			@include('errors')
			<form action="{{Route('locations.store')}}" method="post" enctype="multipart/form-data">
		        @csrf
				<div class="row g-3">
					<div class="col-4">
						<label for="name" class="form-label">Название</label>
						<input type="text" name="name" id="name" placeholder="Назване площадки" value="{{old('name')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="code" class="form-label">Буквенный код</label>
						<input type="text" name="code" id="code" value="{{old('code')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="link_ody" class="form-label">Ссылка на Одиссею</label>
						<input type="text" name="link_ody" id="link_ody" placeholder="Если открыта в ходе Одиссеи" value="{{old('link_ody')}}" class="form-control">
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
						<label for="url_gmap" class="form-label">Ссылка на GoogleMaps</label>
						<input type="text" name="url_gmap" id="url_gmap" placeholder="Долгота местности в формате google maps" value="{{old('url_gmap')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="url_wiki" class="form-label">Ссылка на Wikimapia</label>
						<input type="text" name="url_wiki" id="url_wiki" placeholder="Долгота местности в формате google maps" value="{{old('url_wiki')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="url_openstr" class="form-label">Ссылка на OpenStreetMap</label>
						<input type="text" name="url_openstr" id="url_openstr" placeholder="Долгота местности в формате google maps" value="{{old('url_openstr')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="distance" class="form-label">Расстояние от Минска</label>
						<input type="text" name="distance" id="distance" placeholder="по прямой, км" value="{{old('distance')}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="sqm" class="form-label">SQM</label>
						<input type="text" name="sqm" id="sqm" placeholder="Актуальный уровень яркости фона неба" value="{{old('sqm')}}" class="form-control">
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
					<div>
						<fieldset>
							<legend>Зона засветки</legend>
							<input type="radio" id="gray" name="lp" value="Серая">
							<label for="gray">Серая</label>
							<input type="radio" id="blue" name="lp" value="Синяя">
							<label for="blue">Синяя</label>
							<input type="radio" id="lightblue" name="lp" value="Голубая">
							<label for="lightblue">Голубая</label>
							<input type="radio" id="green" name="lp" value="Зеленая">
							<label for="green">Зеленая</label>
							<input type="radio" id="yellow" name="lp" value="Желтая">
							<label for="yellow">Желтая</label>
							<input type="radio" id="orange" name="lp" value="Оранжевая">
							<label for="orange">Оранжевая</label>
							<input type="radio" id="red" name="lp" value="Красная">
							<label for="red">Красная</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Открытый горизонт</legend>
							<input type="checkbox" id="south" name="south" value="На юге">
                    		<label for="south">На юге</label>
							<input type="checkbox" id="north" name="north" value="На севере">
                    		<label for="north">На севере</label>
							<input type="checkbox" id="west" name="west" value="На западе">
							<label for="west">На западе</label>
							<input type="checkbox" id="east" name="east" value="На востоке">
                    		<label for="east">На востоке</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Рельеф</legend>
							<input type="radio" id="hills" name="relief" value="Холмы">
							<label for="hills">Холмы</label>
							<input type="radio" id="valley" name="relief" value="Низина">
							<label for="valley">Низина</label>
							<input type="radio" id="plato" name="relief" value="Плато">
							<label for="plato">Плато</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Транспортная доступность</legend>
							<input type="checkbox" id="auto1" name="auto1" value="Автомобиль (легковой)">
                    		<label for="auto1">Автомобиль (легковой)</label>
							<input type="checkbox" id="auto2" name="auto2" value="Автомобиль (внедорожник)">
                    		<label for="auto2">Автомобиль (внедорожник)</label>
							<input type="checkbox" id="train" name="train" value="Поезд">
                    		<label for="train">Поезд</label>
							<input type="checkbox" id="bus" name="bus" value="Автобус">
                    		<label for="bus">Автобус</label>
						</fieldset>
					</div>
					<div class="col-12">
						<label for="description", class="form-label">Краткое описание до 500 знаков (для отображения в списке)</label>
						<textarea id="description", class="form-control textarea-height", name="brief", placeholder="Введите краткое описание для отображения на карте">{{old('brief')}}</textarea>
					</div>
					<div class="col-12">
						<label for="description", class="form-label">Полное описание площадки</label>
						<textarea id="description", class="form-control textarea-height", name="description", placeholder="Введите описание">{{old('description')}}</textarea>
							<script>
                        		tinymce.init({
                        		    selector: 'textarea',
									height: 650,
                        		    plugins: [
										"advlist autolink lists link image charmap print preview anchor",
										"searchreplace visualblocks code fullscreen",
										"insertdatetime media table contextmenu paste imagetools"
									],
									toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                        		    toolbar_mode: 'floating',
                        		    tinycomments_mode: 'embedded',
                        		    tinycomments_author: 'Author name',
									image_title: true,
									automatic_uploads: true,
									images_upload_url: '/upload',
									file_picker_types: 'image',
									file_picker_callback: function(cb, value, meta) {
										var input = document.createElement('input');
										input.setAttribute('type', 'file');
										input.setAttribute('accept', 'image/*');
										input.onchange = function() {
											var file = this.files[0];
											
											var reader = new FileReader();
											reader.readAsDataURL(file);
											reader.onload = function () {
												var id = 'blobid' + (new Date()).getTime();
												var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
												var base64 = reader.result.split(',')[1];
												var blobInfo = blobCache.create(id, file, base64);
													blobCache.add(blobInfo);
													cb(blobInfo.blobUri(), { title: file.name });
											};
										};
										input.click();
            						}
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
