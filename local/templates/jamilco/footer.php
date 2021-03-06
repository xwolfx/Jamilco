<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<? if ($APPLICATION->GetCurPage() == "/"): ?>
		</div> <!-- end .container -->
	<? endif ?>
</div> <!-- end .content-wrap -->

<div class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="clearfix">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
						"ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
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
               
                <div class="f-phone pull-right">
                    <div class="phone">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/phone.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</div>
                    <div class="submit">
                        <a data-dialog="feedback" href="javascript:void(0);">Обратная связь</a>
                    </div>
                </div>
            </div>
            <div class="logo text-center"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer.png" alt=""/></a></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="fb-l pull-left">
                <div>
                    <span class="copyright">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/copyright.php",
							Array(),
							Array("MODE" => "html")
						);?>
					</span>
                </div>
            </div>
            <div class="fb-c pull-left">
                <a class="fb" href="#"></a>
                <a class="ins" href="#"></a>
                <a class="tw" href="#"></a>
            </div>
            <div class="fb-r text-right pull-right">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH."/include/dev.php",
					Array(),
					Array("MODE" => "html")
				);?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<? if (!$USER->IsAuthorized()): ?>
	<div id="authorization" class="dialog">
		<div class="dialog__overlay"></div>
		<div class="dialog__content">
			<div><button class="action" data-dialog-close></button></div>
			<div class="auth-form-wrap">
				<div class="title">личный кабинет</div>
				<div class="auth-form-wrap__container">
					<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", ".default", Array(
							"REGISTER_URL" => "",	// Страница регистрации
							"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
							"PROFILE_URL" => "",	// Страница профиля
							"SHOW_ERRORS" => "Y",	// Показывать ошибки
						),
						false
					);?>
				</div>
			</div>
		</div>
	</div>
<? endif ?>
<div id="feedback" class="dialog">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
        <div><button class="action" data-dialog-close></button></div>
        <div class="auth-form-wrap">
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback", Array(
					"WEB_FORM_ID" => "1",	// ID веб-формы
					"IGNORE_CUSTOM_TEMPLATE" => "Y",	// Игнорировать свой шаблон
					"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"LIST_URL" => "",	// Страница со списком результатов
					"EDIT_URL" => "",	// Страница редактирования результата
					"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
					"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
					"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
					"SEF_FOLDER" => "/about-company/",	// Каталог ЧПУ (относительно корня сайта)
					"VARIABLE_ALIASES" => array(
						"WEB_FORM_ID" => "WEB_FORM_ID",
						"RESULT_ID" => "RESULT_ID",
					)
				),
				false
			);?>
        </div>
    </div>
</div>
<!-- JavaScript
================================================== -->
<!--<script src="./js/jquery-1.8.3.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/classie.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/modernizr.custom.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/dialogFx.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/owl/owl.carousel.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/textarea/autoresize.jquery.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/textarea/jquery.mousewheel.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/textarea/jquery-ui.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/textarea/cutext.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>