<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");

if(isset($_GET['IBLOCK_ID']) && isset($_GET['ELEMENT_IBLOCK_ID']) && isset($_GET['LIKES_IBLOCK_ID']))
{
	$iblockID = htmlspecialcharsBX($_GET['IBLOCK_ID']);
	$IblockElementID = htmlspecialcharsBX($_GET['ELEMENT_IBLOCK_ID']);
	$likesIblockID = htmlspecialcharsBX($_GET['LIKES_IBLOCK_ID']);
	$currentIP = $_SERVER['REMOTE_ADDR'];
	
	if(CModule::IncludeModule('iblock'))
	{
		class LikeSystem
		{
			public static function setLike($currentIP, $likesIblockID, $iblockID, $IblockElementID)
			{
				// Add or delete entry in DataBase
				
				$arFilter = array(
					array(
						'LOGIC' => 'AND',
						array(
							'IBLOCK_ID' => $likesIblockID,
							'=PROPERTY_USER_LIKE_IP' => $currentIP,
							'=PROPERTY_IBLOCK_ID' => $iblockID,
							'=PROPERTY_ELEMENT_IBLOCK_ID' => $IblockElementID
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
						$likeSystem = new CIBlockElement;
						
						$properties = array(
							'USER_LIKE_IP' => $currentIP,
							'IBLOCK_ID' => $iblockID,
							'ELEMENT_IBLOCK_ID' => $IblockElementID
						);
						
						$fields = array(
							'IBLOCK_ID' => $likesIblockID,
							'NAME' => time(),
							'ACTIVE' => 'Y',
							'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
							'PROPERTY_VALUES' => $properties
						);
						
						if($likeSystem->Add($fields))
						{
							return 'add';
						}
					}
					else
					{
						$entry = $result->Fetch();
						
						CIBlockElement::Delete($entry['ID']);
						
						if(CIBlockElement::Delete($entry['ID']))
						{
							return 'delete';
						}
					}
				}
				
				return false;
			}
		}

		echo LikeSystem::setLike($currentIP, $likesIblockID, $iblockID, $IblockElementID);
	}
}
?>