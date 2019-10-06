				</div>
			</div>
		</div>
        <div id="follow-page-top">
            <div id="page-icon-wrapper">
                <div id="follow-page-icon"></div>
            </div>
        </div>

        <script type="text/javascript">
            $(window).ready(function()
            {
                var followPageTop = $('#follow-page-top');
                followPageTop.css('top', $(window).height() + 'px');
                
                var followPageTop = $('#follow-page-top');
                
                $(window).on('scroll', function()
                {
                    var pageScrollY = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
                    var fadeDuration = 1000;
                    
                    if(pageScrollY > 0)
                    {
                        followPageTop.fadeIn(fadeDuration);
                    }
                    else
                    {
                        followPageTop.fadeOut(fadeDuration);
                    }
                });
                
                var followPageIcon = $('#follow-page-icon');
                
                followPageIcon.on('click', function()
                {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 1500);
                });
            });
        </script>
	</body>
</html>