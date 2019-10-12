<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"PARAMETERS" => array(
		"CHAT_MESSAGES_IBLOCK_ID" => array(
            "NAME" => GetMessage("CHAT_MESSAGES_IBLOCK_ID"),
            "PARENT" => "BASE",
            "TYPE" => "STRING"
        ),
        "CHAT_MESSAGES_COUNT" => array(
            "NAME" => GetMessage("CHAT_MESSAGES_COUNT"),
            "PARENT" => "BASE",
            "TYPE" => "STRING"
        )
	)
);
?>