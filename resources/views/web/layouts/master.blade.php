<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    @include('web.layouts.css')
    @yield('css')
</head>

<body>
    <!-- Layout -->
    <div class="layout overflow-hidden">

        @include('web.layouts.navigation')

        @yield('content')

    </div>
    <!-- Layout -->

    @include('web.layouts.modals')

    @include('web.layouts.scripts')
    @yield('script')
</body>

</html>
