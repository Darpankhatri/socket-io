<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('chat/js/vendor.js') }}"></script>
<script src="{{ asset('chat/js/template.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
    
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "debug": false,
        "positionClass": "toast-bottom-right",
    }
    @if (Session::has('message'))
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    $(document).ready(function() {
        $('#tab-settings').on('click', function(){
            $('#tab-content-settings').find('.hide-scrollbar').scrollTop(0);
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

        $('.profile-save').on('click', function() {
            var name = $('#profile-name').val();
            var phone = $('#profile-phone').val();
            var bio = $('#profile-bio').val();

            if(bio == "" || name == "" || phone == ""){
                toastr.error("Please fill all the fields");
            }
            else{
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{ route('profile.update') }}",
                    data: {
                        'name': name,
                        'phone': phone,
                        'bio': bio,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        toastr.success("Profile Updated Successfully");
                    }
                });
            }
        });

        $('.update-password').on('click', function() {
            var cur_pass = $('#profile-current-password').val();
            var new_pass = $('#profile-new-password').val();
            var conf_pass = $('#profile-verify-password').val();
            var ele = $(this);
            ele.closest('.change-password-div').find('input.is-invalid').each(function(){
                $(this).removeClass('is-invalid');
            })

            if(cur_pass == "" || new_pass == "" || conf_pass == ""){
                ele.closest('.change-password-div').find('input').each(function(){
                    if($(this).val() == ""){
                        $(this).addClass('is-invalid');
                        var name = $(this).attr('name');
                        name = name.replace("_",' ');
                        $(this).closest('div').find('strong').text("Enter "+name);
                    }
                });
                toastr.error("Please fill all the fields");
            }
            else{
                if(new_pass != conf_pass){
                    ele.closest('.change-password-div').find('input[name="confirm_password"]').addClass('is-invalid');
                    ele.closest('.change-password-div').find('input[name="confirm_password"]').closest('div').find('strong').text("Passwords do not match");
                    toastr.error("Passwords do not match");
                }
                else
                {
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: "{{ route('password.update') }}",
                        data: {
                            'old_pass': cur_pass,
                            'new_pass': new_pass,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if(data.success)
                            {
                                ele.closest('.change-password-div').find('input').each(function(index,exe){
                                    $(exe).val("");
                                });
                                toastr.success("Password Updated Successfully");
                            }
                            else{
                                ele.closest('.change-password-div').find('input[name="current_password"]').addClass('is-invalid');
                                ele.closest('.change-password-div').find('input[name="current_password"]').closest('div').find('strong').text(data.message);
                            }
                        }
                    });
                }
            }
        });
    });
</script>
