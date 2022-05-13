@extends('layouts.main')
    @section('content')
        <x-header/>
        <div class="about-page bg">
			<div class="location-group">
                <div class="about-title">
                    Площадки группы "Infinity" <button class="btn btn-sm" onclick="toggle(infinity);">Показать/Скрыть Описание</button>
                </div>
				<script>
					function toggle(ident){(ident.style.display == 'none') ? ident.style.cssText="display:block" : ident.style.cssText="display:none"}
				</script>
				<div class="abstract hidden text-justify" id="infinity">
					Описание в разработке
				</div>
				@include('tableheader')
				@foreach($location_infinity as $loc)
                @include('inforeach')            
                @endforeach
                    </table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Виктора Жука (г. Брест) <button class="btn btn-sm" onclick="toggle(vBug);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="vBug">
					Виктор Жук (VJiK) - любитель астрономии из Бреста, Беларусь, администратор сайта astrobrest.belastro.net.
				</div>
   				@include('tableheader')
                @foreach($location_vBug as $loc)
				@include('inforeach')            
				@endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадка группы "Бетельгейзе" <button class="btn btn-sm" onclick="toggle(betelgeise);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="betelgeise">
					Лучшая по мнению 2-х наблюдателей группы "БЕТЕЛЬГЕЙЗЕ" площадка для астрономических наблюдений была выбрана в Городище в октябре 2007 г. Эта ближняя, весьма тёмная, с чистым небом наблюдательная площадка ([северо-]восточнее Минска) очень подходит для позиционных наблюдений метеоров вместе с наблюдательной площадкой в Ратомке (на западе Минска) - расстояние между ними 36 км. Обе площадки расположены в чистом поле с отличным обзором неба... На станции Городище есть отапливаемый и удобный зал ожидания, открытый круглосуточно. Иван Брюханов уже разговаривал с работниками станции по вопросу чтобы с наблюдателями в хорошие погодные ночи "оккупировать" зал ожидания - особенно зимой - чтобы обогреться и отдохнуть. Площадка наблюдений располагается на макушке небольшого вспаханного песчаного холма ... 5 минут ходьбы от электрички ... Практически со всех сторон холм экранирован лесопосадками от светового загрязнения. Есть только на юго-западе слабое размытое зарево от Минска и Колодищ, а также несколько неярких фонарей от ближней военной части, расположенной в 100-150 м от площадки наблюдений.
						Иван Сергеевич Брюханов, координатор группы наблюдателей "Бетельгейзе".
				</div>
       				@include('tableheader')
                    @foreach($location_betelgeise as $loc)
	                @include('inforeach')            
					@endforeach  
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки астроклуба "hν" <button class="btn btn-sm" onclick="toggle(hv);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="hv">
					Описание в разработке
				</div>
       				@include('tableheader')
                    @foreach($location_hv as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки астроклуба "Циррус" (г. Гомель) <button class="btn btn-sm" onclick="toggle(cirrus);">Показать/Скрыть Описание</button>
                </div>
				<div>
					<div class="abstract hidden text-justify" id="cirrus">
						Площадка была разведана в ходе погони за просветами в облаках утром 6 июня 2012 г., когда происходил транзит Венеры по диску Солнца.
					</div>
				</div>
       				@include('tableheader')
                    @foreach($location_cirrus as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Ивана Прокопюка (г. Домачево) <button class="btn btn-sm" onclick="toggle(domachevo);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="domachevo">
					За многіе годы наблюденій за небомъ я использовалъ нѣсколько наблюдательныхъ площадокъ, большинство изъ которыхъ сейчасъ не дѣйствующія.
					Постоянно дѣйствующихъ осталось три:
				</div>
       				@include('tableheader')
                    @foreach($location_domachevo as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Обсерватории любителей астрономии <button class="btn btn-sm" onclick="toggle(observatory);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="observatory">Описания стационарных наблюдательных точек ЛА Беларуси
				</div>
       				@include('tableheader')
                    @foreach($location_observatory as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Astroplaces <button class="btn btn-sm" onclick="toggle(astroplaces);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="astroplaces">
					Описание в разработке
				</div>
       				@include('tableheader')
                    @foreach($location_astroplaces as $loc)
	                @include('inforeach')            
                    @endforeach
					</table>
                </div>
            </div>
        </div>
        <x-footer/>
    @endsection
