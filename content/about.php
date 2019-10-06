<section class="main-content-section main-content-about">
	<div class="content-headline">
		<div class="content-headline-h1"><?=GetMessage('ABOUT_ME_H1');?></div>
		<div class="content-headline-h2"><?=GetMessage('ABOUT_ME_H2');?></div>
	</div>
	<?$APPLICATION->IncludeComponent(
		'my_context:conclusion.content',
		'marchello',
		array(
			'IBLOCK_CODE' => 'about_me'
		)
	);?>
</section>