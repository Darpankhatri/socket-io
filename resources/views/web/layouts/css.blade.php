
        <!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('chat/img/favicon/favicon.ico') }}" type="image/x-icon">
<link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">

<!-- Font -->
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet">

<!-- Template CSS -->
<link class="css-lt" rel="stylesheet" href="{{ asset('chat/css/template.bundle.css') }}" media="(prefers-color-scheme: light)">
<link class="css-dk" rel="stylesheet" href="{{ asset('chat/css/template.dark.bundle.css') }}" media="(prefers-color-scheme: dark)">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    a.cursor-pointer{
        cursor: pointer;
    }
    span.invalid-feedback strong 
    {
        text-transform:capitalize;
    }
    .hide{
        display: none;
    }
    #qr-code-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

{{-- custom css --}}
<style>
    .text-left {
        text-align: left;
    }
    .left-border-active{
        border-left: 6px solid #00ff00 !important;
        border-radius: 9px !important;
    }
    .left-border{
        border-left: 6px solid #ff000d !important;
        border-radius: 9px !important;
    }
</style>
{{-- custom css --}}

<style>
        /* loader css start */

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100000000;
    }

    .overlay .overlayDoor:before,
    .overlay .overlayDoor:after {
        content: "";
        position: absolute;
        width: 50%;
        height: 100%;
        background: #000;
        transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
        transition-delay: 0.8s;
    }

    .overlay .overlayDoor:before {
        left: 0;
    }

    .overlay .overlayDoor:after {
        right: 0;
    }

    .overlay.loaded .overlayDoor:before {
        left: -50%;
    }

    .overlay.loaded .overlayDoor:after {
        right: -50%;
    }

    .overlay.loaded .overlayContent {
        opacity: 0;
        margin-top: -15px;
    }

    .overlay .overlayContent {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
    }

    .loader {
        width: 128px;
        height: 128px;
        border: 3px solid #fff;
        border-bottom: 3px solid transparent;
        border-radius: 50%;
        position: relative;
        animation: spin 1s linear infinite;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader .inner {
        width: 64px;
        height: 64px;
        border: 3px solid transparent;
        border-top: 3px solid #fff;
        border-radius: 50%;
        animation: spinInner 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes spinInner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-720deg);
        }
    }


</style>

<style>
    /* Center the loading animation */
    .loading-container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 20vh;
    }

    /* Define the loading animation */
    .loading {
      border: 8px solid #f3f3f3; /* Light gray */
      border-top: 8px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 2s linear infinite; /* Rotate animation */
    }

    /* Create the rotate animation */
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>