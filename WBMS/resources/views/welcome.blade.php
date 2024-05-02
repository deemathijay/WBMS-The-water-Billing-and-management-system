<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Document</title>
</head>
<body >
    <div class="login-div">
        <div class="login-topic"> <span>Water Billing & Management System</span></div>
        <div class="login-form">
            <img src="{{asset('source/logo.jpg')}}" alt="logo" srcset="">
            <form action="{{route('Validate1')}}" method="post">
                {{ csrf_field() }}
                
                <label for="UserName">User Name </label>
                <input type="text" placeholder="Organization User Name" name="Org_UserName"/><br>     <!--encrption should added -->
                <label for="Password" >Password </label>
                <input type="password" placeholder="Password" name="Org_PWD" /><br>
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <button type="submit">Login</button><br>
                <!-- <a href="http://">Forgot Password ? Contact Us</a> -->
            </form>
            

        </div>
    </div>
    <!-- <footer> <p>&copy 2023 Copyrights Reserved By : Ziggma Technologies (pvt) Ltd .Sri Lanka</p></footer> -->
</body>
</html>