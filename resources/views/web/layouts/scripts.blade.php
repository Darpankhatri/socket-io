<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('chat/js/vendor.js') }}"></script>
<script src="{{ asset('chat/js/template.js') }}"></script>


<!-- Theme mode -->
<script>
    $(document).ready(function() {
        // Will wait for everything on the page to load.
        $(window).bind('load', function() {
            $('.overlay, body').addClass('loaded');
            setTimeout(function() {
                $('.overlay').css({
                    'display': 'none'
                })
            }, 2000)
        });

        // Will remove overlay after 1min for users cannnot load properly.
        setTimeout(function() {
            $('.overlay, body').addClass('loaded');
        }, 60000);
    });
    if (localStorage.getItem('color-scheme')) {
        let scheme = localStorage.getItem('color-scheme');

        const LTCSS = document.querySelectorAll('link[class=css-lt]');
        const DKCSS = document.querySelectorAll('link[class=css-dk]');

        [...LTCSS].forEach((link) => {
            link.media = (scheme === 'light') ? 'all' : 'not all';
        });

        [...DKCSS].forEach((link) => {
            link.media = (scheme === 'dark') ? 'all' : 'not all';
        });
    }
</script>


<script>
    $(document).ready(function() {
        $('#tab-settings').on('click', function() {
			var body = '<div class="loading-container">\
                            <div class="loading"></div>\
						</div>';
			$('.my-session-here').html(body);
			// setTimeout(function() {
			// 	$('.loading').fadeIn();
			// }, 3000);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('get.sessions') }}",
                data: {},
                success: function(data) {
					$('.loading').fadeOut();
					$('.my-session-here').html(data.body);
                }
            });
			
			
        });
    });
</script>
