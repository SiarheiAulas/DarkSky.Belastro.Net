@extends('layouts.main')
    @section('content')
        <x-header/>
		<div class="about-page bg">
			<div class="abstract">Если минские астроплощадки выбирались по принципу наименьшего удаления от места проживания участников группы наблюдателей <a href="http://www.infinity.belastro.net" target="_blank">"Infinity"</a> или (реже) по причине доступа к открытому горизонту в нужном направлении, то загородные площадки выбираись гораздо неоднозначнее. Из 97 площадок, разведанных к январю 2020 г. (список и описания см. ниже), три были выбраны по принципу наименьшей удалённости от Минска ("KR", "Ptich" и "PN"), одна в ходе съемки панорам уже разведаных площадок, 13 в ходе автопробега в поисках тёмных площадок, 23 - в ходе выездов на наблюдения, и @php $n=$loc->count()-40; echo $n; @endphp - в ходе {{$oddys->count()}} т.н. <a href="http://www.forum.belastro.net/viewtopic.php?p=3111#3111" target="_blank">"Одиссей в поисках новых астроплощадок"</a>, т.е. своеобразной программы "вылазок" специально с целью разведки потенциально наиболее тёмных из легкодоступных мест Беларуси. К декабрю 2019 г. всего было осуществлено 39 "Одиссей": две в 2008 г., по одной в 2009 и 2010 гг., две в 2011 г., две в 2012 г., две в 2013 г., две в 2014 г., четыре в 2016 г., восемь в 2017 г., четыре в 2018 г., одиннадцать в 2019 г., одна в 2020 г. С отчётами по каждой "Одиссее" вы можете ознакомиться по ссылкам ниже:
			</div>
			<div class="abstract">
				<table class="table  table-sm">
					@foreach($oddys as $oddy)
									<tr>
										<td>
											<a href="{{Route('oddys.show', $oddy)}}">{{$oddy->header}}</a>
										</td>
								@auth()
										<td>
											<a href="{{Route('oddys.edit', $oddy)}}" target="blank">Pедактировать</a>
										</td>
										<td>
											<form action="{{Route('oddys.destroy', $oddy)}}" method="post">
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
					@endforeach
				</table>
			</div>
		</div>
		<x-footer/>
	@endsection