<section class="main-content-section main-content-services">
	<div class="content-headline">
		<div class="content-headline-h1">Услуги</div>
		<div class="content-headline-h2">Чем я занимаюсь?</div>
	</div>
	<?/*<div class="content-services-items">
		<div class="content-services-item services-innovate-ideas services-indentation">
			<div class="item-icon-wrapper icon-wrapper-innovate">
				<div class="services-item-icon icon-innovate-ideas"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Интеграция новых идей</div>
				<div class="services-item-description">Интеграция новых идей в детальной точности. Загрузка новых компонентов.</div>
			</div>
		</div>
		<div class="content-services-item services-server-functionality services-indentation">
			<div class="item-icon-wrapper icon-wrapper-server">
				<div class="services-item-icon icon-server-functionality"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Серверный функционал</div>
				<div class="services-item-description">Программная часть сервера написанная на языке PHP, с использованием фреймворка Bitrix. Подключение нескольких серверов в кластере.</div>
			</div>
		</div>
		<div class="content-services-item services-client-functionality services-indentation">
			<div class="item-icon-wrapper icon-wrapper-client">
				<div class="services-item-icon icon-client-functionality"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Клиентский функционал</div>
				<div class="services-item-description">Программная часть клиентского браузера написанная на языке JavaScript, с использованием фреймворка JQuery. Подключение нескольких серверов в кластере.</div>
			</div>
		</div>
		<div class="content-services-item services-design">
			<div class="item-icon-wrapper icon-wrapper-design">
				<div class="services-item-icon icon-design"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Дизайн</div>
				<div class="services-item-description">Дизайн сайта и его компонентов.</div>
			</div>
		</div>
		<div class="content-services-item services-layout services-indentation">
			<div class="item-icon-wrapper icon-wrapper-layout">
				<div class="services-item-icon icon-layout"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Вёрстка</div>
				<div class="services-item-description">Вёрстка сайта и его компонентов.</div>
			</div>
		</div>
		<div class="content-services-item services-security services-indentation">
			<div class="item-icon-wrapper icon-wrapper-security">
				<div class="services-item-icon icon-security"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Безопасность</div>
				<div class="services-item-description">Безопасность сайта.</div>
			</div>
		</div>
		<div class="content-services-item services-hosting services-indentation">
			<div class="item-icon-wrapper icon-wrapper-hosting">
				<div class="services-item-icon icon-hosting"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Установка на хостинг</div>
				<div class="services-item-description">Установка и настройка сайта на хостинге.</div>
			</div>
		</div>
		<div class="content-services-item services-testing">
			<div class="item-icon-wrapper icon-wrapper-testing">
				<div class="services-item-icon icon-testing"></div>
			</div>
			<div class="services-item-data">
				<div class="services-item-headline">Тестирование</div>
				<div class="services-item-description">Тестирование и исправление ошибок сайта.</div>
			</div>
		</div>
	</div>
	<div class="content-services-statistic">
		<div class="services-statistic-items">
			<div class="services-statistic-item statistic-item-coffee services-statistic-indentation">
				<b class="statistic-item-result">300</b>
				<div class="statistic-item-name">Выпито чашек кофе</div>
			</div>
			<div class="services-statistic-item statistic-item-projects services-statistic-indentation">
				<b class="statistic-item-result">120</b>
				<div class="statistic-item-name">Проектов</div>
			</div>
			<div class="services-statistic-item statistic-item-clients services-statistic-indentation">
				<b class="statistic-item-result">25</b>
				<div class="statistic-item-name">Клиентов</div>
			</div>
			<div class="services-statistic-item statistic-item-parthners">
				<b class="statistic-item-result">5</b>
				<div class="statistic-item-name">Партнёров</div>
			</div>
		</div>
		<div class="services-statistic-lining"></div>
	</div>*/?>
	
	<?$APPLICATION->IncludeComponent(
		'my_context:conclusion.content',
		'marchello',
		array(
			'IBLOCK_CODE' => 'services'
		)
	);?>
</section>