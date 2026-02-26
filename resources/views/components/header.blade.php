<header class="bg-light">
            <div class="name">DarkSky@Belastro.Net: Наблюдательные площадки любителей астрономии Беларуси</div>
            <div class="name2">DarkSky@Belastro.Net</div>
            <div class="contacts">
                <ul class="contact-panel-list" id="footer-contacts">
                    <li class="contact-panel-item"><a href="https://invite.viber.com/?g=Zc71sUO4cEa6ksCL00GI0X4o7mx9VLxY" target="blank"><img src="{{asset('img/viber.svg')}}" alt="viber" width="40px" height="40px"></a></li>
                    <li class="contact-panel-item"><a href="https://t.me/+QNf1KIUfk1wwZjBi" target="blank"><img src="{{asset('img/telegram.svg')}}" alt="telegram" width="40px" height="40px"></a></li>
                    <li class="contact-panel-item" width="40px" height="40px"><a href="https://forum.belastro.net" target="blank"><img src="{{asset('img/belastro.png')}}" alt="belastro"></a></li>
                </ul>
            </div>
			@auth()
				<div class="admin-btn">
					<ul>
						<li @class(['navlink', 'admin-link', 'navlinkactive'=>request()->routeIs('locations.create')])><a href="{{Route('locations.create')}}" target="blank"><div class="display-block">Добавление площадки</div></a></li>
						<li @class(['navlink', 'admin-link', 'navlinkactive'=>request()->routeIs('oddys.create')])><a href="{{Route('oddys.create')}}" target="blank"><div class="display-block">Добавление одиссеи</div></a></li>
					</ul>
				</div>
			@endauth
			<div class="navbar">
                <ul class="nav">
		    <li @class(['navlink', 'navlinkactive'=>request()->routeIs('index')])><a href="{{Route('index')}}"><div class="display-block">Главная</div></a></li>
                    <li @class(['navlink', 'navlinkactive'=>request()->routeIs('about')])><a href="{{Route('about')}}"><div class="display-block">О проекте</div></a></li>
                    <li class="navlink hided"><a href="https://forum.belastro.net/" target="blank"><div class="display-block">Форум</div></a></li>
                    <li @class(['navlink', 'hided', 'navlinkactive'=>request()->routeIs('locations.index')])><a href="{{Route('locations.index')}}"><div class="display-block">Список площадок</div></a></li>
                    <li @class(['navlink', 'navlinkactive'=>request()->routeIs('oddys.index')])><a href="{{Route('oddys.index')}}"><div class="display-block">Одиссеи</div></a></li>
                    <li class="navlink"><a href="mailto:lupus@belastro.net?сс=avlassergey@list.ru&body=Добрый день. Хотел бы добавить на сайт darksky.belastro.net свою наблюдательную площадку:  Мои контакты для обратной связи: &subject=Добавление наблюдательной площадки на сайт darksky.belastro.net"><div class="display-block">Добавить свою площадку</div></a></li>
                </ul>
            </div>
</header>