<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

 <script>
(function($){
	$.fn.headline_rotate = function(options) {
	
		var _this = this;
		var $this = $(this);
		
		var settings = {
		  'timeout' : 3000
		};
		$.extend( settings, options );

		$(this).children('.headline').css('top',($(this).height()+10));
		$(this).children('.headline').eq(0).css('top','5px').addClass('active');
		
		setInterval(function() {
		
			$active = $this.children(".headline.active");
		
			if ($active.next().length == 0) {$next = $this.children('.headline').eq(0);}
			else {$next = $active.next('.headline');}
			
			$active.animate({top: -($this.height()+10)}, 750, function() {
				$(this).css('top',($this.height()+10)+'px').removeClass('active');
			});
			$next.addClass('active').show().animate({top: 5}, 750, function() {
				$(this).effect("bounce", { times: 2 , distance: 10 }, 300);
			});
		
		},settings.timeout);
		
		return _this;
	};
	
})(jQuery);
 </script>
 
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10674856-51']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>