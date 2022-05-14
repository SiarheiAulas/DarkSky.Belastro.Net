<tr>
    <td>
		<a href="{{Route('locations.show', $loc)}}">{{$loc->name}} 
			@isset($loc->code)
				({{$loc->code}})
			@endisset
		</a>
	</td>
	<td>
		@isset($loc->link_ody)
			<a href="{{$loc->link_ody}}">Перейти к одиссее</a>
		@endisset
	</td>
    <td>{{$loc->distance}}</td>
    <td>{{$loc->lat}}</td>
    <td>{{$loc->long}}</td>
	<td class="location-group"><a href="{{$loc->url_gmap}}"><img src="{{asset('img/globus.png')}}" alt="link to Google Map"></a>
							   <a href="{{$loc->url_wiki}}"><img src="{{asset('img/wikimapia.ico')}}" alt="link to Wikimapia"></a> 
							   <a href="{{$loc->url_openstr}}"><img src="{{asset('img/osm.ico')}}" alt="link to OpenStreetMap"></a>
	</td>
    <td>{{$loc->sqm}}</td>
	<td><a href="{{Route('locations.show', $loc)}}">{!!$loc->description!!}</a></td>
	@auth()
		<td><a href="{{Route('locations.edit', $loc)}}">Редактировать</a></td>
		<td>
			<form action="{{Route('locations.destroy', $loc)}}" method="post">
				@csrf
				<input type="hidden" name="_method" value="DELETE">
				<script>
    				function deleletconfig(){

    					var del=confirm("Вы уверены, что хотите удалить запись?");
						if (del==true){
							alert ("Запись удалена")
    					}else{
							alert("Запись не удалена")
						}
						return del;
						}
				</script>
				<button class="btn btn-danger btn-sm" type="submit" onclick="return deleletconfig()">Удалить</button>
			</form>
		</td>
	@endauth
</tr>