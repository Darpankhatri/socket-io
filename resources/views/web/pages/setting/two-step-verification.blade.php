@extends('web.layouts.master')

@section('content')
    <!-- 2-step -->
    <main class="main is-visible" style="overflow-y: auto; background-color: #1a1d21;">
        <div class="container h-100">

            <div class="d-flex flex-column justify-content-center text-center">
                <!-- 2-step Header -->
                <div class="chat-header border-bottom py-4 py-lg-7">
                    <div class="row align-items-center">

                        <!-- Mobile: close -->
                        <div class="col-2 d-xl-none">
                            <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </a>
                        </div>
                        <!-- Mobile: close -->

                        <!-- Content -->
                        <div class="col-8 col-xl-12">
                            <div class="row align-items-center text-center text-xl-start">
                                <!-- Title -->
                                <div class="col-12 col-xl-6">
                                    <div class="row align-items-center gx-5">

                                        <div class="col overflow-hidden">
                                            <h5 class="text-truncate">2-Step Verification</h5>
                                            <p class="text-truncate">To help keep your account safe.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Title -->

                                <!-- Toolbar -->
                                <div class="col-xl-6 d-none d-xl-block">
                                    <div class="row align-items-center justify-content-end gx-6">
                                        <div class="col-auto">
                                            <a href="#" class="icon icon-lg text-muted" data-offcanvas="info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Toolbar -->
                            </div>
                        </div>
                        <!-- Content -->

                        <!-- Mobile: more -->
                        <div class="col-2 d-xl-none text-end">
                            <a href="#" class="icon icon-lg text-muted" data-offcanvas="info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </a>
                        </div>
                        <!-- Mobile: more -->

                    </div>
                </div>
                <!-- 2-step Header -->


                <div class="mt-6">

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-5">
                                <div class="col">
                                    <h5 style="float: left">2-Step Verification is ON since Jul 6, 2022</h5>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-danger">TURN OFF</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-4 mb-2 px-6">
                        <p class="text-muted me-auto">Available second steps</p>
                    </div>

                    <div class="card border-0">
                        <div class="card-body py-2">
                            <!-- Accordion -->
                            <div class="accordion accordion-flush" id="accordion-profile">
                                <div class="accordion-item left-border{{ Auth::user()->is_two_step ? '-active':'' }}">
                                    <div class="accordion-header px-4" id="accordion-gmail-auth">
                                        <div class="row gx-5">
                                            <div class="text-left">
                                                <h5>Email</h5>
                                                <p>After you enter your password on a device, We will send a 6 Digit code to
                                                    your email. Enter That code to Login.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header left-border{{ Auth::user()->google2fa_secret ? '-active':'' }}" id="accordion-authenticator-1">
                                        <a class="accordion-button px-4 text-reset collapsed cursor-pointer"
                                            data-bs-toggle="collapse" data-bs-target="#accordion-authenticator-body-1"
                                            aria-expanded="false" aria-controls="accordion-authenticator-body-1">
                                            <div>
                                                <h5>Authenticator app</h5>
                                                <p>Use the Authenticator app to get verification codes at no charge, even
                                                    when your phone is offline. Available for Android and iPhone.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div id="accordion-authenticator-body-1" class="accordion-collapse collapse"
                                        aria-labelledby="accordion-authenticator-1" data-parent="#accordion-profile">
                                        <div class="accordion-body">
                                            <div class="row text-left px-8">
                                                <div class="col-7">
                                                    <p>Instead of waiting for text messages, get verification codes
                                                        from an authenticator app. It works even if your phone is offline.
                                                    </p>
                                                    <p>First, download Google Authenticator from the
                                                        <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                                                            target="_blank">Google Play Store</a> or the
                                                        <a href="https://apps.apple.com/us/app/google-authenticator/id388497605"
                                                            target="_blank">iOS App Store</a>.
                                                    </p>
                                                    <button type="button" id="setup-google-auth"
                                                        class="btn btn-outline-info">
                                                        <i class="fas fa-plus fa-lg"></i>
                                                        Set up authenticator
                                                    </button>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset('chat/img/google-auth.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- 2-step -->
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.min.js"></script>
    <script>
        var secret_key = '';
        var is_qr = 0;
        $(document).on('click', '.js-btn-next', function() {
            if($(this).text() == "Next"){
                $('.qr-main-div').find(".row[data-step='1']").hide();
                $('.qr-main-div').find(".row[data-step='2']").show();
                $('.js-btn-back').show();
                $(this).text("Verify");
            }
            else{
                console.log("check");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('google.auth.verify') }}",
                    data: {
                        'authCode' : $("#auth_code").val(),
                        'secret_key': secret_key
                    },
                    success: function(data) {
                        if(data.success){
                            toastr.success(data.message);
                        }else{
                            toastr.error(data.message);
                        }
                    }
                });
            }

        });
        $(document).on('click', '.js-btn-back', function() {
            $('.qr-main-div').find(".row[data-step='1']").show();
            $('.qr-main-div').find(".row[data-step='2']").hide();

            $('#auth_code').val('');
            $('.js-btn-back').hide();
            $('.js-btn-next').show();
            $('.js-btn-next').text("Next");

        });
        $(document).on('click', '#setup-google-auth', function() {

            $('.qr-main-div').find(".row[data-step='1']").show();
            $('.qr-main-div').find(".row[data-step='2']").hide();
            $('.js-btn-back').hide();
            $('.js-btn-next').show();
            $('.js-btn-next').text("Next");
            if(is_qr)
            {
                $('#modal-google-authenticator').modal("show");
            }
            else
            {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('google.generate.qr') }}",
                    data: {},
                    success: function(data) {
                        var qrCodeUrl = data.qrCode;
    
                        // Generate the QR code
                        var qr = qrcode(0, 'L');
                        qr.addData(qrCodeUrl);
                        qr.make();
    
                        // Get the QR code image as a data URL
                        var qrCodeImage = qr.createDataURL();
                        var imgElement = document.getElementById('qr-authenticator');
                        imgElement.src = qrCodeImage;
    
                        secret_key = data.secretKey;
                        is_qr = 1;
                        $('#secret-key').text(data.secretKey);
                        $('#modal-google-authenticator').modal("show");
                    }
                });
            }
        })
    </script>
@endsection
