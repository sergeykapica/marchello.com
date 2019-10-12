<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

if(isset($_GET['CHAT_MESSAGES_IBLOCK_ID']) && isset($_GET['CURRENT_DATE']))
{
	if(CModule::IncludeModule('iblock'))
	{
		$arResult = array();
		$textHandler = new \TextHandlerContext\TextHandler;
		$chatMessagesIblockID = htmlspecialcharsBX($textHandler->textToSafeState($_GET['CHAT_MESSAGES_IBLOCK_ID']));
		$currentDate = htmlspecialcharsBX($textHandler->textToSafeState($_GET['CURRENT_DATE']));
		
		$arFilter = array(
			'IBLOCK_ID' => $chatMessagesIblockID,
			'>=DATE_ACTIVE_FROM' => $currentDate
		);
		
		$arSelect = array(
			'ID',
			'IBLOCK_ID',
			'NAME',
			'DETAIL_TEXT',
			'DATE_ACTIVE_FROM',
			'PROPERTY_USER_PHOTO_URL'
		);
		
		$messages = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'DESC'), $arFilter, false, false, $arSelect);
		
		if($messages)
		{
			if($messages->SelectedRowsCount() > 0)
			{
				while($message = $messages->GetNext())
				{
					$arResult['MESSAGES_LIST'][] = $message;
				}
				
				$arResult['MESSAGES_LIST'] = array_reverse($arResult['MESSAGES_LIST']);
				
				echo json_encode($arResult);
			}
			else
			{
				echo 'New messages absent';
			}
		}
	}
}
?>