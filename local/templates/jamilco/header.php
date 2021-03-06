<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">
    <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico">

    <title><?$APPLICATION->ShowTitle()?></title>

    <!-- Bootstrap core CSS -->
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css'); ?>
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/dialog.css'); ?>
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/dialog-sandra.css'); ?>
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/owl/owl.carousel.css'); ?>
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/owl/animate.css'); ?>
	<? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.css'); ?>
	
	<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/ie-emulation-modes-warning.js'); ?>
	<? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/ie10-viewport-bug-workaround.js'); ?>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<?$APPLICATION->ShowHead();?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	
<!-- Begin page content -->
<div class="header-line">
	<div class="container">
		<div class="shops pull-left">
			<?$APPLICATION->IncludeFile(
				SITE_TEMPLATE_PATH."/include/shops_link.php",
				Array(),
				Array("MODE" => "html")
			);?>
		</div>
		<div class="phone pull-left">
			<?$APPLICATION->IncludeFile(
				SITE_TEMPLATE_PATH."/include/phone.php",
				Array(),
				Array("MODE" => "html")
			);?>
		</div>
		<div class="find pull-right">
			<form action="search.html" method="get" id="search-form">
				<a href="javascript:void(0);"></a>
				<input type="text" placeholder="Найти..." name="q" value=""/>
			</form>
			<div class="clearfix"></div>
		</div>
		<? if (!$USER->IsAuthorized()): ?>
			<div class="auth-link pull-right"><a data-dialog="authorization"  href="javascript:void(0);"></a></div>
		<? endif ?>
		<?$APPLICATION->IncludeFile(
			SITE_TEMPLATE_PATH."/include/top_links.php",
			Array(),
			Array("MODE" => "html")
		);?>
		<div class="clearfix"></div>
	</div>
</div>
	
<div class="logo">
    <div class="container text-center"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" alt=""/></a>
    </div>
</div>

<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
	),
	false
);?>

<? if ($APPLICATION->GetCurPage() == "/"): ?>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_slider", Array(
			"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
			"IBLOCK_ID" => "3",	// Код информационного блока
			"NEWS_COUNT" => "20",	// Количество новостей на странице
			"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
			"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
			"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
			"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
			"FILTER_NAME" => "",	// Фильтр
			"FIELD_CODE" => array(	// Поля
				0 => "",
			),
			"PROPERTY_CODE" => array(	// Свойства
				0 => "TITLE",
				1 => "",
			),
			"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
			"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
			"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
			"SET_TITLE" => "N",	// Устанавливать заголовок страницы
			"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
			"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
			"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
			"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
			"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
			"PARENT_SECTION" => "",	// ID раздела
			"PARENT_SECTION_CODE" => "",	// Код раздела
			"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
			"DISPLAY_DATE" => "N",	// Выводить дату элемента
			"DISPLAY_NAME" => "Y",	// Выводить название элемента
			"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
			"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
			"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
			"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
			"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
			"PAGER_TITLE" => "Новости",	// Название категорий
			"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
			"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
			"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		),
		false
	);?>
<? endif ?>

<div class="content-wrap">
	<? if ($APPLICATION->GetCurPage() == "/"): ?>
		<div class="container">
			<?$APPLICATION->IncludeFile(
				SITE_TEMPLATE_PATH."/include/about_company.php",
				Array(),
				Array("MODE" => "html")
			);?>
		</div>
		<div class="slider-why">
			<div class="container">
				<div class="sl-top clearfix">
					<div class="sw-item">
						<a class="active" data-slw-num="0" href="#">
							<div class="sw-img-wrap">
								<img class="cur" src="<?=SITE_TEMPLATE_PATH?>/img/sw1.png" alt=""/>
								<img class="hover" src="<?=SITE_TEMPLATE_PATH?>/img/swh1.png" alt=""/>
							</div>
							<div class="sw-text">20 лет <br/> опыта</div>
						</a>
					</div>
					<div class="sw-item">
						<a data-slw-num="1" href="#">
							<div class="sw-img-wrap">
								<img class="cur" src="<?=SITE_TEMPLATE_PATH?>/img/sw2.png" alt=""/>
								<img class="hover" src="<?=SITE_TEMPLATE_PATH?>/img/swh2.png" alt=""/>
							</div>
							<div class="sw-text">экслюзивные бренды</div>
						</a>
					</div>
					<div class="sw-item">
						<a data-slw-num="2" href="#">
							<div class="sw-img-wrap">
								<img class="cur" src="<?=SITE_TEMPLATE_PATH?>/img/sw3.png" alt=""/>
								<img class="hover" src="<?=SITE_TEMPLATE_PATH?>/img/swh3.png" alt=""/>
							</div>
							<div class="sw-text">140 магазинов</div>
						</a>
					</div>
					<div class="sw-item">
						<a data-slw-num="3" href="#">
							<div class="sw-img-wrap">
								<img class="cur" src="<?=SITE_TEMPLATE_PATH?>/img/sw4.png" alt=""/>
								<img class="hover" src="<?=SITE_TEMPLATE_PATH?>/img/swh4.png" alt=""/>
							</div>
							<div class="sw-text">награды и премии</div>
						</a>
					</div>
				</div>
				<div class="sl-num"><span id="slw-cur">1</span> / <span class="sl-all">4</span></div>
				<div class="sl-bottom">
					<div class="swb-item">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/why_1.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</div>
					<div class="swb-item">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/why_2.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</div>
					<div class="swb-item">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/why_3.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</div>
					<div class="swb-item">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/why_4.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</div>
				</div>
				<div class="why-more"><a href="/about-company/" title="О компании">Узнать больше о нас</a></div>
			</div>
		</div>
		
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"brands", 
			array(
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "4",
				"NEWS_COUNT" => "12",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"FILTER_NAME" => "",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "LOGO",
					2 => "LOGO_HOVER",
					3 => "LOGO_PICTURE",
					4 => "",
				),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"PAGER_TEMPLATE" => ".default",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"DISPLAY_TITLE" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?>
		
		<div class="career">
			<div class="container">
				<div class="career-inner">
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH."/include/career.php",
						Array(),
						Array("MODE" => "html")
					);?>
				</div>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"news", 
			array(
				"IBLOCK_TYPE" => "news",
				"IBLOCK_ID" => "1",
				"NEWS_COUNT" => "10",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"FILTER_NAME" => "",
				"FIELD_CODE" => array(
					0 => "DETAIL_PICTURE",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"PAGER_TEMPLATE" => ".default",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"DISPLAY_TITLE" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?>
	<? else: ?>
		<div class="container">
			<h1><?$APPLICATION->ShowTitle(false)?></h1>
	<? endif ?>