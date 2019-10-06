<?
foreach($arResult['QUESTIONS'] as $qKey => $qValue)
{
    preg_match('/name="(.+?)"/', $qValue['HTML_CODE'], $finds);
    
    if(!empty($finds))
    {
        $inputName = $finds[1];
        $arResult['arQuestions'][$qKey]['INPUT_NAME'] = $inputName;
    }
}
?>

<?/*<pre style="float: left;">
    <?print_r($arResult); die();?>
</pre>*/?>