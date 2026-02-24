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
Группа любителей астрономии <a href="https://www.infinity.belastro.net/" target="blanc">«Infinity»</a> — это сообщество любителей астрономии из Минска, Беларусь, сформировавшееся в середине 2000-х годов вокруг идеи совместных наблюдений и популяризации астрономии. Участники группы занимаются визуальными наблюдениями, астрофотографией, видеосъёмкой, наблюдением астрономических событий, в том числе выездными экспедициями за пределы города. «Infinity» активно участвует в объединении любителей астрономии Беларуси и стояла у истоков портала <a href="https://www.belastro.net" target="blanc">belastro.net</a>.				</div>
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
					Виктор Жук (VJiK) - любитель астрономии из Бреста, Беларусь, администратор сайта <a href="https://www.astrobrest.belastro.net" target="blanc">astrobrest.belastro.net</a>.
				</div>
   				@include('tableheader2')
                @foreach($location_vBug as $loc)
				@include('inforeach2')            
				@endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадка группы "Бетельгейзе" <button class="btn btn-sm" onclick="toggle(betelgeise);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="betelgeise">
Группа любителей астрономии «Бетельгейзе» — неформальное объединение наблюдателей из Минска и его окрестностей, активно работавшее в области визуальных и фотографических астрономических наблюдений. Участники группы уделяли особое внимание практическим наблюдениям, в том числе программам наблюдения метеоров и переменных звезд, а также поиску и оценке условий для качественных наблюдений. Координацией деятельности группы занимался Иван Сергеевич Брюханов.
				</div>
       				@include('tableheader2')
                    @foreach($location_betelgeise as $loc)
	                @include('inforeach2')            
					@endforeach  
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки астроклуба "hν" <button class="btn btn-sm" onclick="toggle(hv);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="hv">
<a href="https://hv.planetarium.by/about" target="blanc">Клуб любителей астрономии «hν»</a> («аш-ню») был основан 1 ноября 2008 года при Минском планетарии по инициативе самих минских любителей астрономии. Ядром клуба стала группа «Infinity», к которой со временем присоединились как опытные, так и начинающие наблюдатели. Клуб объединяет людей для общения, совместных наблюдений и популяризации астрономии и открыт для всех, кто интересуется звёздным небом.				</div>
       				@include('tableheader2')
                    @foreach($location_hv as $loc)
	                @include('inforeach2')            
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
Гомельский астрономический клуб «Циррус» — объединение любителей астрономии из Гомеля и Гомельской области. Участники клуба занимались астрономическими наблюдениями и популяризацией астрономии, поддерживали контакты с астроклубами страны и за рубежом. Руководителем клуба являлся Игорь Балюк.					</div>
				</div>
       				@include('tableheader2')
                    @foreach($location_cirrus as $loc)
	                @include('inforeach2')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Ивана Прокопюка (г. Домачево) <button class="btn btn-sm" onclick="toggle(domachevo);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="domachevo">
Иван Прокопюк — любитель астрономии из г. Домачево, Брестская область. Иван ведёт <a href="https://astronomy.domachevo.com/" target="blanc">сайт о наблюдательной астрономии</a> в своем регионе и проект по наблюдению <a href="https://www.aurora.belastro.net/" target="blanc">северных сияний.</a>
				</div>
       				@include('tableheader2')
                    @foreach($location_domachevo as $loc)
	                @include('inforeach2')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Обсерватории любителей астрономии <button class="btn btn-sm" onclick="toggle(observatory);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="observatory">Частные обсерватории — это индивидуальные площадки, предназначенные для астрономических наблюдений и астрофотографии в комфортных стационарных условиях. Многие из них оборудованы для удаленной или автоматизированной работы. Некоторые обсерватории имеют код <a href="https://www.minorplanetcenter.net/" target="blanc"> МРС</a>.
				</div>
       				@include('tableheader2')
                    @foreach($location_observatory as $loc)
	                @include('inforeach2')            
                    @endforeach
					</table>
                </div>
            </div>
            <div class="location-group">
                <div class="about-title">
                    Площадки Astroplaces <button class="btn btn-sm" onclick="toggle(astroplaces);">Показать/Скрыть Описание</button>
                </div>
				<div class="abstract hidden text-justify" id="astroplaces">
Наблюдательные площадки, разведанные любителями астрономии из Минска и области, которые объединяются для совместных выездов и обмена информацией через мессенджеры и социальные сети.				</div>
       				@include('tableheader2')
                    @foreach($location_astroplaces as $loc)
	                @include('inforeach2')            
                    @endforeach
					</table>
                </div>
            </div>
        </div>
        <x-footer/>
    @endsection
