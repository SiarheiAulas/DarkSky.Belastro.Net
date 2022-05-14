<aside>
        <div class="filtr">
            <div class="filter-name">Фильтр параметров</div>
        <form  action="{{Route('filter')}}" method="get">
            <fieldset>
                <legend>Зона засветки</legend>
                <div class="radio">
                    <input type="checkbox" id="gray" name="lp[gray]" value="Серая">
                    <label for="gray">Серая</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="blue" name="lp[blue]" value="Синяя">
                    <label for="blue">Синяя</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="lightblue" name="lp[lightblue]" value="Голубая">
                    <label for="lightblue">Голубая</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="green" name="lp[green]" value="Зеленая">
                    <label for="green">Зеленая</label>
                </div>
				<div class="radio">
                    <input type="checkbox" id="yellow" name="lp[yellow]" value="Желтая">
                    <label for="yellow">Желтая</label>
                </div><div class="radio">
                    <input type="checkbox" id="orange" name="lp[orange]" value="Оранжевая">
                    <label for="orange">Оранжевая</label>
                </div><div class="radio">
                    <input type="checkbox" id="red" name="lp[red]" value="Красная">
                    <label for="lp">Красная</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Чистый горизонт</legend>
                <div class="radio">
                    <input type="checkbox" id="south" name="horizon[south]" value="На юге">
                    <label for="south">На юге</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="north" name="horizon[north]" value="На севере">
                    <label for="north">На севере</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="west" name="horizon[west]" value="На западе">
                    <label for="west">На западе</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="east" name="horizon[east]" value="На востоке">
                    <label for="east">На востоке</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Рельеф</legend>
                <div class="radio">
                    <input type="checkbox" id="hills" name="relief[hills]" value="Холмы">
                    <label for="hills">Холмы</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="valley" name="relief[valley]" value="Низина">
                    <label for="valley">Низина</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="plato" name="relief[plato]" value="Плато">
                    <label for="plato">Плато</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Доступна для транспорта</legend>
                <div class="radio">
                    <input type="checkbox" id="auto1" name="transport[auto1]" value="Автомобиль (легковой)">
                    <label for="auto1">Автомобиль (легковой)</label>
                </div>
				<div class="radio">
                    <input type="checkbox" id="auto2" name="transport[auto2]" value="Автомобиль (внедорожник)">
                    <label for="auto2">Автомобиль (внедорожник)</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="train" name="transport[train]" value="Поезд">
                    <label for="train">Поезд</label>
                </div>
                <div class="radio">
                    <input type="checkbox" id="bus" name="transport[bus]" value="Автобус">
                    <label for="bus">Автобус</label>
                </div>
            </fieldset>
			<fieldset>
				<legend>Максимальное расстояние от Минска</legend>
				<div>
					<input type="range" id="distance" name="distance" min="0" max="500" oninput="rangevalue.value=value"><br>
					<label for="distance">по прямой, км: </label>
					<output id="rangevalue">50</output>
				</div>
			</fieldset>
            <fieldset>
            	<button type="submit" class="btn btn-primary mybtn1" >Показать</button>
            	<button type="reset" class="btn btn-primary mybtn1" >Сброс</button>
            	<div class="btn btn-primary mybtn2">
            	    <a href="{{Route('index')}}">Очистить карту</a>
            	</div>
            </fieldset>
        </form>
    </div>
</aside>