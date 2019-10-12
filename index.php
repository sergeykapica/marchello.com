<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
include_once($_SERVER["DOCUMENT_ROOT"]. '/local/templates/marchello/lang/ru/content.php');

$APPLICATION->ShowTitle();
?>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/index.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/about.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/services.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/skills.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/education.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/experience.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/work.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/our-chat.php');
?>

<div class="main-content-separator"></div>

<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/content/contacts.php');
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>