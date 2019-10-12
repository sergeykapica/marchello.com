<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/local/php_interface/include_files/TextHandler/textHandler.php");

if(isset($_GET['ACTION']) && isset($_GET['USER_ID']))
{
	$CUser = ( isset($CUser) ? $CUser : new CUser );
	
	if($CUser->IsAdmin())
	{
		$textHandler = new \TextHandlerContext\TextHandler;
		$action = htmlspecialcharsBX($textHandler->textToSafeState($_GET['ACTION']));
		$userID = htmlspecialcharsBX($textHandler->textToSafeState($_GET['USER_ID']));
		$fileBanList = $_SERVER['DOCUMENT_ROOT'] . '/local/components/my_context/content.our-chat/counters/users-ban-list.txt';
		
		if($action == 'BAN')
		{
			$time = htmlspecialcharsBX($textHandler->textToSafeState($_GET['TIME']));
			$time = time() + ( $time * 60 );
			
			$userData = $userID . '(' . $time . ');';
			
			if(file_put_contents($fileBanList, $userData, FILE_APPEND))
			{
				echo true;
			}
			else
			{
				echo false;
			}
		}
		else
		{
			try
			{
				$banList = file_get_contents($fileBanList);
				
				if($banList != '')
				{
					$content = preg_replace('/' . $userID .'\(\d+?\);/m', '', $banList);
					
					file_put_contents($fileBanList, $content);
					
					echo true;
				}
			}
			catch(Exception $e)
			{
				print_r($e);
			}
		}
	}
}
?>