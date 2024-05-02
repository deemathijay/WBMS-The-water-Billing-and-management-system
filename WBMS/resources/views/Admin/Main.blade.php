<!-- main.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Main Page</title>
</head>
<body>
    <div class="main" style="display: flex">
        <div style="width: 170px; height: 99.5vh;">
            @include('Admin.nav_bar')
        </div>
        {{-- <div style="width: calc(100%-170px); height: 99.5vh;">
            @yield('content')
        </div>         --}}
        
    {{-- <iframe src="{{view('Admin.nav_bar')}}" style="width:170px; height:99.5vh;" frameborder="1"></iframe> --}}
    <iframe id="content_frame" name="content_frame" style="width:calc(100% - 170px);height:99.5vh;" frameborder="0"></iframe>
</div>
</body>
</html>
