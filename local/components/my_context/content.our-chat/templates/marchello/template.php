<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH. '/css/validatorObject');
$APPLICATION->SetAdditionalCss('/local/components/my_context/content.our-chat/templates/marchello/css/BBEditor.css');
$APPLICATION->SetAdditionalCss('/local/components/my_context/content.our-chat/templates/marchello/css/BBSmiles.css');
?>

<div class="content-chat-wrapper">
    <div class="content-chat-left">
        <?if(isset($arResult['USERS_ONLINE_LIST']) && !empty($arResult['USERS_ONLINE_LIST'])):?>
            <?foreach($arResult['USERS_ONLINE_LIST'] as $user):?>
                <div class="chat-left-section <?=( isset($arResult['IS_ADMIN']) ? 'chat-admin-functions' : '' );?>">
                    <div class="chat-left-icon" style="background-image: url(<?=$user['USER_PHOTO_URL'];?>);"></div>
                    <div class="chat-left-user"><?=$user['USER_NAME'];?></div>
                    <?if(isset($arResult['IS_ADMIN'])):?>
                        <div data-user-id="<?=$user['USER_ID'];?>" class="admin-functions-wrapper">
                            <div class="<?=( isset($arResult['BAN_LIST'][$user['USER_ID']]) ? 'admin-unban-button' : 'admin-ban-button' );?>"></div>
                        </div>
                    <?endif;?>
                </div>
            <?endforeach;?>
        <?else:?>
            <div class="online-list-empty"><?=GetMessage('ONLINE_LIST_EMPTY_NAME');?></div>
        <?endif;?>
    </div>
    <div class="content-chat-right">
        <div class="chat-right-messages">
            <?if(isset($arResult['OUR_CHAT_MESSAGES']) && !empty($arResult['OUR_CHAT_MESSAGES'])):?>
                <?foreach($arResult['OUR_CHAT_MESSAGES'] as $message):?>
                    <div class="chat-right-section">
                        <div class="chat-right-icon" style="background-image: url(<?=$message['PROPERTY_USER_PHOTO_URL_VALUE'];?>);"></div>
                        <div class="chat-right-text"><?=$message['DETAIL_TEXT'];?></div>
                        <div class="chat-right-footer">
                            <div class="chat-footer-data">
                                <span class="footer-data-inicials"><?=$message['NAME'];?>, </span>
                                <span class="footer-data-date"><?=$message['DATE_ACTIVE_FROM'];?></span>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            <?else:?>
                <div class="messages-list-empty"><?=GetMessage('MESSAGES_LIST_EMPTY_NAME');?></div>
            <?endif;?>
        </div>
        <?if(!isset($arResult['IS_BANNED'])):?>
            <div class="chat-form-wrapper">
                <form action="" method="POST" class="chat-send-form">
                    <div class="chat-form-container">
                        <input type="text" name="USER_NAME" class="chat-form-input chat-input"/>
                    </div>
                    <div class="chat-form-container">
                        <input type="text" name="USER_PHOTO_URL" class="chat-form-input chat-input"/>
                    </div>
                    <div class="chat-form-container">
                        <div class="chat-form-message" contenteditable="true" tabindex="1"></div>
                        <input type="hidden" name="USER_MESSAGE" class="chat-input"/>
                    </div>
                    <div class="chat-form-footer">
                        <div class="cform-footer-left">
                            <div class="cform-icon cform-icon-smiles"></div>
                            <div class="cform-icon cform-icon-images"></div>
                        </div>
                        <div class="cform-footer-right">
                            <input type="submit" value="Отправить" class="cform-submit-button"/>
                        </div>
                        <div class="bbeditor-popups-wrapper">
                            <div class="insert-smiles-popup bbeditor-popup">
                                <a class="smiles smile-amazing"></a>
                                <a class="smiles smile-happy"></a>
                                <a class="smiles smile-full"></a>
                                <a class="smiles smile-blush"></a>
                                <a class="smiles smile-bored"></a>
                                <a class="smiles smile-cool"></a>
                                <a class="smiles smile-crazy"></a>
                                <a class="smiles smile-crying"></a>
                                <a class="smiles smile-muted"></a>
                                <a class="smiles smile-laugh"></a>
                                <a class="smiles smile-cute"></a>
                                <a class="smiles smile-excited"></a>
                                <a class="smiles smile-meh"></a>
                                <a class="smiles smile-pain"></a>
                                <a class="smiles smile-relax"></a>
                                <a class="smiles smile-sad"></a>
                                <a class="smiles smile-sad-1"></a>
                                <a class="smiles smile-sceptic"></a>
                                <a class="smiles smile-shocked"></a>
                                <a class="smiles smile-shocked-1"></a>
                                <a class="smiles smile-smile"></a>
                                <a class="smiles smile-smile-1"></a>
                                <a class="smiles smile-wink"></a>
                                <a class="smiles smile-sleepy"></a>
                                <div class="popup-close-icon"></div>
                            </div>
                            <div class="insert-image-popup bbeditor-popup">
                                <div class="popup-section popup-section-icon">
                                    <b class="popup-section-headline"><?=GetMessage('BB_EDITOR_INSERT_IMAGE');?></b>
                                    <div class="popup-close-icon"></div>
                                </div>
                                <div class="popup-section">
                                    <input type="text" class="popup-section-input" />
                                </div>
                                <div class="popup-section">
                                    <button class="popup-form-submit"><?=GetMessage('BB_EDITOR_INSERT_IMAGE_BUTTON');?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?else:?>
            <div class="banned-notification">
                <div class="banned-notification-left">
                    <div class="banned-notification-icon"></div>
                </div>
                <div class="banned-notification-right"><?=GetMessage('BANNED_NOTIFICATION');?><span><?=$arResult['IS_BANNED']['BANNED_DATE'];?></span></div>
            </div>
        <?endif;?>
    </div>
