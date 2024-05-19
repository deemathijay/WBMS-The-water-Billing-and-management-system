<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .head {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            width: 80%;
            margin: auto;
            margin-top: 10vh; 
            border-radius: 10px;
        }
        
        .head h1 {
            margin: 0;
            font-size: 24px;
        }
        
        .input {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%; 
            box-sizing: border-box;
        }
        
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: #fff;
            cursor: pointer;
            width: 100%; 
            margin-top: 10px;
        }
        
        .button:hover {
            background-color: #004080;
        }
        
        .card {
            background-color: #e6e6e657;
            color: #000000;
            padding: 20px;
            box-sizing: border-box;
            text-align: left;
            width: 100%;
            margin-top: 20px; 
            border-radius: 10px;
        }
        
        .card p {
            margin: 0;
            margin-bottom: 10px; 
            font-size: 16px; 
        }
        a{
            text-decoration: none;
        }
    </style>
    <title>Search Account</title>
</head>
<body>
    <div class="head">
        <h1>Search Account</h1>
        <form method="post" action="{{route('SearchUserForBilling')}}">
            {{ csrf_field() }}
            <input type="text" name="searchInput" placeholder="Enter customer ID or NIC Number" class="input" required>
            <button type="submit"  name="search" class="button"><b>Search</b></button>
        </form>
        <div class="details">
           
                @if(isset($customers) && $customers->isNotEmpty())
            
                @foreach ($customers as $customer)
                 @foreach ($customer->accounts as $account)
                    <a href="{{route('MeterReadingCalculations',['id'=>$account->id])}}">
                    <div class="card">
                        <p style="font-weight:600">{{$customer->Cus_NameInitials}}</p>
                        <p>{{$customer->Cus_NIC}}</p>
                        <p>{{$account->CusAcc_No}}</p>
                        <p>{{$customer->Cus_Address}}</p>
                        <p>Remark : {{$account->CusAcc_Remark}}</p>
                        <p>
                            @if(!empty($account->LastReading))
                            {{($account->LastReading)->LastReading }}</p>
                            @endif
                    </div>
                    </a>
                @endforeach
                @endforeach
                @else
                        <p>No accounts found for the entered NIC or account number.</p>
                @endif
{{-- 
                <div class="card">
                    <p style="font-weight:600">$customer->Cus_NameInitials</p>
                    <p>$customer->Cus_NIC</p>
                    <p>$account->CusAcc_No</p>
                    <p>$customer->Cus_Address</p>
                    <p>Remark : $account->CusAcc_Remark</p>
                    <p>
                        ($account->LastReading)->LastReading </p>
                </div> --}}
            
        </div>
    </div>
</body>
</html>
