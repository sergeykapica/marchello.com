<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(isset($arParams['IBLOCK_CODE']))
{
    if(CModule::IncludeModule('iblock'))
    {
        $arResult = array();
        $arFilter = array(
            'IBLOCK_CODE' => $arParams['IBLOCK_CODE'],
            'ACTIVE' => 'Y'
        );
        
        if($arParams['IBLOCK_CODE'] === 'main_information')
        {
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'DETAIL_TEXT',
                'PROPERTY_PHOTO_FILE'
            );
            
            $mainInformationSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'DESC'), $arFilter, false, false, $arSelect);
            
            if($mainInformationSelection)
            {
                $countSelection = 0;
                $allSelections = $mainInformationSelection->SelectedRowsCount();
                
                while($information = $mainInformationSelection->GetNext())
                {
                    $countSelection++;
                    
                    $information['PROPERTY_PHOTO_FILE_VALUE'] = CFile::GetPath($information['PROPERTY_PHOTO_FILE_VALUE']);
                    $urlList = $information['PROPERTY_PHOTO_FILE_VALUE'] . '(' . $information['NAME'] . '|' . $information['DETAIL_TEXT'] . ')';
                    
                    if($countSelection < $allSelections)
                    {
                        $urlList .= ',';
                    }
                        
                    $arResult['INFORMATION_DATA'] .= $urlList;
                }
            }
        }
        else if($arParams['IBLOCK_CODE'] === 'about_me')
        { 
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'PREVIEW_TEXT',
                'DETAIL_TEXT',
                'PROPERTY_SERVICE_IMG_FILE',
                'PROPERTY_SERVICE_COLOR'
            );
            
            $aboutMeSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, false, $arSelect);
            
            if($aboutMeSelection)
            {
                while($information = $aboutMeSelection->GetNext())
                {
                    if($information['PROPERTY_SERVICE_IMG_FILE_VALUE'] != '') 
                    {
                        $information['PROPERTY_SERVICE_IMG_FILE_VALUE'] = CFile::GetPath($information['PROPERTY_SERVICE_IMG_FILE_VALUE']);
                    }
                    
                    if($information['DETAIL_TEXT'] != '')
                    {
                         $arResult['IBLOCK_DESCRIPTION'][] = $information['DETAIL_TEXT'];
                    }
                    else if($information['PREVIEW_TEXT'] != '')
                    {
                        $arResult['IBLOCK_DESCRIPTION'][] = $information['PREVIEW_TEXT'];
                    }
                    else
                    {
                        $arResult['INFORMATION_DATA'][] = $information;
                    }
                }
            }
        }
        else if($arParams['IBLOCK_CODE'] === 'services')
        {
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'DETAIL_TEXT',
                'PROPERTY_SERVICE_IMG_FILE',
                'PROPERTY_SERVICE_COLOR'
            );
            
            $servicesSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, false, $arSelect);
            
            if($servicesSelection)
            {
                while($service = $servicesSelection->GetNext())
                {
                    if($service['PROPERTY_SERVICE_IMG_FILE_VALUE'] != '') 
                    {
                        $service['PROPERTY_SERVICE_IMG_FILE_VALUE'] = CFile::GetPath($service['PROPERTY_SERVICE_IMG_FILE_VALUE']);
                    }
                    
                    $arResult['INFORMATION_DATA'][] = $service;
                }
            }
            
            $statisticOfWork = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include_files/Counters/statisticOfWork.txt');
            
            if($statisticOfWork)
            {
                $statisticOfWork = explode(';', $statisticOfWork);
                $statisticOfWorkList = array();
                
                foreach($statisticOfWork as $workData)
                {
                    preg_match('/(.+?)\((.+?)\)/', $workData, $finds);
                    
                    if($finds)
                    {
                        $statisticData = explode('|', $finds[2]);
                        
                        $data = array(
                            'STATISTIC_NAME' => $statisticData[0],
                            'STATISTIC_VALUE' => $statisticData[1]
                        );
                        
                        $statisticOfWorkList[] = $data;
                    }
                }
                
                $arResult['STATISTIC_OF_WORK'] = $statisticOfWorkList; 
            }
        }
    }
}

$this->includeComponentTemplate();
?>