<section class="main-content-section main-content-experience">
	<div class="content-headline">
		<div class="content-headline-h1"><?=GetMessage('EXPERIENCE_H1');?></div>
		<div class="content-headline-h2"><?=GetMessage('EXPERIENCE_H2');?></div>
	</div>
	<?/*<div class="content-experience-wrapper">
		<div class="content-experience-line"></div>
		<section class="content-experience-section">
			<div class="experience-section-icon section-icon-work1"></div>
			<div class="experience-section-headline">
				<span class="section-headline-text">Веб-разработчик с полной занятостью, </span>
				<span class="section-headline-date">2017-2018</span>
			</div>
			Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
		</section>
		<section class="content-experience-section">
			<div class="experience-section-icon section-icon-work2"></div>
			<div class="experience-section-headline">
				<span class="section-headline-text">Верстальщик, </span>
				<span class="section-headline-date">2016-2017</span>
			</div>
			Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
		</section>
	</div>*/?>
	<?$APPLICATION->IncludeComponent(
		'my_context:conclusion.content',
		'marchello',
		array(
			'IBLOCK_CODE' => 'experience'
		)
	);?>
</section>