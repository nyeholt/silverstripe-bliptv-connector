;(function ($) {
	$().ready(function () {
		if($("base") && ($("a.blip480").length || $('a.blip600').length)) {	
			var baseurl = $("base").attr("href");
			
			$("a.blip480, a.blip600").html("");
			$('a.blip480, a.blip600').each (function () {
				var href = baseurl + $(this).attr('href');
				
				href = href.replace(/extcon\/view/, 'bliptv/embedUrl');
				
				$.get(href, {}, function (data) {
					
				})
			})
		}
	});
})(jQuery);