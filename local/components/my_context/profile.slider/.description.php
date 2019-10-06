<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("PROFILE_SLIDER_NAME"),
	"DESCRIPTION" => GetMessage("PROFILE_SLIDER_NAME"),
	"CACHE_PATH" => "Y",
	"SORT" => 71,
	"PATH" => array(
		"ID" => "utilities",
		"CHILD" => array(
			"ID" => "profile.slider",
			"NAME" => GetMessage("PROFILE_SLIDER_NAME"),
			"SORT" => 31
		)
	)
);

?>