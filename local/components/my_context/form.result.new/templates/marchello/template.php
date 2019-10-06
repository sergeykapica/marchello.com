<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/validatorObject.css');
?>
<?if ($arResult["isFormErrors"] == "Y"):?>
    <?
    $errors = array(
        'error' => true,
        'errorText' => $arResult["FORM_ERRORS_TEXT"]
    );

    echo json_encode($errors);
    ?>
<?endif;?>

<?if(!isset($_GET['AJAX_MODE'])):?>
    <?=$arResult["FORM_NOTE"]?>

    <?if ($arResult["isFormNote"] != "Y")
    {
    ?>

    <?=$arResult["FORM_HEADER"];?>
        <?foreach($arResult['arQuestions'] as $qData):?>
            <section class="contacts-form-section">
                <div class="form-section-question">
                    <?if($qData['REQUIRED'] == 'Y'):?>
                        <span class="required"></span>
                    <?endif;?>
                </div>
                <div class="form-section-answer">
                    <?if($arResult['arAnswers'][$qData['SID']][0]['FIELD_TYPE'] == 'text' || $arResult['arAnswers'][$qData['SID']][0]['FIELD_TYPE'] == 'email'):?>
                        <input type="text" name="<?=$qData['INPUT_NAME'];?>" class="contacts-form-input"/>
                    <?elseif($arResult['arAnswers'][$qData['SID']][0]['FIELD_TYPE'] == 'textarea'):?>
                        <textarea name="<?=$qData['INPUT_NAME'];?>" class="contacts-form-input contacts-form-textarea"></textarea>
                    <?endif;?>
                </div>
            </section>
        <?endforeach;?>

        <?// isUseCaptcha?>
        <?
        if($arResult["isUseCaptcha"] == "Y")
        {
        ?>
            <section class="contacts-form-section">
                <div class="form-section-question">
                    <span class="required"></span>
                </div>
                <div class="form-section-answer">
                    <img src="/local/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>&SET_BORDER_COLOR=255,255,255" class="form-section-captcha"/>
                    <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>"/>
                    <input type="text" name="captcha_word" class="contacts-form-input"/>
                </div>
            </section>
        <?
        }
        ?>
        <section class="contacts-form-section">
            <input type="hidden" name="web_form_apply" value="Y"/>
            <input type="submit" value="<?=$arResult['arForm']['BUTTON'];?>" class="contacts-form-submit animated"/>
        </section>
    <?=$arResult["FORM_FOOTER"];?>

    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/js/input-placeholder.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/js/validatorObject.js"></script>

    <script type="text/javascript">
        $(window).ready(function()
        {
            var placeHolderColor = 'rgba(0, 0, 0, 0.5)';

            <?foreach($arResult['arQuestions'] as $question):?>
                setPlaceholderToInput($('.contacts-form-input[name=<?=$question['INPUT_NAME'];?>]'), '<?=$question['TITLE'];?>', placeHolderColor);
            <?endforeach;?>

            <?if($arResult["isUseCaptcha"] == "Y"):?>
                setPlaceholderToInput($('.contacts-form-input[name=captcha_word]'), '<?=GetMessage('CAPTCHA_INPUT_NAME');?>', placeHolderColor);
            <?endif;?>

            var contactsFormSubmit = $('.contacts-form-submit');

            contactsFormSubmit.hover(function()
            {
                $(this).addClass('heartBeat');
            },
            function()
            {
                $(this).removeClass('heartBeat');
            });

            var validatorParams = {};

            <?foreach($arResult['arQuestions'] as $question):?>

                var contactsFormInputs = $('.contacts-form-input[name=<?=$question['INPUT_NAME'];?>]');

                <?if(preg_match('/NAME/', $question['SID'])):?>

                    validatorParams['<?=$question['INPUT_NAME'];?>'] =
                    {
                        minStr: 3,
                        maxStr: 100,
                        isPlaceHolder: contactsFormInputs.val()
                    };

                <?elseif(preg_match('/EMAIL/', $question['SID'])):?>

                    validatorParams['<?=$question['INPUT_NAME'];?>'] =
                    {
                        minStr: 3,
                        maxStr: 100,
                        isEmail: true,
                        isPlaceHolder: contactsFormInputs.val()
                    };

                <?elseif(preg_match('/CONTENT/', $question['SID'])):?>

                    validatorParams['<?=$question['INPUT_NAME'];?>'] =
                    {
                        minStr: 3,
                        maxStr: 5000,
                        isPlaceHolder: contactsFormInputs.val()
                    };

                <?else:?>

                    validatorParams['<?=$question['INPUT_NAME'];?>'] =
                    {
                        minStr: 3,
                        maxStr: 100,
                        isPlaceHolder: contactsFormInputs.val()
                    };

                <?endif;?>
            <?endforeach;?>

            var validatorObject = new ValidatorObject('.form-section-question', '.required', '.contacts-form-input', validatorParams, 'answer-error');

            var currentForm = $('form[name=<?=$arResult['arForm']['SID'];?>]');

            currentForm.on('submit', function()
            {
                var currentForm = $(this);
                currentForm.find('.answer-error').remove();

                //validatorObject.checkFields();

                if(typeof currentForm.find('.answer-error')[0] !== 'undefined'){
                    return false;
                }

                var contactsFormInputs = currentForm.find('.contacts-form-input');
                var formData = currentForm.serialize();

                $.ajax({
                    url: '/ajax/send-message-to-admin.php?WEB_FORM_ID=<?=$arResult['arForm']['SID'];?>&AJAX_MODE=1',
                    method: currentForm.attr('method'),
                    data: formData,
                    enctype: currentForm.attr('enctype'),
                    dataType: 'json',
                    success: function(res)
                    {
                        if(res.error !== undefined)
                        {
                            var message =
                            `
                            <section class="contacts-form-section result-wrapper animated fadeInRight">
                                <div class="result-message result-error">
                                    <div class="result-message-left result-error-left">
                                        <div class="result-message-icon result-error-icon"></div>
                                    </div>
                                    <div class="result-message-right result-error-right">` + res.errorText + `</div>
                                </div>
                            </section>
                            `;
                            
                            currentForm.append(message);
                        }
                        else
                        {
                            var message =
                            `
                            <section class="contacts-form-section result-wrapper animated fadeInRight">
                                <div class="result-message result-done">
                                    <div class="result-message-left result-done-left">
                                        <div class="result-message-icon result-done-icon"></div>
                                    </div>
                                    <div class="result-message-right result-done-right"><?=GetMessage('RESULT_MESSAGE_SEND');?></div>
                                </div>
                            </section>
                            `;
                            
                            currentForm.append(message);
                        }
                        
                        var resultWrapper = $('.result-wrapper');
                        
                        setTimeout(function()
                        {
                            resultWrapper.removeClass('fadeInRight');
                            resultWrapper.addClass('fadeOutRight');
                            
                            setTimeout(function()
                            {
                                resultWrapper.remove();
                            }, 5000);
                        }, 5000);
                    }
                });

                return false;
            });
        });
    </script>

    <?
    }
    ?>
<?endif;?>