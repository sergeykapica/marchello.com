<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

$arResult = array();
$pathToFile = $_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/chat-online-list.txt';
$onlineUsersList = file_get_contents($pathToFile);
$onlineUsersList = explode(';', $onlineUsersList);

foreach($onlineUsersList as $userData)
{
    if($userData != '')
    {
        preg_match('/(\d+)\((.+?)\|(.+)\)/m', $userData, $finds);
        
        if(!empty($finds))
        {
            $user = array(
                'USER_ID' => $finds[1],
                'USER_NAME' => $finds[2],
                'USER_PHOTO_URL' => $finds[3]
            );

            $arResult['USERS_ONLINE_LIST'][] = $user;
        }
    }
}

$fileBanList = $_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/users-ban-list.txt';
$banList = file_get_contents($fileBanList);
$banList = explode(';', $banList);

if($banList == '')
{
    $arResult['BAN_LIST'] = array();
}
else
{
    foreach($banList as $banUser)
    {
        if($banUser !== '')
        {
            preg_match('/(\d+)\((\d+?)\)/m', $banUser, $finds);

            if(!empty($finds))
            {
                $user = array(
                    'BAN_DATE' => $finds[2]
                );

                $arResult['BAN_LIST'][$finds[1]] = $user;
            }
        }
    }
}

if($APPLICATION->get_cookie('CHAT_USER_ID'))
{
    $textHandler = new \TextHandlerContext\TextHandler;
    $userID = htmlspecialcharsBX($textHandler->textToSafeState($APPLICATION->get_cookie('CHAT_USER_ID')));
    
    if(isset($arResult['BAN_LIST'][$userID]))
    {
        if($arResult['BAN_LIST'][$userID]['BAN_DATE'] > time())
        {
            $date = ConvertTimeStamp($arResult['BAN_LIST'][$userID]['BAN_DATE'], 'FULL');
            $date = explode(' ', $date);

            $arResult['IS_BANNED'] = array(
                'BANNED_DATE' => $date[0] . ' в ' . $date[1]
            );
        }
        else
        {
            $banList = file_get_contents($fileBanList);
				
            if($banList != '')
            {
                $content = preg_replace('/' . $userID .'\(\d+?\);/m', '', $banList);

                file_put_contents($fileBanList, $content);
            }
        }
    }
}

if(CModule::IncludeModule('iblock'))
{
    $arFilter = array(
        'IBLOCK_ID' => $arParams['CHAT_MESSAGES_IBLOCK_ID']
    );
    
    $arSelect = array(
        'ID',
        'IBLOCK_ID',
        'NAME',
        'DETAIL_TEXT',
        'DATE_ACTIVE_FROM',
        'PROPERTY_USER_PHOTO_URL'
    );
    
    $ourChatMessages = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'DESC'), $arFilter, false, false, $arSelect);
    
    if($ourChatMessages)
    {
        $countMessages = 0;
        $messagesInChat = $arParams['CHAT_MESSAGES_COUNT'];
        $messagesToDelete = array();
        
        while($message = $ourChatMessages->GetNext())
        {
            if($countMessages < $messagesInChat)
            {
                $arResult['OUR_CHAT_MESSAGES'][] = $message;
            }
            else
            {
                $messagesToDelete[] = $message;
            }
            
            $countMessages++;
        }
        
        if(!empty($messagesToDelete))
        {
            foreach($messagesToDelete as $dMessage)
            {
                CIBlockElement::Delete($dMessage['ID']);
            }
        }
        
        if(isset($arResult['OUR_CHAT_MESSAGES']))
        {
            $arResult['OUR_CHAT_MESSAGES'] = array_reverse($arResult['OUR_CHAT_MESSAGES']);
        }
        
        $CUser = ( isset($CUser) ? $CUser : new CUser );
        
        if($CUser->IsAdmin())
        {
            $arResult['IS_ADMIN'] = true;
        }
    }
}

$this->includeComponentTemplate();
?>