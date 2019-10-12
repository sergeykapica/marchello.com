<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

if(isset($_GET['USER_NAME']) && isset($_GET['USER_PHOTO_URL']))
{
	$textHandler = new \TextHandlerContext\TextHandler;
	$userName = htmlspecialcharsBX($textHandler->textToSafeState($_GET['USER_NAME']));
	$userPhotoUrl = htmlspecialcharsBX($textHandler->textToSafeState($_GET['USER_PHOTO_URL']));
	
	if(!$APPLICATION->get_cookie('CHAT_USER_ID'))
	{
		$userID = time();
		
		$application = \Bitrix\Main\Application::getInstance();
		$context = $application->getContext();
		$cookie = new \Bitrix\Main\Web\Cookie("CHAT_USER_ID", $userID, time() + ( 3600*24*365*5 ));
		$cookie->setDomain($context->getServer()->getHttpHost());
		$cookie->setHttpOnly(false);
		$context->getResponse()->addCookie($cookie);
		$context->getResponse()->flush("");
	}
	else
	{
		$userID = $APPLICATION->get_cookie('CHAT_USER_ID');
	}
	
	$userData = $userID . '(' . $userName . '|' . $userPhotoUrl . ');';
	
	if(file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/chat-online-list.txt', $userData, FILE_APPEND))
	{
		echo $userID;
	}
	else
	{
		echo false;
	}
}
?>