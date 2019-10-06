<section class="main-content-section main-content-education">
	<div class="content-headline">
		<div class="content-headline-h1">Образование</div>
		<div class="content-headline-h2">Образование</div>
	</div>
	<div class="content-education-list">
		<div class="content-education-accordion">
			<div class="education-accordion-header">
				<span class="accordion-header-text">Диплом веб-программиста</span>
				<div class="accordion-header-icon">+</div>
			</div>
			<div class="education-accordion-body">
				Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
			</div>
			<div class="education-accordion-header">
				<span class="accordion-header-text">Диплом дизайнера</span>
				<div class="accordion-header-icon">+</div>
			</div>
			<div class="education-accordion-body">
				Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
			</div>
			<div class="education-accordion-header">
				<span class="accordion-header-text">Диплом бакалавра информационных систем</span>
				<div class="accordion-header-icon">+</div>
			</div>
			<div class="education-accordion-body">
				Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
			</div>
			<div class="education-accordion-header">
				<span class="accordion-header-text">Полное среднее образование</span>
				<div class="accordion-header-icon">+</div>
			</div>
			<div class="education-accordion-body">
				Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.
			</div>
		</div>
		
		<script type="text/javascript">
			$(window).ready(function()
			{
				var educationAccordionHeader = $('.education-accordion-header');
				var educationAccordionBody = $('.education-accordion-body');
				
				educationAccordionHeader.on('click', function(e)
				{
					var duration = 1000;
					var thisAccordionHeader = $(this);
					var activeClass = 'accordion-header-active';
					
					if(thisAccordionHeader.next().css('display') == 'none')
					{
						thisAccordionHeader.addClass(activeClass);
						thisAccordionHeader.find('.accordion-header-icon').html('-');
					}
					else
					{
						thisAccordionHeader.removeClass(activeClass);
						thisAccordionHeader.find('.accordion-header-icon').html('+');
					}
					
					educationAccordionBody.not(thisAccordionHeader.next()).slideUp(duration);
					educationAccordionHeader.not(thisAccordionHeader).removeClass(activeClass);
					educationAccordionHeader.not(thisAccordionHeader).find('.accordion-header-icon').html('+');
					thisAccordionHeader.next().slideToggle(duration);
				});
			});
		</script>
	</div>
</section>