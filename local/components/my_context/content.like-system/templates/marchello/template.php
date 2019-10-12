<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="work-statistic-views">
    <div class="statistic-views-icon"></div>
    <div class="statistic-views-value"><?=$arResult['VIEW_SYSTEM']['VIEWS'];?></div>
    <input type="hidden" value="<?=$arParams['IBLOCK_ID'];?>" class="statistic-iblock-id"/>
    <input type="hidden" value="<?=$arParams['ELEMENT_IBLOCK_ID'];?>" class="statistic-elementiblock-id"/>
    <input type="hidden" value="<?=$arParams['VIEWS_IBLOCK_ID'];?>" class="statistic-viewsiblock-id"/>
</div>
<div class="work-statistic-likes">
    <?if(isset($arResult['LIKE_SYSTEM']['CURRENT_LIKE'])):?>
        <div class="statistic-likes-icon likes-icon-active"></div>
    <?else:?>
        <div class="statistic-likes-icon"></div>
    <?endif;?>
    <div class="statistic-likes-value"><?=$arResult['LIKE_SYSTEM']['LIKES'];?></div>
    <input type="hidden" value="<?=$arParams['IBLOCK_ID'];?>" class="statistic-iblock-id"/>
    <input type="hidden" value="<?=$arParams['ELEMENT_IBLOCK_ID'];?>" class="statistic-elementiblock-id"/>
    <input type="hidden" value="<?=$arParams['LIKES_IBLOCK_ID'];?>" class="statistic-likesiblock-id"/>
</div>