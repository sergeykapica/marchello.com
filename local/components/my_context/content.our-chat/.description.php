<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("OUR_CHAT_NAME"),
	"DESCRIPTION" => GetMessage("OUR_CHAT_NAME"),
	"CACHE_PATH" => "Y",
	"SORT" => 71,
	"PATH" => array(
		"ID" => "utilities",
		"CHILD" => array(
			"ID" => "content.our-chat",
			"NAME" => GetMessage("OUR_CHAT_NAME"),
			"SORT" => 31
		)
	)
);

?>