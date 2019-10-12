<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

if(isset($_GET['USER_ID']))
{
	$textHandler = new \TextHandlerContext\TextHandler;
	$userID = htmlspecialcharsBX($textHandler->textToSafeState($_GET['USER_ID']));
	$pathToFile = $_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/chat-online-list.txt';
	
	$content = file_get_contents($pathToFile);
	$condition = '/' . $userID . '\(.+?\);/m';
	$content = preg_replace($condition, '', $content);
	
	file_put_contents($pathToFile, $content);
}
?>