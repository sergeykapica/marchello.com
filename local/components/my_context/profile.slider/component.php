<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(isset($arParams['SLIDE_LIST_URL']))
{
    $arResult = array();
    
    preg_match_all('/([^,\s].+?)\((.*?)\)/m', $arParams['SLIDE_LIST_URL'], $finds);
    
    if(!empty($finds))
    {
        foreach($finds as $fKey => $fValue)
        {
            if($fKey !== 0)
            {
                if($fKey === 1)
                {
                    foreach($fValue as $url)
                    {
                        $arResult['SLIDE_LIST'][]['SLIDE_URL'] = $url;
                    }
                    
                }
                else
                {
                    foreach($fValue as $dKey => $dValue)
                    {
                        $dValue = explode('|', $dValue);
                        
                        $arResult['SLIDE_LIST'][$dKey]['SLIDE_DATA']['SLIDE_HEADLINE'] = $dValue[0];
                        $arResult['SLIDE_LIST'][$dKey]['SLIDE_DATA']['SLIDE_DESCRIPTION'] = $dValue[1];
                    }
                }
            }
        }
    }
}

$this->includeComponentTemplate();
?>