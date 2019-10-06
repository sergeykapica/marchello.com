<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

if($fields = CFormResult::GetDataByIDForHTML($RESULT_ID))
{
	if(CModule::IncludeModule('iblock'))
	{	
		$properties = array(
			'USER_EMAIL' => $fields['form_email_2'],
			'MESSAGE_TOPIC' => $fields['form_text_3']
		);
		
		$fields = array(
			'IBLOCK_ID' => 1,
			'NAME' => $fields['form_text_1'],
			'CODE' => CUtil::translit($fields['form_text_1'], 'ru'),
			'DETAIL_TEXT' => $fields['form_textarea_4'],
			'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
			'ACTIVE' => 'Y',
			'PROPERTY_VALUES' => $properties
		);
		
		$messsagesFromUsersIblock = new CIBlockElement;
		
		if($messsagesFromUsersIblock->Add($fields))
		{
			$response = array(
				'done' => true
			);

			echo json_encode($response);
		}
		else
		{
			$response = array(
				'error' => true,
				'errorText' => 'Ошибка отправки сообщения'
			);

			echo json_encode($response);
		}
	}
}
else
{
	$response = array(
		'error' => true,
		'errorText' => 'Ошибка получения данных'
	);

	echo json_encode($response);
}

die();
?>