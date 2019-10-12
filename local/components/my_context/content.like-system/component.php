<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(CModule::IncludeModule('iblock'))
{
    //Get likes

    $arResult = array();

    $arFilter = array(
        'IBLOCK_ID' => $arParams['LIKES_IBLOCK_ID'],
        '=PROPERTY_IBLOCK_ID' => $arParams['IBLOCK_ID'],
        '=PROPERTY_ELEMENT_IBLOCK_ID' => $arParams['ELEMENT_IBLOCK_ID']
    );

    $arSelect = array(
        'ID',
        'IBLOCK_ID',
        'PROPERTY_USER_LIKE_IP',
        'PROPERTY_IBLOCK_ID',
        'PROPERTY_ELEMENT_IBLOCK_ID'
    );

    $result = CIBlockElement::GetList(array('ID' => 'ASC'), $arFilter, false, false, $arSelect);

    if($result)
    {
        if($result->SelectedRowsCount() > 0)
        {
            $currentIP = $_SERVER['REMOTE_ADDR'];
            $likes = 0;

            while($like = $result->GetNext())
            {
                $likes += 1;
                
                if($currentIP == $like['PROPERTY_USER_LIKE_IP_VALUE'])
                {
                    $arResult['LIKE_SYSTEM']['CURRENT_LIKE'] = true;
                }
            }

            $arResult['LIKE_SYSTEM']['LIKES'] = $likes;
        }
        else
        {
            $arResult['LIKE_SYSTEM']['LIKES'] = 0;
        }
    }
    
    // Get views

    $arFilter = array(
        'IBLOCK_ID' => $arParams['VIEWS_IBLOCK_ID'],
        '=PROPERTY_IBLOCK_ID' => $arParams['IBLOCK_ID'],
        '=PROPERTY_IBLOCK_ELEMENT_ID' => $arParams['ELEMENT_IBLOCK_ID']
    );

    $arSelect = array(
        'ID',
        'IBLOCK_ID',
        'PROPERTY_USER_IP',
        'PROPERTY_IBLOCK_ID',
        'PROPERTY_IBLOCK_ELEMENT_ID'
    );

    $result = CIBlockElement::GetList(array('ID' => 'ASC'), $arFilter, false, false, $arSelect);

    if($result)
    {
        if($result->SelectedRowsCount() > 0)
        {
            $views = 0;

            while($view = $result->GetNext())
            {
                $views += 1;
            }

            $arResult['VIEW_SYSTEM']['VIEWS'] = $views;
        }
        else
        {
            $arResult['VIEW_SYSTEM']['VIEWS'] = 0;
        }
    }
}

$this->includeComponentTemplate();
?>