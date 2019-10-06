<section class="main-content-section main-content-work">
	<div class="content-headline">
		<div class="content-headline-h1">Мои работы</div>
		<div class="content-headline-h2">Последние работы</div>
	</div>
	<div class="content-work-wrapper">
		<ul class="content-work-list">
			<li class="work-list-item work-item-indentation">
				<div class="work-item-layer">
					<a href="#" class="layer-work-name animated fadeInDown">Работа 1</a>
					<div class="layer-work-url animated fadeInUp">Сайт</div>
					<div class="layer-work-statistic">
						<div class="work-statistic-views">
							<div class="statistic-views-icon"></div>
							<div class="statistic-views-value">50</div>
						</div>
						<div class="work-statistic-likes">
							<div class="statistic-likes-icon"></div>
							<div class="statistic-likes-value">20</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		
		<script type="text/javascript">
			$(window).ready(function()
			{
				var workListItem = $('.work-list-item');
				var fadeDuration = 500;
				
				workListItem.hover(function()
				{
					$(this).find('.work-item-layer').fadeIn(fadeDuration);
				},
				function()
				{
					$(this).find('.work-item-layer').fadeOut(fadeDuration);
				});
			});
		</script>
	</div>
	<div class="pagination">
		<div class="pagination-wrapper">
			<a class="pagination-prev"></a>
			<div class="pagination-link-list">
				<a class="pagination-link">1</a>
				<a class="pagination-link">2</a>
				<a class="pagination-link pagination-link-active">3</a>
				<a class="pagination-link pagination-last-link">4</a>
				<div class="pagination-line"></div>
			</div>
			<a class="pagination-next"></a>
		</div>
	</div>
</section>