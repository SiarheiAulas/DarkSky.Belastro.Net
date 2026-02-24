<header class="bg-light">
            <div class="name">DarkSky@Belastro.Net: Наблюдательные площадки любителей астрономии Беларуси</div>
            <div class="name2">DarkSky@Belastro.Net</div>
            <div class="contacts">
                <ul class="contact-panel-list" id="footer-contacts">
                    <li class="contact-panel-item"><a href="https://invite.viber.com/?g=Zc71sUO4cEa6ksCL00GI0X4o7mx9VLxY" target="blank"><img src="{{asset('img/viber.svg')}}" alt="viber"></a></li>
                    <li class="contact-panel-item"><a href="https://t.me/+QNf1KIUfk1wwZjBi" target="blank"><img src="{{asset('img/telegram.svg')}}" alt="telegram"></a></li>
                    <li class="contact-panel-item"><a href="https://forum.belastro.net" target="blank"><img src="{{asset('img/belastro.png')}}" alt="belastro"></a></li>
                </ul>
            </div>
			@auth()
				<div class="admin-btn">
					<a href="{{Route('locations.create')}}" target="blank"><li @class(['navlink', 'admin-link', 'navlinkactive'=>request()->routeIs('locations.create')])>Добавление площадки</li></a>
					<a href="{{Route('oddys.create')}}" target="blank"><li @class(['navlink', 'admin-link', 'navlinkactive'=>request()->routeIs('oddys.create')])>Добавление одиссеи</li></a>
				</div>
			@endauth
			<div class="navbar">
                <ul class="nav">
					<a href="{{Route('index')}}"><li @class(['navlink', 'navlinkactive'=>request()->routeIs('index')])>Главная</li></a>
                    <a href="{{Route('about')}}"><li @class(['navlink', 'navlinkactive'=>request()->routeIs('about')])>О проекте</li></a>
                    <a href="https://forum.belastro.net/" target="blank"><li class="navlink hided">Форум</li></a>
                    <a href="{{Route('locations.index')}}"><li @class(['navlink', 'hided', 'navlinkactive'=>request()->routeIs('locations.index')])>Список площадок</li></a>
                    <a href="{{Route('oddys.index')}}"><li @class(['navlink', 'navlinkactive'=>request()->routeIs('oddys.index')])>Одиссеи</li></a>
                    <a href="mailto:lupus@belastro.net?сс=avlassergey@list.ru&body=Добрый день. Хотел бы добавить на сайт darksky.belastro.net свою наблюдательную площадку:  Мои кнтакты для обратной связи: &subject=Добавление наблюдательной площадки на сайт darksky.belastro.net"><li class="navlink">Добавить свою площадку</li></a>
                </ul>
            </div>
</header>