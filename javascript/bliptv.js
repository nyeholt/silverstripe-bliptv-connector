;(function ($) {
	$().ready(function () {
		if($("base") && ($("a.blip480").length || $('a.blip600').length)) {	
			var baseurl = $("base").attr("href");
			
			$('a.blip480, a.blip600').each (function () {
				var link = $(this);
				var href = baseurl + $(this).attr('href');
				
				href = href.replace(/extcon\/view/, 'bliptv/embedUrl');
				
				$.get(href, {}, function (data) {
					if (data) {
						link.click(function (e) { e.preventDefault();})
						var width = link.hasClass('blip480') ? 480 : 600;
						var height = width == 480 ? 350 : 400;
						link.html('<embed src="'+data+'" type="application/x-shockwave-flash" width="'+width+'" height="'+height+'" allowscriptaccess="always" allowfullscreen="true"></embed>');
					}
				})
			})
		}
	});
})(jQuery);