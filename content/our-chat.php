<section class="main-content-section main-content-chat">
	<div class="content-headline">
		<div class="content-headline-h1"><?=GetMessage('OUR_CHAT_H1');?></div>
		<div class="content-headline-h2"><?=GetMessage('OUR_CHAT_H2');?></div>
	</div>
	<?$APPLICATION->IncludeComponent(
		'my_context:content.our-chat',
		'marchello',
		array(
			'CHAT_MESSAGES_IBLOCK_ID' => 11,
			'CHAT_MESSAGES_COUNT' => 20
		)
	);?>
</section>