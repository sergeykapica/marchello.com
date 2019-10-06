<section class="main-content-section main-content-contacts">
	<div class="content-headline">
		<div class="content-headline-h1">Связь со мной</div>
		<div class="content-headline-h2">Контактные данные</div>
	</div>
	<div class="content-contacts-wrapper" id="contacts">
		<div class="content-contacts-left">
			<section class="contacts-left-section">
				<div class="section-icon-wrapper">
					<div class="section-icon section-icon-email"></div>
				</div>
				<div class="left-section-text">kermesovich1@gmail.com</div>
			</section>
			<section class="contacts-left-section">
				<div class="section-icon-wrapper">
					<div class="section-icon section-icon-address"></div>
				</div>
				<div class="left-section-text">г. Львов, ул. Ельцина 91</div>
			</section>
			<section class="contacts-left-section">
				<div class="section-icon-wrapper">
					<div class="section-icon section-icon-phone"></div>
				</div>
				<div class="left-section-text">+380 (050) 967-23-00</div>
			</section>
		</div>
		<div class="content-contacts-right">
			<?$APPLICATION->IncludeComponent(
				"my_context:form.result.new",
				"marchello",
				Array(
					"CACHE_TIME" => "3600",
					"CACHE_TYPE" => "A",
					"CHAIN_ITEM_LINK" => "",
					"CHAIN_ITEM_TEXT" => "",
					"EDIT_URL" => "result_edit.php",
					"IGNORE_CUSTOM_TEMPLATE" => "N",
					"LIST_URL" => "result_list.php",
					"SEF_MODE" => "N",
					"SUCCESS_URL" => "",
					"USE_EXTENDED_ERRORS" => "N",
					"VARIABLE_ALIASES" => Array(
						"RESULT_ID" => "RESULT_ID",
						"WEB_FORM_ID" => "WEB_FORM_ID"
					),
					"WEB_FORM_ID" => 'SEND_MESSAGE_FROM_USER'
				)
			);?>
		</div>
	</div>
</section>