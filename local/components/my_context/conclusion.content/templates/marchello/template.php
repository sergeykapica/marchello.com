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

<?elseif($arParams['IBLOCK_CODE'] === 'skills'):?>
    
    <?if(isset($arResult['IBLOCK_DESCRIPTION'])):?>
         <div class="content-skills-description"><?=$arResult['IBLOCK_DESCRIPTION'][0];?></div>   
    <?endif;?>
            
    <?if(isset($arResult['INFORMATION_DATA'])):?>
        <div class="content-skills-indicators">
            <?foreach($arResult['INFORMATION_DATA'] as $skillKey => $skillValue):?>
                <div class="indicator-wrapper <?=( ( ( $skillKey + 1 ) % 4 ) !== 0 ? 'indicator-indentation' : '' );?>">
                    <div class="skills-indicator-name"><?=$skillValue['NAME'];?></div>
                    <div class="skills-indicator-wrapper" style="color: <?=$skillValue['PROPERTY_SKILLS_COLOR_VALUE'];?>;">
                        <div class="indicator-circle-layer"></div>
                        <div class="indicator-circle left" style="border-color: <?=( $skillValue['CIRCLE_LEFT'] <= 0 ? '#545251; z-index: 20;' : $skillValue['PROPERTY_SKILLS_COLOR_VALUE'] );?>; transform: rotate(<?=$skillValue['CIRCLE_LEFT'];?>deg); -webkit-transform: rotate(<?=$skillValue['CIRCLE_LEFT'];?>deg); -o-transform: rotate(<?=$skillValue['CIRCLE_LEFT'];?>deg); -moz-transform: rotate(<?=$skillValue['CIRCLE_LEFT'];?>deg); -ms-transform: rotate(<?=$skillValue['CIRCLE_LEFT'];?>deg);"></div>
                        <div class="indicator-circle right" style="border-color: <?=$skillValue['PROPERTY_SKILLS_COLOR_VALUE'];?>; transform: rotate(<?=$skillValue['CIRCLE_RIGHT'];?>deg); -webkit-transform: rotate(<?=$skillValue['CIRCLE_RIGHT'];?>deg); -o-transform: rotate(<?=$skillValue['CIRCLE_RIGHT'];?>deg); -moz-transform: rotate(<?=$skillValue['CIRCLE_RIGHT'];?>deg); -ms-transform: rotate(<?=$skillValue['CIRCLE_RIGHT'];?>deg);"></div>
                        <span class="indicator-percentage-value"><?=$skillValue['PROPERTY_SKILLS_PERCENT_VALUE'];?>%</span>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    <?endif;?>
        
<?elseif($arParams['IBLOCK_CODE'] === 'education'):?> 
    
    <?if(isset($arResult['INFORMATION_DATA'])):?>
        <div class="content-education-list">
            <div class="content-education-accordion">
                <?foreach($arResult['INFORMATION_DATA'] as $education):?>
                    <div class="education-accordion-header">
                        <span class="accordion-header-text"><?=$education['NAME'];?></span>
                        <div class="accordion-header-icon">+</div>
                    </div>
                    <div class="education-accordion-body"><?=$education['DETAIL_TEXT'];?></div>
                <?endforeach;?>
            </div>

            <script type="text/javascript">
                $(window).ready(function()
                {
                    var educationAccordionHeader = $('.education-accordion-header');
                    var educationAccordionBody = $('.education-accordion-body');

                    educationAccordionHeader.on('click', function(e)
                    {
                        var duration = 1000;
                        var thisAccordionHeader = $(this);
                        var activeClass = 'accordion-header-active';

                        if(thisAccordionHeader.next().css('display') == 'none')
                        {
                            thisAccordionHeader.addClass(activeClass);
                            thisAccordionHeader.find('.accordion-header-icon').html('-');
                        }
                        else
                        {
                            thisAccordionHeader.removeClass(activeClass);
                            thisAccordionHeader.find('.accordion-header-icon').html('+');
                        }

                        educationAccordionBody.not(thisAccordionHeader.next()).slideUp(duration);
                        educationAccordionHeader.not(thisAccordionHeader).removeClass(activeClass);
                        educationAccordionHeader.not(thisAccordionHeader).find('.accordion-header-icon').html('+');
                        thisAccordionHeader.next().slideToggle(duration);
                    });
                });
            </script>
        </div>
    <?endif;?>

