@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page bg">
			@include('errors')
			<form action="{{Route('oddys.update', $oddy)}}" method="post" enctype="multipart/form-data">
		        @csrf
				<div class="row g-3">
					<div class="col-12">
						<input type="hidden", name="_method", value="PUT">
						<label for="header" class="form-label">* Название:</label>
						<input type="text" name="header" id="header" placeholder="Назване Одиссеи" value="{{$oddy->header}}" class="form-control">
					</div>
					<!--<div class="col-12">
						<label for="url" class="form-label">URL:</label>
						<input type="text" name="url" id="url" placeholder="URL (belastro.net)" value="{{$oddy->url}}" class="form-control">
					</div>-->
					<div class="col-12">
						<label for="description", class="form-label">Текст статьи</label>
						<textarea id="description", class="form-control textarea-height", name="description", placeholder="Введите текст статьи">{{$oddy->description}}</textarea>
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
