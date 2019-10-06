<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if($arParams['IBLOCK_CODE'] === 'main_information'):?>
    <?if(isset($arResult['INFORMATION_DATA'])):?>

        <?$APPLICATION->IncludeComponent(
            'my_context:profile.slider',
            'marchello',
            array(
                'SLIDE_LIST_URL' => $arResult['INFORMATION_DATA']
            )
        );?>

    <?endif;?>
<?elseif($arParams['IBLOCK_CODE'] === 'about_me'):?>

    <?if(isset($arResult['INFORMATION_DATA']) || isset($arResult['IBLOCK_DESCRIPTION'])):?>
        <?if(isset($arResult['IBLOCK_DESCRIPTION'])):?>
            <div class="content-about-content">
                <?=$arResult['IBLOCK_DESCRIPTION'][0];?>
            </div>
        <?endif;?>
        <?if(isset($arResult['INFORMATION_DATA'])):?>
            <div class="content-about-icons">
                <?foreach($arResult['INFORMATION_DATA'] as $informationKey => $informationValue):?>
                    <div class="about-icon-wrapper <?=( ( ( $informationKey + 1 ) % 3 ) !== 0 ? 'about-icon-indentation' : '' )?>" style="border-color: <?=$informationValue['PROPERTY_SERVICE_COLOR_VALUE'];?>;">
                        <div class="about-icon" style="background-image: url(<?=$informationValue['PROPERTY_SERVICE_IMG_FILE_VALUE'];?>)"></div>
                        <div class="about-text"><?=$informationValue['NAME'];?></div>
                    </div>
                <?endforeach;?>
            </div>
        <?endif;?>
        <div class="content-about-created">
            <?if(isset($arResult['IBLOCK_DESCRIPTION'][1])):?>
                <div class="about-created-message"><?=$arResult['IBLOCK_DESCRIPTION'][1];?></div>
            <?endif;?>
            <a href="#contacts" class="about-created-button"><?=GetMessage('ABOUT_ME_COMMUNICATION_NAME');?></a>

            <script>
                $(window).ready(function()
                {
                    var aboutCreatedButton = $('.about-created-button');

                    aboutCreatedButton.on('click', function()
                    {
                        var thisButton = $(this);
                        var targetElement = $(thisButton.attr('href'));

                        $('html, body').animate({
                            scrollTop: targetElement.offset().top
                        }, 1500);

                    });
                });
            </script>
        </div>
    <?endif;?>

<?elseif($arParams['IBLOCK_CODE'] === 'services'):?>
    
    <?if(isset($arResult['INFORMATION_DATA'])):?>
        <div class="content-services-items">
            <?foreach($arResult['INFORMATION_DATA'] as $serviceKey => $serviceValue):?>
                <div class="content-services-item <?=( ( ( $serviceKey + 1 ) % 4 ) !== 0 ? 'services-indentation' : '' )?>" style="border-bottom-color: <?=$serviceValue['PROPERTY_SERVICE_COLOR_VALUE'];?>">
                    <div class="item-icon-wrapper" style="background-color: <?=$serviceValue['PROPERTY_SERVICE_COLOR_VALUE'];?>">
                        <div class="services-item-icon" style="background-image: url(<?=$serviceValue['PROPERTY_SERVICE_IMG_FILE_VALUE'];?>)"></div>
                    </div>
                    <div class="services-item-data">
                        <div class="services-item-headline"><?=$serviceValue['NAME'];?></div>
                        <div class="services-item-description"><?=$serviceValue['DETAIL_TEXT'];?></div>
                    </div>
                </div>
            <?endforeach;?>
        <?if(isset($arResult['STATISTIC_OF_WORK'])):?>
            <div class="content-services-statistic">
                <div class="services-statistic-items">
                    <?foreach($arResult['STATISTIC_OF_WORK'] as $workDataKey => $workDataValue):?>
                        <div class="services-statistic-item statistic-item-coffee <?=( ( ( $workDataKey + 1 ) % 4 ) !== 0 ? 'services-statistic-indentation' : '' )?>">
                            <b class="statistic-item-result"><?=$workDataValue['STATISTIC_NAME'];?></b>
                            <div class="statistic-item-name"><?=$workDataValue['STATISTIC_VALUE'];?></div>
                        </div>
                    <?endforeach;?>
                </div>
                <div class="services-statistic-lining"></div>
            </div>
        <?endif;?>
    <?endif;?>

<?endif;?>