</div>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/js/input-placeholder.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/js/validatorObject.js"></script>
<script type="text/javascript" src="/local/components/my_context/content.our-chat/templates/marchello/js/BBEditor.js"></script>

<script type="text/javascript">
$(window).ready(function()
{
    function dateElementConverterToNormalView(dateElement)
    {
        return ( dateElement < 10 ? '0' + dateElement : dateElement );
    }
    
    function getCurrentDate(currentDate)
    {
        return dateElementConverterToNormalView(currentDate.getDate()) + '.' + dateElementConverterToNormalView(( currentDate.getMonth() + 1 ))
                            + '.' + currentDate.getFullYear() + ' ' + dateElementConverterToNormalView(currentDate.getHours()) + ':' + dateElementConverterToNormalView(currentDate.getMinutes()) + ':' + dateElementConverterToNormalView(currentDate.getSeconds());
    }
    
    function deleteExtraMessages(chatMessages)
    {
        chatMessages.each(function(i)
        {
            if(i >= parseInt('<?=$arParams['CHAT_MESSAGES_COUNT'];?>'))
            {
                chatMessages.eq(i - parseInt('<?=$arParams['CHAT_MESSAGES_COUNT'];?>')).remove();
            }
        });
    }
    
    function scrollToEnd(container)
    {
        container.scrollTop = container.scrollHeight;
    }
    
    var chatMethods =
    {
        setToOnlineList: function(form, sendData)
        {
            $.ajax({
                url: '/actions/set-to-online-list.php?USER_NAME=' + sendData.userName + '&USER_PHOTO_URL=' + sendData.userPhotoUrl,
                method: 'GET',
                success: function(res)
                {
                    if(res != false)
                    {
                        var userIDInput = document.createElement('input');
                        userIDInput.type = 'hidden';
                        userIDInput.value = res;
                        userIDInput.id = 'user-id';
                        
                        form.append(userIDInput);
                    }
                }
            });
        },
        getOnlineList: function()
        {
            $.ajax({
                url: '/actions/get-online-list.php',
                method: 'GET',
                dataType: 'json',
                success: function(res)
                {
                    if(res != false)
                    {
                        if(res.USERS_ONLINE_LIST !== undefined)
                        {
                            contentChatLeft.html('');
                            
                            // set new users-online list
                            
                            for(var i in res.USERS_ONLINE_LIST)
                            {
                                var onlineUser =
                                `
                                <div class="chat-left-section">
                                    <div class="chat-left-icon" style="background-image: url(` + res.USERS_ONLINE_LIST[i].USER_PHOTO_URL + `);"></div>
                                    <div class="chat-left-user">` + res.USERS_ONLINE_LIST[i].USER_NAME + `</div>
                                </div>
                                `;
                                
                                contentChatLeft.append(onlineUser);
                            }
                        }
                    }
                }
            });
        }
    };

    var chatRightMessages = $('.chat-right-messages');
    var contentChatLeft = $('.content-chat-left');
    var chatSendForm = $('.chat-send-form');
    var userName = chatSendForm.find('input[name=USER_NAME]');
    var userMessage = chatSendForm.find('input[name=USER_MESSAGE]');
    var userPhotoUrl = chatSendForm.find('input[name=USER_PHOTO_URL]');
    var chatFormMessage = $('.chat-form-message');
    var socket = new WebSocket('ws://achex.ca:4010');
    var tempForm;
    var mainUserID;

    if(socket.OPEN !== undefined){

        socket.onopen = function(e)
        {
            socket.send(JSON.stringify({ setID: 'users_chat', passwd: 'users_chat777' }));
            socket.send(JSON.stringify({ to: 'users_chat', message: { newConnected: true } }));
        };

        socket.onmessage = function(e)
        {
            e = JSON.parse(e.data);

            if(e.message !== undefined)
            {
                if(e.message.updateUserOnlineList !== undefined)
                {
                    chatMethods.getOnlineList();
                }
                else if(e.message.userMessage !== undefined)
                {
                    var chatMessage =
                    `
                    <div class="chat-right-section">
                        <div class="chat-right-icon" style="background-image: url(` + e.message.userPhotoUrl + `);"></div>
                        <div class="chat-right-text">` + e.message.userMessage + `</div>
                        <div class="chat-right-footer">
                            <div class="chat-footer-data">
                                <span class="footer-data-inicials">` + e.message.userName + `, </span>
                                <span class="footer-data-date">` + e.message.currentDate + `</span>
                            </div>
                        </div>
                    </div>
                    `;

                    chatRightMessages.append(chatMessage);
                    scrollToEnd(chatRightMessages[0]);
                }
                else if(e.message.closedConnected !== undefined)
                {
                    var chatMessage =
                    `
                    <div class="chat-system-section">
                        <div class="chat-system-text"><?=GetMessage('USER_NAME');?> ` + ( e.message.userName != '' ? e.message.userName : 'неизвестный' ) + ` <?=GetMessage('CONNECTION_CLOSED_FOR_USER');?></div>
                    </div>
                    `;
                    
                    chatRightMessages.append(chatMessage);
                    
                    socket.send(JSON.stringify({ to: 'users_chat', message: { updateUserOnlineList: true } }));
                }
                else if(e.message.userBanned !== undefined)
                {
                    if(e.message.userID == chatSendForm.find('#user-id').val())
                    {
                        mainUserID = chatSendForm.find('#user-id').val();
                        tempForm = chatSendForm.html();

                        var banMessage =
                        `
                        <div class="banned-notification">
                            <div class="banned-notification-left">
                                <div class="banned-notification-icon"></div>
                            </div>
                            <div class="banned-notification-right"><?=GetMessage('BANNED_NOTIFICATION');?><span>` + e.message.bannedDate + `</span></div>
                        </div>
                        `;

                        chatSendForm.html(banMessage);
                    }
                }
                else if(e.message.userUnbanned !== undefined)
                {
                    if(e.message.userID == mainUserID)
                    {
                        if(tempForm != undefined)
                        {
                            chatSendForm.html(tempForm);
                            
                            chatFormMessage = $('.chat-form-message');
                            setFormHandler(chatFormMessage);
                            
                            userName = chatSendForm.find('input[name=USER_NAME]');
                            userMessage = chatSendForm.find('input[name=USER_MESSAGE]');
                            userPhotoUrl = chatSendForm.find('input[name=USER_PHOTO_URL]');
                            
                            setPlaceholderToInput(userName, 'Имя', placeHolderColor);
                            setPlaceholderToInput(chatFormMessage, 'Сообщение', placeHolderColor);
                            setPlaceholderToInput(userMessage, 'Сообщение', placeHolderColor);
                            setPlaceholderToInput(userPhotoUrl, 'Адрес фотографии', placeHolderColor);
                        }
                    }
                }
            }
        };
        
        socket.onclose = function()
        {
            var chatMessage =
            `
            <div class="chat-system-section">
                <div class="chat-system-text"><?=GetMessage('CONNECTION_CLOSED');?></div>
            </div>
            `;

            chatRightMessages.append(chatMessage);
        };
        
        socket.onerror = function()
        {
            var chatMessage =
            `
            <div class="chat-system-section">
                <div class="chat-system-text"><?=GetMessage('CONNECTION_ERROR');?></div>
            </div>
            `;

            chatRightMessages.append(chatMessage);
        };
    }
    else
    {
        var currentDate = getCurrentDate(new Date);
        
        function getNewMessages(date)
        {
            $.ajax({
                url: '/actions/get-new-messages-from-chat.php?CHAT_MESSAGES_IBLOCK_ID=<?=$arParams['CHAT_MESSAGES_IBLOCK_ID'];?>&CURRENT_DATE=' + date,
                method: 'GET',
                dataType: 'json',
                success: function(res)
                {
                    if(res != false)
                    {
                        if(res.MESSAGES_LIST !== undefined)
                        {
                            for(var i in res.MESSAGES_LIST)
                            {
                                var chatMessage =
                                `
                                <div class="chat-right-section">
                                    <div class="chat-right-icon" style="background-image: url(` + res.MESSAGES_LIST[i].PROPERTY_USER_PHOTO_URL_VALUE + `);"></div>
                                    <div class="chat-right-text">` + res.MESSAGES_LIST[i].DETAIL_TEXT + `</div>
                                    <div class="chat-right-footer">
                                        <div class="chat-footer-data">
                                            <span class="footer-data-inicials">` + res.MESSAGES_LIST[i].NAME + `, </span>
                                            <span class="footer-data-date">` + res.MESSAGES_LIST[i].DATE_ACTIVE_FROM + `</span>
                                        </div>
                                    </div>
                                </div>
                                `;

                                chatRightMessages.append(chatMessage);
                            }
                            
                            var chatMessages = $('.chat-right-section');
                            deleteExtraMessages(chatMessages);
                            scrollToEnd(chatRightMessages[0]);
                        }
                    }
                    else
                    {
                        var chatMessage =
                        `
                        <div class="chat-system-section">
                            <div class="chat-system-text"><?=GetMessage('CONNECTION_ERROR');?></div>
                        </div>
                        `;

                        chatRightMessages.append(chatMessage);
                    }
                    
                    currentDate = getCurrentDate(new Date);
                }
            });
        }
        
        var usersOnlineList = [];
        
        function getOnlineList()
        {
            $.ajax({
                url: '/actions/get-online-list.php',
                method: 'GET',
                dataType: 'json',
                success: function(res)
                {
                    if(res != false)
                    {
                        if(res.USERS_ONLINE_LIST !== undefined)
                        {
                            contentChatLeft.html('');
                            
                            // check exit users
                            
                            var newUsersOnlineList = [];
                            
                            for(var i in res.USERS_ONLINE_LIST)
                            {
                                newUsersOnlineList.push(res.USERS_ONLINE_LIST[i].id);
                            }
                            
                            for(var d in usersOnlineList)
                            {
                                if(newUsersOnlineList[usersOnlineList[d].id] === undefined)
                                {
                                    var chatMessage =
                                    `
                                    <div class="chat-system-section">
                                        <div class="chat-system-text"><?=GetMessage('USER_NAME');?> ` + usersOnlineList[d].name + ` <?=GetMessage('CONNECTION_CLOSED_FOR_USER');?></div>
                                    </div>
                                    `;

                                    chatRightMessages.append(chatMessage);
                                }
                            }
                            
                            // set new users-online list
                            
                            for(var i in res.USERS_ONLINE_LIST)
                            {
                                var onlineUser =
                                `
                                <div class="chat-left-section">
                                    <div class="chat-left-icon" style="background-image: url(` + res.USERS_ONLINE_LIST[i].USER_PHOTO_URL + `);"></div>
                                    <div class="chat-left-user">` + res.USERS_ONLINE_LIST[i].USER_NAME + `</div>
                                </div>
                                `;
                                
                                contentChatLeft.append(onlineUser);
                                
                                var userData =
                                {
                                    id: res.USERS_ONLINE_LIST[i].USER_ID,
                                    name: res.USERS_ONLINE_LIST[i].USER_NAME
                                };
                                
                                usersOnlineList.push(userData);
                            }
                        }
                    }
                }
            });
        }
        
        (function()
        {
            var thisFunction = arguments.callee;
            
            setTimeout(function()
            {
                getNewMessages(currentDate);
                getOnlineList();
                thisFunction();
            }, 10000);
        })();    
    }
    
    chatSendForm.on('submit', function()
    {
        var thisForm = $(this);
        var currentDate = getCurrentDate(new Date);

        var sendData = 
        {
            userName: userName.val(),
            userPhotoUrl: ( userPhotoUrl.val() == 'Адрес фотографии' ? '/local/templates/marchello/images/chat/user-photo-default.png' : userPhotoUrl.val() ),
            userMessage: userMessage.val(),
            currentDate: currentDate
        };

        if(typeof socket != "undefined")
        {
            socket.send(JSON.stringify({ to: 'users_chat', message: sendData }));
        }

        var userData = 'USER_NAME=' + sendData.userName + '&USER_PHOTO_URL=' + sendData.userPhotoUrl + '&USER_MESSAGE=' + sendData.userMessage + '&CURRENT_DATE=' + sendData.currentDate;

        $.ajax({
            url: '/actions/add-chat-message-to-db.php',
            method: 'POST',
            data: userData
        });

        var chatMessages = $('.chat-right-section');

        deleteExtraMessages(chatMessages);
        scrollToEnd(chatRightMessages[0]);
        chatFormMessage.html('');
        userMessage.val('');
        
        if(thisForm.find('#user-id')[0] === undefined)
        {
            chatMethods.setToOnlineList(thisForm, sendData);
            socket.send(JSON.stringify({ to: 'users_chat', message: { updateUserOnlineList: true } }));
        }

        return false;
    });
    
    $(window).on('beforeunload', function()
    {
        var userID = chatSendForm.find('#user-id');
        
        if(userID[0] !== undefined)
        {
            $.ajax({
                url: '/actions/unset-to-online-list.php?USER_ID=' + userID.val(),
                method: 'GET',
                success: function()
                {
                    if(socket.OPEN != undefined)
                    {
                        socket.send(JSON.stringify({ to: 'users_chat', message: { closedConnected: true, userName: chatSendForm.find('input[name=USER_NAME]').val() } }));
                    }
                }
            });
        }
    });
    
    var placeHolderColor = 'rgba(0, 0, 0, 0.3)';
    
    setPlaceholderToInput(userName, 'Имя', placeHolderColor);
    setPlaceholderToInput(chatFormMessage, 'Сообщение', placeHolderColor);
    setPlaceholderToInput(userMessage, 'Сообщение', placeHolderColor);
    setPlaceholderToInput(userPhotoUrl, 'Адрес фотографии', placeHolderColor);
    
    // BBEditor
    
    function onChangeValueInField(field)
    {
        userMessage.val(field.html());
    }
    
    var buttons =
    {
        image:
        {
            imageButton: $('.cform-icon-images'),
            imagePopup: $('.insert-image-popup'),
            actionButton: $('.popup-form-submit'),
            urlField: $('.popup-section-input'),
            popupWrapper: $('.bbeditor-popups-wrapper'),
            closePopupButton: $('.popup-close-icon'),
            placeHolder: 'Сообщение'
        },
        
        smiles:
        {
            smilesButton: $('.cform-icon-smiles'),
            smilesPopup: $('.insert-smiles-popup'),
            popupWrapper: $('.bbeditor-popups-wrapper'),
            closePopupButton: $('.popup-close-icon'),
            placeHolder: 'Сообщение'
        }
    };
    
    var bbEditor = new BBEditor(chatFormMessage[0], buttons);
    
    function currentPosition()
    {
        bbEditor.pasteHtmlAtCaret('<span class="current-position"></span>');
        bbEditor.getCurrentPosition($('.current-position')[0]);
    }

    
    function setFormHandler(chatFormMessage)
    {
        chatFormMessage.on('input', function()
        {
            onChangeValueInField($(this));
        });

        chatFormMessage.on('focus', function()
        {
            onChangeValueInField($(this));
        });
    
        chatFormMessage.on('mousedown', currentPosition);
        chatFormMessage.on('input', currentPosition); 
    }
    
    setFormHandler(chatFormMessage);
    
    // admin functions for chat
    
    if($('.admin-functions-wrapper')[0] !== undefined)
    {
        var adminBanButton = $('.admin-ban-button');
        var adminUnbanButton = $('.admin-unban-button');
        
        function adminBanButtonHandler(adminBanButton)
        {
            adminBanButton.on('click', function()
            {
                var banButton = $(this);
                var popupFadeDuration = 1000;
                var userID = $(this).parent().attr('data-user-id');

                var banPopup =
                `
                <div class="ban-button-popup" style="top: ` + ( ( $(this).offset().top - contentChatLeft.offset().top ) + $(this).height() ) + `px; left: ` + ( $(this).offset().left - contentChatLeft.offset().left ) + `px;">
                    <div class="ban-popup-section popup-section-icon">
                        <span class="popup-section-headline"><?=GetMessage('BAN_SYSTEM_MINUTES_COUNT');?></span>
                        <div class="popup-close-icon"></div>
                    </div>
                    <div class="ban-popup-section">
                        <div class="popup-section-question">
                            <span class="required"></span>
                        </div>
                        <div class="popup-section-answer">
                            <input type="text" name="BAN_SYSTEM_MINUTES" class="popup-section-input"/>
                        </div>
                    </div>
                    <div class="ban-popup-section">
                        <input type="submit" value="Забанить" class="popup-section-submit"/>
                    </div>
                </div>
                `;

                contentChatLeft.append(banPopup);

                var banButtonPopup = $('.ban-button-popup');
                banButtonPopup.fadeIn(popupFadeDuration);

                var validatorObject = new ValidatorObject('.popup-section-question', '.required', '.popup-section-input', 
                {
                    'BAN_SYSTEM_MINUTES':
                    {
                        isEmpty: true
                    }
                }, 'answer-error');

                banButtonPopup.on('click', function(e)
                {
                    var thisPopup = $(this);
                    var target = $(e.target);

                    if(target.hasClass('popup-section-submit'))
                    {
                        thisPopup.find('.answer-error').remove();

                        validatorObject.checkFields();

                        if(thisPopup.find('.answer-error')[0] === undefined)
                        {
                            banSystem(banButton, 'BAN', userID, thisPopup.find('input[name=BAN_SYSTEM_MINUTES]').val());

                            thisPopup.fadeOut(popupFadeDuration, function()
                            {
                                thisPopup.remove();
                            });
                        }
                    }
                    else if(target.hasClass('popup-close-icon'))
                    {
                        thisPopup.fadeOut(popupFadeDuration, function()
                        {
                            thisPopup.remove();
                        });
                    }
                });
            });
        }
        
        function adminUnbanButtonHandler(adminUnbanButton)
        {
            adminUnbanButton.on('click', function()
            {
                var unbanButton = $(this);
                var userID = $(this).parent().attr('data-user-id');

                banSystem(unbanButton, 'UNBAN', userID);
            });
        }
        
        function banSystem(button, action, userID, time = false)
        {
            $.ajax({
                url: '/actions/chat-ban-system.php?ACTION=' + action + '&USER_ID=' + userID + ( action == 'BAN' ? '&TIME=' + time : '' ),
                method: 'GET',
                success: function(res)
                {
                    if(res != false)
                    {
                        if(action == 'BAN')
                        {
                            button.off('click');
                            button.removeClass(button[0].className);
                            button.addClass('admin-unban-button');
                            
                            adminUnbanButtonHandler(button);
                            
                            if(typeof socket != 'undefined')
                            {
                                socket.send(JSON.stringify({ to: 'users_chat', message:
                                { 
                                    userBanned: true,
                                    userID: userID,
                                    bannedDate: getCurrentDate(new Date(Date.now() + ( ( time * 1000 ) * 60 )))
                                }}));
                            }
                        }
                        else
                        {
                            button.off('click');
                            button.removeClass(button[0].className);
                            button.addClass('admin-ban-button');
                            
                            adminBanButtonHandler(button);
                            
                            if(typeof socket != 'undefined')
                            {
                                socket.send(JSON.stringify({ to: 'users_chat', message:
                                { 
                                    userUnbanned: true,
                                    userID: userID
                                }}));
                            }
                        }
                    }
                }
            });
        };
        
        if(adminBanButton[0] !== undefined)
        {
            adminBanButtonHandler(adminBanButton);
        }

        if(adminUnbanButton[0] !== undefined)
        {
            adminUnbanButtonHandler(adminUnbanButton);
        }
    }
});
</script>
