<section class="main-content-section main-content-work">
	<div class="content-headline">
		<div class="content-headline-h1"><?=GetMessage('WORK_H1');?></div>
		<div class="content-headline-h2"><?=GetMessage('WORK_H2');?></div>
	</div>
	
	<?$APPLICATION->IncludeComponent(
		'my_context:conclusion.content',
		'marchello',
		array(
			'IBLOCK_CODE' => 'work'
		)
	);?>
</section>