<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

if(isset($_GET['IBLOCK_ID']) && isset($_GET['ELEMENT_IBLOCK_ID']) && isset($_GET['VIEWS_IBLOCK_ID']))
{
	$iblockID = htmlspecialcharsBX($_GET['IBLOCK_ID']);
	$IblockElementID = htmlspecialcharsBX($_GET['ELEMENT_IBLOCK_ID']);
	$viewsIblockID = htmlspecialcharsBX($_GET['VIEWS_IBLOCK_ID']);
	$currentIP = $_SERVER['REMOTE_ADDR'];
	
	if(CModule::IncludeModule('iblock'))
	{
		class ViewSystem
		{
			public static function setView($currentIP, $viewsIblockID, $iblockID, $IblockElementID)
			{
				// Add or delete entry in DataBase
				
				$arFilter = array(
					array(
						'LOGIC' => 'AND',
						array(
							'IBLOCK_ID' => $viewsIblockID,
							'=PROPERTY_USER_IP' => $currentIP,
							'=PROPERTY_IBLOCK_ID' => $iblockID,
							'=PROPERTY_IBLOCK_ELEMENT_ID' => $IblockElementID
						)
					)
				);
				
				$arSelect = array(
					'ID',
					'IBLOCK_ID'
				);
				
				$result = CIBlockElement::GetList(array('ID' => 'ASC'), $arFilter, false, false, $arSelect);
				
				if($result)
				{
					if($result->SelectedRowsCount() <= 0)
					{
						$viewsSystem = new CIBlockElement;
						
						$properties = array(
							'USER_IP' => $currentIP,
							'IBLOCK_ID' => $iblockID,
							'IBLOCK_ELEMENT_ID' => $IblockElementID
						);
						
						$fields = array(
							'IBLOCK_ID' => $viewsIblockID,
							'NAME' => time(),
							'ACTIVE' => 'Y',
							'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
							'PROPERTY_VALUES' => $properties
						);
						
						if($viewsSystem->Add($fields))
						{
							return true;
						}
					}
				}
				
				return false;
			}
		}
		
		echo ViewSystem::setView($currentIP, $viewsIblockID, $iblockID, $IblockElementID);
	}
}
?>