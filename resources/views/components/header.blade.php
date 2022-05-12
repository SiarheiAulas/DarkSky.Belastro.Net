<header>
            <div class="name">DarkSky@Belastro.Net: Наблюдательные площадки любителей астрономии Беларуси</div>
            <div class="contacts">
                <ul class="contact-panel-list" id="footer-contacts">
                    <li class="contact-panel-item"><a href="https://invite.viber.com/?g=Zc71sUO4cEa6ksCL00GI0X4o7mx9VLxY"><img src="{{asset('img/viber.svg')}}" alt="viber"></a></li>
                    <li class="contact-panel-item"><a href="https://t.me/+QNf1KIUfk1wwZjBi"><img src="{{asset('img/telegram.svg')}}" alt="telegram"></a></li>
                    <li class="contact-panel-item"><a href="https://forum.belastro.net"><img src="{{asset('img/belastro.png')}}" alt="belastro"></a></li>
                </ul>
            </div>
			@auth()
				<div class="admin-btn">
					<a href="{{Route('locations.create')}}"><li class="navlink admin-link">Добавление метки</li></a>
					<a href="{{Route('oddys.create')}}"><li class="navlink admin-link">Добавление одиссеи</li></a>
				</div>
			@endauth
			<div class="navbar">
                <ul class="nav">
                    <a href="{{Route('index')}}"><li class="navlink">Главная</li></a>
                    <a href="{{Route('about')}}"><li class="navlink">О проекте</li></a>
                    <a href="https://forum.belastro.net/"><li class="navlink">Форум</li></a>
                    <a href="{{Route('locations.index')}}"><li class="navlink">Список площадок</li></a>
                    <a href="{{Route('oddys.index')}}"><li class="navlink">Одиссеи</li></a>
                </ul>
            </div>
</header>