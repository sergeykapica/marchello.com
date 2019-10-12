<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

$arResult = array();
$pathToFile = $_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/chat-online-list.txt';
$onlineUsersList = file_get_contents($pathToFile);
$onlineUsersList = explode(';', $onlineUsersList);

foreach($onlineUsersList as $userData)
{
    if($userData != '')
    {
        preg_match('/(\d+)\((.+?)\|(.+)\)/', $userData, $finds);
        
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

if(isset($arResult['USERS_ONLINE_LIST']))
{
	echo json_encode($arResult);
}
?>