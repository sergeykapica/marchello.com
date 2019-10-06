<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("CONCLUSTION_CONTENT_NAME"),
	"DESCRIPTION" => GetMessage("CONCLUSTION_CONTENT_NAME"),
	"CACHE_PATH" => "Y",
	"SORT" => 71,
	"PATH" => array(
		"ID" => "utilities",
		"CHILD" => array(
			"ID" => "conclusion.content",
			"NAME" => GetMessage("SONET_NAME"),
			"SORT" => 31
		)
	)
);

?>