<?elseif($arParams['IBLOCK_CODE'] === 'experience'):?> 
    <div class="content-experience-wrapper">
        
        <?if(isset($arResult['INFORMATION_DATA'])):?>
            <div class="content-experience-line"></div>
        
            <?foreach($arResult['INFORMATION_DATA'] as $experience):?>
                <section class="content-experience-section">
                    <div class="experience-section-icon" style="background-color: <?=$experience['PROPERTY_EXPERIENCE_COLOR_VALUE'];?>;"></div>
                    <div class="experience-section-headline">
                        <span class="section-headline-text"><?=$experience['NAME'];?>, </span>
                        <span class="section-headline-date"><?=$experience['PROPERTY_EXPERIENCE_YEARS_VALUE'];?></span>
                    </div>
                    <span><?=$experience['DETAIL_TEXT'];?></span>
                </section>
            <?endforeach;?>
        
        <?endif;?>
        
	</div>
            
<?elseif($arParams['IBLOCK_CODE'] === 'work'):?> 
            
    <?if(isset($arResult['INFORMATION_DATA'])):?>
        <?if(!isset($_GET['AJAX_MODE'])):?>
            <div class="content-work-wrapper">
                <ul class="content-work-list">
                    <?foreach($arResult['INFORMATION_DATA'] as $workKey => $workValue):?>
                        <li class="work-list-item <?=( ( ( $workKey + 1 ) % 2 ) !== 0 ? 'work-item-indentation' : '' );?>" style="background-image: url(<?=$workValue['PROPERTY_SITE_PHOTO_VALUE'];?>);">
                            <div class="work-item-layer">
                                <div class="layer-work-name animated fadeInDown"><?=$workValue['NAME'];?></div>
                                <a href="<?=$workValue['PROPERTY_SITE_URL_VALUE'];?>" target="_blank" class="layer-work-url animated fadeInUp <?=( isset($workValue['VIEW']) ? 'active-view' : '' );?>"><?=GetMessage('WORK_SITE_URL_NAME');?></a>
                                <div class="layer-work-statistic">
                                    <?$APPLICATION->IncludeComponent(
                                        'my_context:content.like-system',
                                        'marchello',
                                        array(
                                            'LIKES_IBLOCK_ID' => 9,
                                            'VIEWS_IBLOCK_ID' => 10,
                                            'IBLOCK_ID' => $workValue['IBLOCK_ID'],
                                            'ELEMENT_IBLOCK_ID' => $workValue['ID']
                                        )
                                    );?>
                                </div>
                            </div>
                        </li>
                    <?endforeach;?>
                </ul>

                <?if(isset($arResult['NAV_PAGE_STRING'])):?>
                    <div class="pagination">
                        <?=$arResult['NAV_PAGE_STRING'];?>
                    </div>
                <?endif;?>

                <script type="text/javascript">
                    $(window).ready(function()
                    {
                        var contentWorkList = $('.content-work-list');
                        var workListItem = $('.work-list-item');
                        var fadeDuration = 500;
                        
                        workListItem.hover(function(e)
                        {
                            $(this).find('.work-item-layer').fadeIn(fadeDuration);
                        },
                        function()
                        {
                            $(this).find('.work-item-layer').fadeOut(fadeDuration);
                        });

                        function setLike(likeIcon, iblockID, elementIblockID, likesIblockID)
                        { 
                            $.ajax({
                                url: '/actions/set-likes.php?IBLOCK_ID=' + iblockID + '&ELEMENT_IBLOCK_ID=' + elementIblockID + '&LIKES_IBLOCK_ID=' + likesIblockID,
                                method: 'GET',
                                success: function(res)
                                {
                                    if(res != false)
                                    {
                                        if(res == 'add')
                                        {
                                            likeIcon.addClass('likes-icon-active');

                                            var likeValue = likeIcon.parent().find('.statistic-likes-value');
                                            likeValue.text(( parseInt(likeValue.text()) + 1 ));
                                        }
                                        else if(res == 'delete')
                                        {
                                            likeIcon.removeClass('likes-icon-active');

                                            var likeValue = likeIcon.parent().find('.statistic-likes-value');
                                            likeValue.text(( parseInt(likeValue.text()) - 1 ));
                                        }
                                    }
                                }
                            });
                        }

                        contentWorkList.on('click', function(e)
                        {
                            var target = $(e.target);

                            if(target.hasClass('statistic-likes-icon'))
                            {
                                var iblockID = target.parent().find('.statistic-iblock-id').val();
                                var elementIblockID = target.parent().find('.statistic-elementiblock-id').val();
                                var likesIblockID = target.parent().find('.statistic-likesiblock-id').val();

                                if(iblockID !== '' &&  elementIblockID !== '' && likesIblockID !== '')
                                {
                                    setLike(target, iblockID, elementIblockID, likesIblockID);
                                }
                            }
                            else if(target.hasClass('layer-work-url'))
                            {
                                if(!target.hasClass('active-view'))
                                {
                                    var viewsValue = target.parent().find('.statistic-views-value');
                                    var iblockID = viewsValue.parent().find('.statistic-iblock-id').val();
                                    var elementIblockID = viewsValue.parent().find('.statistic-elementiblock-id').val();
                                    var viewsIblockID = viewsValue.parent().find('.statistic-viewsiblock-id').val();

                                    target.addClass('active-view');

                                    $.ajax({
                                        url: '/actions/set-views.php?IBLOCK_ID=' + iblockID + '&ELEMENT_IBLOCK_ID=' + elementIblockID + '&VIEWS_IBLOCK_ID=' + viewsIblockID,
                                        method: 'GET',
                                        success: function(res)
                                        {
                                            if(res != false)
                                            {
                                                viewsValue.text(( parseInt(viewsValue.text()) + 1 ));
                                            }
                                        }
                                    });
                                }
                            }
                        });

                        var pagination = $('.pagination');

                        if(pagination[0] !== undefined)
                        {
                            pagination.on('click', function(e)
                            {
                                var thisPaginationContainer = $(this);
                                var target = $(e.target);

                                if(target[0].nodeName == 'A')
                                {
                                    $.ajax({
                                        url: '/ajax/work.php' + target.attr('href') + '&AJAX_MODE=1',
                                        method: 'GET',
                                        dataType: 'json',
                                        success: function(res)
                                        {
                                            if(res != false)
                                            {
                                                contentWorkList.html(res.content);
                                                thisPaginationContainer.html(res.pagination);
                                            }
                                        }
                                    });
                                }

                                return false;
                            });
                        }
                    });
                </script>
            </div>
        <?else:?>
            
            <?
            ob_start();
            ?>
            
            <?foreach($arResult['INFORMATION_DATA'] as $workKey => $workValue):?>
                <li class="work-list-item <?=( ( ( $workKey + 1 ) % 2 ) !== 0 ? 'work-item-indentation' : '' );?>" style="background-image: url(<?=$workValue['PROPERTY_SITE_PHOTO_VALUE'];?>);">
                    <div class="work-item-layer">
                        <div class="layer-work-name animated fadeInDown"><?=$workValue['NAME'];?></div>
                        <a href="<?=$workValue['PROPERTY_SITE_URL_VALUE'];?>" target="_blank" class="layer-work-url animated fadeInUp <?=( isset($workValue['VIEW']) ? 'active-view' : '' );?>"><?=GetMessage('WORK_SITE_URL_NAME');?></a>
                        <div class="layer-work-statistic">
                            <?$APPLICATION->IncludeComponent(
                                'my_context:content.like-system',
                                'marchello',
                                array(
                                    'LIKES_IBLOCK_ID' => 9,
                                    'VIEWS_IBLOCK_ID' => 10,
                                    'IBLOCK_ID' => $workValue['IBLOCK_ID'],
                                    'ELEMENT_IBLOCK_ID' => $workValue['ID']
                                )
                            );?>
                        </div>
                    </div>
                </li>
            <?endforeach;?>
            
            <script type="text/javascript">
                $(window).ready(function()
                {
                    var workListItem = $('.work-list-item');
                    var fadeDuration = 500;

                    workListItem.hover(function(e)
                    {
                        $(this).find('.work-item-layer').fadeIn(fadeDuration);
                    },
                    function()
                    {
                        $(this).find('.work-item-layer').fadeOut(fadeDuration);
                    });
                 });
            </script>
            <?
            
            $content = ob_get_clean();
            
            echo json_encode(array(
                'content' => $content,
                'pagination' => $arResult['NAV_PAGE_STRING']
            ));
            ?>
            
        <?endif;?>
    <?endif;?>
    
<?endif;?>
