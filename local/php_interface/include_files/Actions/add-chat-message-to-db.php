<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(CModule::IncludeModule('iblock'))
	{
		$textHandler = new \TextHandlerContext\TextHandler;
		$userName = htmlspecialcharsBX($textHandler->textToSafeState($_POST['USER_NAME']));
		$userPhotoUrl = htmlspecialcharsBX($textHandler->textToSafeState($_POST['USER_PHOTO_URL']));
		$userMessage = $textHandler->textToSafeState($_POST['USER_MESSAGE']);
		$currentDate = $textHandler->textToSafeState($_POST['CURRENT_DATE']);
	
		$oOurChatMessages = new CIBlockElement;
		
		$properties = array(
			'USER_PHOTO_URL' => $userPhotoUrl
		);
		
		$fields = array(
			'IBLOCK_ID' => 11,
			'NAME' => $userName,
			'CODE' => CUtil::translit($userName, 'ru'),
			'DETAIL_TEXT' => $userMessage,
			'ACTIVE' => 'Y',
			'DATE_ACTIVE_FROM' => $currentDate,
			'PROPERTY_VALUES' => $properties
		);
		
		echo $oOurChatMessages->Add($fields);
	}
}
?>