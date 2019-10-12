<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
?>

<?$APPLICATION->IncludeComponent(
	'my_context:conclusion.content',
	'marchello',
	array(
		'IBLOCK_CODE' => 'work'
	)
);?>