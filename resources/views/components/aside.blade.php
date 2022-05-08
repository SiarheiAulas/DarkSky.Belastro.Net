<aside>
        <div class="filtr">
            <div class="filter-name">Фильтр параметров</div>
        <form  action="{{Route('filter')}}" method="get">
            <fieldset>
                <legend>Направление от Минска</legend>
                <div class="radio">
                    <input type="radio" id="south" name="direction" value="s">
                    <label for="south">Юг</label>
                </div>
                <div class="radio">
                    <input type="radio" id="north" name="direction" value="n">
                    <label for="north">Север</label>
                </div>
                <div class="radio">
                    <input type="radio" id="west" name="direction" value="w">
                    <label for="west">Запад</label>
                </div>
                <div class="radio">
                    <input type="radio" id="east" name="direction" value="e">
                    <label for="east">Восток</label>
                </div>
                <div class="radio">
                    <input type="radio" id="no-matter" name="direction" value="n">
                    <label for="no-matter">Не важно</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Зона засветки</legend>
                <div class="radio">
                    <input type="radio" id="gray" name="lp" value="gray">
                    <label for="gray">Серая</label>
                </div>
                <div class="radio">
                    <input type="radio" id="blue" name="lp" value="blue">
                    <label for="blue">Синяя</label>
                </div>
                <div class="radio">
                    <input type="radio" id="lightblue" name="lp" value="lightblue">
                    <label for="lightblue">Голубая</label>
                </div>
                <div class="radio">
                    <input type="radio" id="green" name="lp" value="green">
                    <label for="green">Зеленая</label>
                </div>
                <div class="radio">
                    <input type="radio" id="no-matter" name="lp" value="n">
                    <label for="no-matter">Не важно</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Чистый горизонт</legend>
                <div class="radio">
                    <input type="radio" id="to-south" name="horizon" value="s">
                    <label for="to-south"> На юге</label>
                </div>
                <div class="radio">
                    <input type="radio" id="to-north" name="horizon" value="n">
                    <label for="to-north">На севере</label>
                </div>
                <div class="radio">
                    <input type="radio" id="to-west" name="horizon" value="w">
                    <label for="to-west">На западе</label>
                </div>
                <div class="radio">
                    <input type="radio" id="to-east" name="horizon" value="e">
                    <label for="to-east">На востоке</label>
                </div>
                <div class="radio">
                    <input type="radio" id="no-matter" name="horizon" value="n">
                    <label for="no-matter">Не важно</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Холмы</legend>
                <div class="radio">
                    <input type="radio" id="yep" name="hills" value="t">
                    <label for="south">Да</label>
                </div>
                <div class="radio">
                    <input type="radio" id="nope" name="hills" value="f">
                    <label for="nope">Нет</label>
                </div>
                <div class="radio">
                    <input type="radio" id="no-matter" name="hills" value="n">
                    <label for="no-matter">Не важно</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Доступна для транспорта</legend>
                <div class="radio">
                    <input type="radio" id="auto" name="transp" value="auto">
                    <label for="auto">Автомобиль</label>
                </div>
                <div class="radio">
                    <input type="radio" id="train" name="transp" value="train">
                    <label for="train">Поезд</label>
                </div>
                <div class="radio">
                    <input type="radio" id="bus" name="transp" value="bus">
                    <label for="bus">Автобус</label>
                </div>
                <div class="radio">
                    <input type="radio" id="no-matter" name="transp" value="no-matter">
                    <label for="no-matter">Не важно</label>
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