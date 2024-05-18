<!-- nav_bar.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navigation Bar</title>
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body style="overflow: hidden;">
    <nav class="vertical-nav">
        <ul>
            <li><a href="page1.html" target="content_frame"><i class="material-icons">home</i>Home</a></li>
            <li><a href="#sub-nav4" target="content_frame"><i class="material-icons">groups</i>Customers</a></li>
                <ul class="sub-nav4" id="sub-nav4">
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'cus_reg') }}')">Customer Registration</a></li>
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('customerList') }}')">Customer List</a></li>
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('cusAccList') }}')">Account List</a></li>
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'addNewAcc') }}')">Add New Connection</a></li>
                </ul>
            <li><a href="#sub-nav1" target="content_frame"><i class="material-icons">badge</i>Agent</a></li>
                <ul class="sub-nav1" id="sub-nav1">
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'agt_reg') }}')">Agent Registration</a></li>
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('Agt_list') }}')">Agent List</a></li>
                </ul>

            <li><a href="#sub-nav2" target="content_frame"><i class="material-icons">payments</i>Payments</a></li>
                <ul class="sub-nav2" id="sub-nav2">
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'payment_1') }}')">Make Payment</a></li>
                    <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'pay_list') }}')">Payment List</a></li>
                    <li><a href="http://">Payment Slips</a></li>
                </ul>
            <li><a href="#sub-nav5" target="content_frame">Meter Readers</a></li>
            <ul class="sub-nav5" id="sub-nav5">
                <li><a href="javascript:void(0)" onclick="loadContent('{{ route('page', 'AddMeterReader') }}')">Add Employee</a></li>
                <li><a href="javascript:void(0)" onclick="loadContent('{{ route('MTR_list') }}')"> List</a></li>
                <li><a href="javascript:void(0)" onclick="loadContent('{{ route('MeterAddSearch') }}')"> Lastest Meter Readings</a></li>
                {{-- <li><a href="http://">Payment Slips</a></li> --}}
            </ul>
            <li><a href="#sub-nav3" target="content_frame"><i class="material-icons">currency_exchange</i>Reload</a></li>
                    <ul class="sub-nav3" id="sub-nav3">
                        <li><a href="http://">Make Payment</a></li>
                        <li><a href="http://">Payment List</a></li>
                        <li><a href="http://">Payment Slips</a></li>
                    </ul>
            <li><a href="reload/reload_slip.html" target="content_frame"><i class="material-icons">request_quote</i>Income</a></li>
            <li><a href="javascript:void(0)" onclick="loadContent('{{ route('pricing') }}')">Pricing </a></li>


            
           <li  style="bottom:10px ;position:absolute;width:100%;box-sizing:border-box;right:auto"> <a href="{{ route('Logoutpage') }}" style="padding-left:50px;">Log Out</a></li>
        </ul>

       
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('a[href="#sub-nav1"]').click(function(e) {
                    e.preventDefault(); 
                    $('.sub-nav1').toggle(); 
                });
                $('a[href="#sub-nav2"]').click(function(e) {
                    e.preventDefault(); 
                    $('.sub-nav2').toggle(); 
                });
                $('a[href="#sub-nav3"]').click(function(e) {
                    e.preventDefault(); 
                    $('.sub-nav3').toggle(); 
                });
                $('a[href="#sub-nav4"]').click(function(e) {
                    e.preventDefault(); 
                    $('.sub-nav4').toggle(); 
                });
                $('a[href="#sub-nav5"]').click(function(e) {
                    e.preventDefault(); 
                    $('.sub-nav5').toggle(); 
                });
            });
            function loadContent(url) {
                var iframe = document.getElementById('content_frame');
                iframe.src = url;
            };
        </script>

    </nav>
</body>
</html>
