<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perpustakaan - Dashboard</title>
    {{-- style --}}
    @include('backend.includes.style')
</head>

<body>
    <div id="wrapper">

        {{-- sidebar --}}
        @include('backend.includes.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                {{-- navbar --}}
                @include('backend.includes.navbar')
                {{-- content --}}
                @yield('content')
            </div>
        </div>
    </div>

    {{-- script --}}
    @include('backend.includes.script')
</body>

</html>
