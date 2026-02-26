<aside id="filtersAside">
       <div class="filtr" bis_skin_checked="1">
            <div class="filter-name">Фильтр параметров</div>
        <form  id="filter-form" action="{{Route('filter')}}" method="get">
            <fieldset>
                <legend>Зона засветки</legend>
                <div class="radio">
                    <input type="checkbox" id="gray" name="lp[gray]" value="Серая" {{ request()->has('lp.gray') ? 'checked' : '' }}>
                    <label for="gray">Серая</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="blue" name="lp[blue]" value="Синяя" {{ request()->has('lp.blue') ? 'checked' : '' }}>
                    <label for="blue">Синяя</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="lightblue" name="lp[lightblue]" value="Голубая" {{ request()->has('lp.lightblue') ? 'checked' : '' }}>
                    <label for="lightblue">Голубая</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="green" name="lp[green]" value="Зеленая" {{ request()->has('lp.green') ? 'checked' : '' }}>
                    <label for="green">Зеленая</label>
                </div>
				<div class="radio">
                    <input type="checkbox" id="yellow" name="lp[yellow]" value="Желтая" {{ request()->has('lp.yellow') ? 'checked' : '' }}>
                    <label for="yellow">Желтая</label>
                </div><div class="radio">
                    <input type="checkbox" id="orange" name="lp[orange]" value="Оранжевая" {{ request()->has('lp.orange') ? 'checked' : '' }}>
                    <label for="orange">Оранжевая</label>
                </div><div class="radio">
                    <input type="checkbox" id="red" name="lp[red]" value="Красная" {{ request()->has('lp.red') ? 'checked' : '' }}>
                    <label for="red">Красная</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Чистый горизонт</legend>
                <div class="radio">
                    <input type="checkbox" id="south" name="horizon[south]" value="На юге" {{ request()->has('horizon.south') ? 'checked' : '' }}>
                    <label for="south">На юге</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="north" name="horizon[north]" value="На севере" {{ request()->has('horizon.north') ? 'checked' : '' }}>
                    <label for="north">На севере</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="west" name="horizon[west]" value="На западе" {{ request()->has('horizon.west') ? 'checked' : '' }}>
                    <label for="west">На западе</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="east" name="horizon[east]" value="На востоке" {{ request()->has('horizon.east') ? 'checked' : '' }}>
                    <label for="east">На востоке</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Рельеф</legend>
                <div class="radio">
                    <input type="checkbox" id="hills" name="relief[hills]" value="Холмы" {{ request()->has('relief.hills') ? 'checked' : '' }}>
                    <label for="hills">Холмы</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="valley" name="relief[valley]" value="Низина" {{ request()->has('relief.valley') ? 'checked' : '' }}>
                    <label for="valley">Низина</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="plato" name="relief[plato]" value="Плато" {{ request()->has('relief.plato') ? 'checked' : '' }}>
                    <label for="plato">Равнина</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Доступна для транспорта</legend>
                <div class="radio">
                    <input type="checkbox" id="auto1" name="transport[auto1]" value="Автомобиль (легковой)" {{ request()->has('transport.auto1') ? 'checked' : '' }}>
                    <label for="auto1">Автомобиль (легковой)</label>
                </div>
				<div class="radio">
                    <input type="checkbox" id="auto2" name="transport[auto2]" value="Автомобиль (внедорожник)" {{ request()->has('transport.auto2') ? 'checked' : '' }}>
                    <label for="auto2">Автомобиль (внедорожник)</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="train" name="transport[train]" value="Поезд" {{ request()->has('transport.train') ? 'checked' : '' }}>
                    <label for="train">Поезд</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="bus" name="transport[bus]" value="Автобус" {{ request()->has('transport.bus') ? 'checked' : '' }}>
                    <label for="bus">Автобус</label>
                </div>
            </fieldset>
	    <fieldset>
	    		<!--<legend>Максимальное расстояние от Минска</legend>-->
	    		<legend>Поиск в радиусе</legend>
			<input type="hidden" id="user_lat" name="user_lat" value="">
	    		<input type="hidden" id="user_long" name="user_long" value="">
			<div>
				<input type="range" id="distance" name="distance" min="0" max="400" value="{{ request('distance', 400) }}" oninput="rangevalue.value=value"><br>
				<label for="distance">расстояние по прямой, км: </label>
				<output id="rangevalue">{{ request('distance', 400) }}</output>
				<p>Требуется доступ к геолокации; <br> Позиция по умолчанию: Минск </p>
			</div>
	    </fieldset>
            <fieldset>
            	<button type="submit" class="btn btn-primary mybtn2" >Показать</button>
            	<!--<button type="submit" class="btn btn-primaыry mybtn1" >Показать</button>
            	<button type="reset" class="btn btn-primary mybtn1" >Сброс</button>-->
            	<div class="btn btn-primary mybtn2">
            	    <a href="{{Route('index')}}">Очистить</a>
            	</div>
            </fieldset>
        </form>
    </div>
    <div class="filtr" bis_skin_checked="1">
	<div class="legend-header"><h5>Легенда</h5></div>
	<div class="legend">
		<div><img src="{{asset('img/3r.png')}}" alt="маркер Группа Infinity"> Группа Infinity</div>
		<div><img src="{{asset('img/2r.png')}}" alt="маркер Клуб hv"> Клуб hv</div>
		<div><img src="{{asset('img/6r.png')}}" alt="маркер Виктор Жук"> Виктор Жук</div>
		<div><img src="{{asset('img/4r.png')}}" alt="маркер Группа Betelgeise"> Группа Betelgeise</div>
	</div>
	<div>
		<div><img src="{{asset('img/1r.png')}}" alt="маркер Клуб Cirrus"> Клуб Cirrus</div>
		<div><img src="{{asset('img/5r.png')}}" alt="маркер Иван Прокопюк"> Иван Прокопюк</div>
		<div><img src="{{asset('img/7r.png')}}" alt="маркер Обсерватории"> Обсерватории</div>
		<div><img src="{{asset('img/8r.png')}}" alt="маркер Astroplaces"> Astroplaces</div>
	</div>
    </div>
    <script src="{{asset('js/distance.js')}}"></script>
</aside>