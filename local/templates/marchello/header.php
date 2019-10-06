<!DOCTYPE html>
<html>
	<head>
		<title><?$APPLICATION->ShowTitle();?></title>
		<?
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-3.4.1.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/wow.js');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/animate.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
		$APPLICATION->ShowHead();
		?>
	</head>
	<body>
        <?
			$APPLICATION->ShowPanel();
		?>
		<div id="main-wrapper">
			<div id="main-container">
				<div class="main-left-side">
					<div class="fixed-left-side">
                        <div class="fixed-left-content">
                            <div class="left-content-avatar"></div>
                            <div class="content-personal-data">
                                <div class="personal-data-name">Марсель Фирсов</div>
                                <div class="personal-data-profession">Професиональный <span class="apricot-text">веб-разработчик</span>, <span class="apricot-text">дизайнер</span></div>
                            </div>
                            <div class="content-menu-wrapper">
                                <?$APPLICATION->IncludeComponent(
                                    "my_context:menu", 
                                    "headerLeft", 
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "left",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "N",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "headerLeft",
                                        "USE_EXT" => "N"
                                    ),
                                    false
                                );?>
                            </div>
                            <div class="content-copyright">
                                By Marchello, 2019 &copy; Все права защищены.
                            </div>
                        </div>
                    </div>
				</div>
				<div class="main-right-side">