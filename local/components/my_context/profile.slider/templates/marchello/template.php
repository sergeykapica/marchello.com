<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if(isset($arResult['SLIDE_LIST']) && is_array($arResult['SLIDE_LIST']) && !empty($arResult['SLIDE_LIST'])):?>
    <ul class="profile-slider">
        <?foreach($arResult['SLIDE_LIST'] as $pKey => $pValue):?>
            <li style="background-image: url(<?=$pValue['SLIDE_URL'];?>);" class="profile-slider-item slider-<?=$pKey;?> <?=( $pKey == 0 ? 'active-slider' : '' );?>">
                <div class="item-headline-wrapper">
                    <div class="item-headline"><?=$pValue['SLIDE_DATA']['SLIDE_HEADLINE'];?></div>
                    <div class="item-description"><?=$pValue['SLIDE_DATA']['SLIDE_DESCRIPTION'];?></div>
                </div>
            </li>
        <?endforeach;?>
    </ul>
    <div class="slider-buttons-wrapper">
        <ul class="profile-slider-buttons">
            <?foreach($arResult['SLIDE_LIST'] as $pKey => $pValue):?>
                <li class="profile-slider-button for-slider-<?=$pKey;?> <?=( $pKey == 0 ? 'active-slider-button' : '' );?>"></li>
            <?endforeach;?>
        </ul>
    </div>

    <script type="text/javascript">
        $(window).ready(function()
        {
            var timerOfSlideShow;
            var profileSliderButtons = $('.profile-slider-buttons');
            var profileSlider = $('.profile-slider');
            
            function iterationBySliders(currentSlider, profileSlider, thisButtonsContainer, target)
            {
                currentSlider.fadeIn(1000, function()
                {
                    profileSlider.find('.active-slider').removeClass('active-slider');
                    currentSlider.addClass('active-slider');

                    thisButtonsContainer.find('.active-slider-button').removeClass('active-slider-button');
                    target.addClass('active-slider-button');
                });
            }
            
            profileSliderButtons.on('click', function(e)
            {
                var thisButtonsContainer = $(this);
                var target = $(e.target);
                
                if(target[0].nodeName == 'LI')
                {
                    clearTimeout(timerOfSlideShow);
                    
                    var currentSlider = target[0].classList[1];
                    currentSlider = currentSlider.split(/for-(slider-\d+)/)[1];
                    currentSlider = profileSlider.find('.' + currentSlider);
                    
                    iterationBySliders(currentSlider, profileSlider, thisButtonsContainer, target);
                }
            });
            
            var sliderButtons = profileSliderButtons.children();
            var si = 0;
            
            function slideShow()
            {
                var duration = 7000;
                
                timerOfSlideShow = setTimeout(function()
                {
                    if(si >= sliderButtons.length)
                    {
                       si = 0;
                    }
                    
                    var target = sliderButtons.eq(si);
                    var currentSlider = target[0].classList[1];
                    currentSlider = currentSlider.split(/for-(slider-\d+)/)[1];
                    currentSlider = profileSlider.find('.' + currentSlider);
                    
                    iterationBySliders(currentSlider, profileSlider, profileSliderButtons, target);
                    si++;
                    
                    slideShow();
                }, duration);
            }
            
            slideShow();
        });
    </script>
<?endif;?>
