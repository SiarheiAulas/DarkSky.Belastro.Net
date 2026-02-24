@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page bg">
			@include('errors')
			<form action="{{Route('locations.update', $location)}}" method="post" enctype="multipart/form-data">
		        @csrf
				<div class="row g-3">
					<div class="col-4">
						<input type="hidden", name="_method", value="PUT">
						<label for="name" class="form-label">* Название</label>
						<input type="text" name="name" id="name" placeholder="Назване площадки" value="{{$location->name}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="code" class="form-label">Буквенный код</label>
						<input type="text" name="code" id="code" value="{{$location->code}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="link_ody" class="form-label">Ссылка на Одиссею</label>
						<input type="text" name="link_ody" id="link_ody" placeholder="Если открыта в ходе Одиссеи" value="{{$location->link_ody}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="lat" class="form-label">* Широта</label>
						<input type="text" name="lat" id="lat" placeholder="Широта местности в формате google maps" value="{{$location->lat}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="long" class="form-label">* Долгота</label>
						<input type="text" name="long" id="long" placeholder="Долгота местности в формате google maps" value="{{$location->long}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="url_gmap" class="form-label">Ссылка на GoogleMaps</label>
						<input type="text" name="url_gmap" id="url_gmap" value="{{$location->url_gmap}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="url_wiki" class="form-label">Ссылка на Wikimapia</label>
						<input type="text" name="url_wiki" id="url_wiki" value="{{$location->url_wiki}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="url_openstr" class="form-label">Ссылка на OpenStreetMap</label>
						<input type="text" name="url_openstr" id="url_openstr" value="{{$location->url_openstr}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="distance" class="form-label">Расстояние от Минска</label>
						<input type="text" name="distance" id="distance" placeholder="по прямой, км" value="{{$location->distance}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="sqm" class="form-label">SQM</label>
						<input type="text" name="sqm" id="sqm" placeholder="Актуальный уровень яркости фона неба" value="{{$location->sqm}}" class="form-control">
					</div>
					<div class="col-4">
						<label for="host" class="form-label">* Кто открыл</label>
						<select name="host" id="host" placeholder="Кто открыл" class="form-control">
							<option value="infinity" {{ $location->host == 'infinity' ? 'selected' : '' }}>Infinity</option>
							<option value="vBug" {{ $location->host == 'vBug' ? 'selected' : '' }}>Виктор Жук</option>
							<option value="betelgeise" {{ $location->host == 'betelgeise' ? 'selected' : '' }}>Betelgeise</option>
							<option value="hv" {{ $location->host == 'hv' ? 'selected' : '' }}>Клуб hv</option>
							<option value="cirrus" {{ $location->host == 'cirrus' ? 'selected' : '' }}>Клуб Cirrus</option>
							<option value="domachevo" {{ $location->host == 'domachevo' ? 'selected' : '' }}>Иван Прокопюк</option>
							<option value="observatory" {{ $location->host == 'observatory' ? 'selected' : '' }}>Обсерватория</option>
							<option value="astroplaces" {{ $location->host == 'astroplaces' ? 'selected' : '' }}>AstroPlaces</option>
						</select>
					</div>
					<div>
						<fieldset>
							<legend>Зона засветки</legend>
							<input type="radio" id="gray" name="lp" value="Серая" {{ $location->gray == 'Серая' ? 'checked' : '' }}>
							<label for="gray">Серая</label>
							
							<input type="radio" id="blue" name="lp" value="Синяя" {{ $location->blue == 'Синяя' ? 'checked' : '' }}>
							<label for="blue">Синяя</label>
							
							<input type="radio" id="lightblue" name="lp" value="Голубая" {{ $location->lightblue == 'Голубая' ? 'checked' : '' }}>
							<label for="lightblue">Голубая</label>
							
							<input type="radio" id="green" name="lp" value="Зеленая" {{ $location->green == 'Зеленая' ? 'checked' : '' }}>
							<label for="green">Зеленая</label>
							
							<input type="radio" id="yellow" name="lp" value="Желтая" {{ $location->yellow == 'Желтая' ? 'checked' : '' }}>
							<label for="yellow">Желтая</label>
							
							<input type="radio" id="orange" name="lp" value="Оранжевая" {{ $location->orange == 'Оранжевая' ? 'checked' : '' }}>
							<label for="orange">Оранжевая</label>
							
							<input type="radio" id="red" name="lp" value="Красная" {{ $location->red == 'Красная' ? 'checked' : '' }}>
							<label for="red">Красная</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Открытый горизонт</legend>
							<input type="checkbox" id="south" name="south" value="На юге" {{ $location->south ? 'checked' : '' }}>
                    		<label for="south">На юге</label>
							
							<input type="checkbox" id="north" name="north" value="На севере" {{ $location->north ? 'checked' : '' }}>
                    		<label for="north">На севере</label>
							
							<input type="checkbox" id="west" name="west" value="На западе" {{ $location->west ? 'checked' : '' }}>
							<label for="west">На западе</label>
							
							<input type="checkbox" id="east" name="east" value="На востоке" {{ $location->east ? 'checked' : '' }}>
                    		<label for="east">На востоке</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Рельеф</legend>
							<input type="radio" id="hills" name="relief" value="Холмы" {{ $location->hills == 'Холмы' ? 'checked' : '' }}>
							<label for="hills">Холмы</label>
							
							<input type="radio" id="valley" name="relief" value="Низина" {{ $location->valley == 'Низина' ? 'checked' : '' }}>
							<label for="valley">Низина</label>
							
							<input type="radio" id="plato" name="relief" value="Плато" {{ $location->plato == 'Плато' ? 'checked' : '' }}>
							<label for="plato">Равнина</label>
						</fieldset>
					</div>
					<div>
						<fieldset>
							<legend>Транспортная доступность</legend>
							<input type="checkbox" id="auto1" name="auto1" value="Автомобиль (легковой)" {{ $location->auto1 ? 'checked' : '' }}>
                    		<label for="auto1">Автомобиль (легковой)</label>
							
							<input type="checkbox" id="auto2" name="auto2" value="Автомобиль (внедорожник)" {{ $location->auto2 ? 'checked' : '' }}>
                    		<label for="auto2">Автомобиль (внедорожник)</label>
							
							<input type="checkbox" id="train" name="train" value="Поезд" {{ $location->train ? 'checked' : '' }}>
                    		<label for="train">Поезд</label>
							
							<input type="checkbox" id="bus" name="bus" value="Автобус" {{ $location->bus ? 'checked' : '' }}>
                    		<label for="bus">Автобус</label>
						</fieldset>
					</div>
					<div class="col-12">
						<label for="brief", class="form-label">* Краткое описание</label>
						<textarea id="brief", class="form-control textarea-height", name="brief", placeholder="Введите краткое описание до 500 знаков для отображения в таблице и на карте">{{$location->brief}}</textarea>
					</div>
					<div class="col-12">
						<label for="description", class="form-label">* Полное описание площадки</label>
						<textarea id="description", class="form-control textarea-height", name="description", placeholder="Введите описание">{{$location->description}}</textarea>
						<script>
                        		tinymce.init({
    selector: 'textarea#description',
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
    promotion: false,
    branding: false,
    file_picker_types: 'image',
    images_upload_handler: function(blobInfo, success, failure) {
        var xhr, formData;
        var file = blobInfo.blob();
        
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/upload');
        
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        xhr.onload = function() {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        
        formData = new FormData();
        formData.append('file', file, file.name);
        
        xhr.send(formData);
    },
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];
            
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
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
					<!-- <div class="col-12">
						<label for="mapimg" class="form-label">Карта</label>
						<input type="file" name="mapimg" id="mapimg" class="form-control">
						@if($location->mapimg)
							<small>Текущий файл: {{$location->mapimg}}</small>
						@endif
					</div>
					<div class="col-12">
						<label for="pano" class="form-label">Панорама</label>
						<input type="file" name="pano" id="pano" class="form-control">
						@if($location->pano)
							<small>Текущий файл: {{$location->pano}}</small>
						@endif
					</div>-->
					<div class="col-12">
						<div class="btn-center">
							<button class="btn btn-primary btn-sm btn-wide", type="submit">Обновить</button>
						</div>
					</div>					
				</div>
			</form>
        </div>
        <x-footer/>
    @endsection