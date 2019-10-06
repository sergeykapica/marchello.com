<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;

CUtil::InitJSCore();

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>
<?/*<pre>
<?print_r($arResult);?>
</pre>*/?>
<ul class="content-menu">
    <? foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns): ?>
        <li class="content-menu-item">
            <?if($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_MAIN_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-main-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_ABOUT_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-about-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_SERVICES_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-services-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_SKILLS_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-skills-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_EDUCATION_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-education-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_EXPERIENCE_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-experience-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_WORK_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-work-url">
            <?elseif($arResult["ALL_ITEMS"][$itemID]['PARAMS']['ITEM_URL'] == 'ITEM_CONTACTS_URL'):?>
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>" class="item-url item-contacts-url">
            <?endif;?>
                <div class="item-icon"></div>
                <div class="item-text"><?=$arResult["ALL_ITEMS"][$itemID]['TEXT'];?></div>
            </a>
        </li>
    <? endforeach; ?>
</ul>

<?/*
<div class="headertop-menu-wrapper">
    <ul class="headertop-menu">
        <? foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns): ?>
            <li class="headertop-menu-item <?=(is_array($arColumns) && count($arColumns) ? 'has-submenu' : '')?>">
                <a href="<?=$arResult["ALL_ITEMS"][$itemID]['LINK'];?>"><?=$arResult["ALL_ITEMS"][$itemID]['TEXT'];?></a>
                
                <?if (is_array($arColumns) && count($arColumns) > 0):?>
                    <?foreach($arColumns as $key=>$arRow):?>
                        <ul class="headertop-submenu">
                            <?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>
                                <li class="headertop-submenu-item"><a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"];?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"];?></a></li>
                            <?endforeach;?>
                        </ul>
                    <?endforeach;?>
                    <div class="menu-item-arrow"></div>
                <? endif; ?>
            </li>
        <? endforeach; ?>
    </ul>
</div>

<script>
    $(window).ready(function()
    {
        var headertopMenuItem = $('.headertop-menu-item > a');
        var headertopSubmenu = $('.headertop-submenu');
        
        if(headertopSubmenu[0] !== undefined)
        {
            var timeoutMenu;
            var speed = 500;
            var menuItemArrow = $('.menu-item-arrow');

            function arrowRotateDown()
            {
                menuItemArrow.css({
                    '-ms-transform': 'rotate(0deg)',
                    '-webkit-transform': 'rotate(0deg)',
                    '-o-transform': 'rotate(0deg)',
                    '-moz-transform': 'rotate(0deg)'
                });
            }
            
            function arrowRotateUp()
            {
                menuItemArrow.css({
                    '-ms-transform': 'rotate(180deg)',
                    '-webkit-transform': 'rotate(180deg)',
                    '-o-transform': 'rotate(180deg)',
                    '-moz-transform': 'rotate(180deg)'
                });
            }
            
            function setOutMenu(menuElement)
            {
                timeoutMenu = setTimeout(function()
                {
                    menuElement.slideUp(speed, arrowRotateUp);
                    timeoutMenu = undefined;
                }, 1000);
            }

            headertopSubmenu.hover(
                function()
                {
                    var target = $(this);

                    if(timeoutMenu !== undefined)
                    {
                        clearTimeout(timeoutMenu);
                    }
                    else
                    {
                        target.slideDown(speed, arrowRotateDown);
                    }
                },
                function()
                {
                    var target = $(this);

                    setOutMenu(target);
                }
            );

            headertopMenuItem.hover(
                function()
                {
                    var target = $(this);

                    if(target.parent().find('.headertop-submenu')[0] !== undefined)
                    {
                        if(timeoutMenu !== undefined)
                        {
                            clearTimeout(timeoutMenu);
                        }
                        else
                        {
                            headertopSubmenu.slideDown(speed, arrowRotateDown);
                        }
                    }
                },
                function()
                {
                    var target = $(this);

                    if(target.parent().find('.headertop-submenu')[0] !== undefined)
                    {
                        setOutMenu(headertopSubmenu);
                    }
                }
            );
        }
    });
</script>
*/?>