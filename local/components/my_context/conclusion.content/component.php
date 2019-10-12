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
        else if($arParams['IBLOCK_CODE'] === 'skills')
        {
            function convertPercentsToDeg($percent)
            {
                return ( $percent / 100 ) * 360;
            }
            
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'DETAIL_TEXT',
                'PROPERTY_SKILLS_COLOR',
                'PROPERTY_SKILLS_PERCENT'
            );
            
            $skillsSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, false, $arSelect);
            
            if($skillsSelection)
            {
                while($skill = $skillsSelection->GetNext())
                {
                    if($skill['DETAIL_TEXT'] != '')
                    {
                         $arResult['IBLOCK_DESCRIPTION'][] = $skill['DETAIL_TEXT'];
                    }
                    else
                    {      
                        $deg = convertPercentsToDeg($skill['PROPERTY_SKILLS_PERCENT_VALUE']);
                        
                        if($deg >= 180)
                        {  
                            $skill['CIRCLE_LEFT'] = $deg;
                            $skill['CIRCLE_RIGHT'] = 180;
                        }
                        else
                        {
                            $skill['CIRCLE_LEFT'] = 0;
                            $skill['CIRCLE_RIGHT'] = $deg;
                        }
                        
                        $arResult['INFORMATION_DATA'][] = $skill;
                    }
                }
            }
        }
        else if($arParams['IBLOCK_CODE'] === 'education')
        {
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'DETAIL_TEXT'
            );
            
            $educationSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, false, $arSelect);
            
            if($educationSelection)
            {
                while($education = $educationSelection->GetNext())
                {
                    $arResult['INFORMATION_DATA'][] = $education;
                }
            }
        }
        else if($arParams['IBLOCK_CODE'] === 'experience')
        {
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'DETAIL_TEXT',
                'PROPERTY_EXPERIENCE_YEARS',
                'PROPERTY_EXPERIENCE_COLOR'
            );
            
            $experienceSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, false, $arSelect);
            
            if($experienceSelection)
            {
                while($experience = $experienceSelection->GetNext())
                {
                    $arResult['INFORMATION_DATA'][] = $experience;
                }
            }
        }
        else if($arParams['IBLOCK_CODE'] === 'work')
        {
            // Get views items
            
            $currentIP = $_SERVER['REMOTE_ADDR'];
            
            $arFilterViews = array(
                'IBLOCK_ID' => 10
            );
            
            $arSelectViews = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'PROPERTY_USER_IP',
                'PROPERTY_IBLOCK_ID',
                'PROPERTY_IBLOCK_ELEMENT_ID'
            );
            
            $viewsSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilterViews, false, false, $arSelectViews);
            
            if($viewsSelection)
            {
                $viewsList = array();
                
                while($view = $viewsSelection->GetNext())
                {
                    $view['PROPERTY_SITE_PHOTO_VALUE'] = CFile::GetPath($view['PROPERTY_SITE_PHOTO_VALUE']);
                    
                    $viewsList[] = $view;
                }
            }
            
            // Get work items
            
            $arNavParams = array(
                'bShowAll' => false,
                'nPageSize' => 1
            );
            
            $arSelect = array(
                'ID',
                'IBLOCK_ID',
                'DATE_ACTIVE_FROM',
                'NAME',
                'PROPERTY_SITE_URL',
                'PROPERTY_SITE_PHOTO'
            );
            
            $worksSelection = CIBlockElement::GetList(array('DATE_ACTIVE_FROM' => 'ASC'), $arFilter, false, $arNavParams, $arSelect);
            
            if($worksSelection)
            {
                while($work = $worksSelection->GetNext())
                {
                    $work['PROPERTY_SITE_PHOTO_VALUE'] = CFile::GetPath($work['PROPERTY_SITE_PHOTO_VALUE']);
                    
                    if(isset($viewsList))
                    {
                        foreach($viewsList as $viewValue)
                        {
                            if($viewValue['PROPERTY_USER_IP_VALUE'] == $currentIP && $work['ID'] == $viewValue['PROPERTY_IBLOCK_ELEMENT_ID_VALUE'])
                            {
                                $work['VIEW'] = true;
                            }
                        }
                    }
                    
                    $arResult['INFORMATION_DATA'][] = $work;
                }
                
                $arResult['NAV_PAGE_STRING'] = $worksSelection->GetPageNavStringEx($backNavigation = false, 'Works', 'marchello', false, false, $arNavParams);
            }
        }
    }
}

$this->includeComponentTemplate();
?>