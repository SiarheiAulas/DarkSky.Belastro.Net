<tr>
    <td><a href="{{Route('locations.show', $loc->id)}}">{{$loc->name}}</a></td>
    <td>{{$loc->direction}}</td>
    <td>{{$loc->distance}}</td>
    <td>{{$loc->lat}}</td>
    <td>{{$loc->long}}</td>
    <td>{{$loc->sqm}}</td>
    <td>{{$loc->lp}}</td>
    <td>{{$loc->transp}}</td>
	<td><a href="{{Route('locations.show', $loc->id)}}">{!!$loc->description!!}</a></td>
	@auth()
		<td><a href="{{Route('locations.edit', $loc->id)}}">Редактировать</a></td>
		<td>
			<form action="{{Route('locations.destroy', $loc->id)}}" method="post">
				@csrf
				<input type="hidden" name="_method" value="DELETE">
				<button class="btn btn-danger btn-sm" type="submit">Удалить</button>
			</form>
		</td>
	@endauth
</tr>