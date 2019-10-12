<section class="main-content-section main-content-education">
	<div class="content-headline">
		<div class="content-headline-h1"><?=GetMessage('EDUCATION_H1');?></div>
		<div class="content-headline-h2"><?=GetMessage('EDUCATION_H1');?></div>
	</div>
	<?$APPLICATION->IncludeComponent(
		'my_context:conclusion.content',
		'marchello',
		array(
			'IBLOCK_CODE' => 'education'
		)
	);?>
</section>