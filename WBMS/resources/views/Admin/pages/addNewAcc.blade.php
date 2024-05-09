<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e2e2e2;
        }

        /* Header Styles */
        .head {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            width: 50vw;
            height: auto;
            margin: auto;
            margin-top: 20vh;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            width: 60%;
            box-sizing: border-box;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: #fff;
            cursor: pointer;
        }

        .button:hover {
            background-color: #004080;
        }

        /* Table Styles */
        .details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #000000;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
        .error{
            padding: 5px;
            background-color: #fd292971;
            color: red;
            text-align: center;
            margin: 0 auto;

        }
        td a{
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            padding: 5px 10px 5px 10px;
            border-radius: 5px;
            background-color: #0d661c;
            text-align: center
        }
    </style>
    <title>Search Account</title>
</head>
<body>
    <div class="head">
        <h1>Search Account</h1>
        <form method="post" action="{{route('searchForAddAcc')}}">
            {{ csrf_field() }}
            <input type="text" name="searchInput" placeholder="Enter Customer ID or NIC Number" class="input" required>
            <button type="submit" name="search" class="button"><b>Search</b></button>
        </form>
    
    @if(@isset($customers) && count($customers)>0)
        
    
        <div class="details">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Customer ID</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                {{-- <tr>
                    <td>Imesha Dewmini</td>
                    <td>A 0934824238</td>
                    <td>123456789 V</td>
                    <td>kotadeniya road, meerigama</td>
                </tr> --}}
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->Cus_NameInitials}}</td>
                    <td>{{$customer->Cus_id}}</td>
                    <td>{{$customer->Cus_NIC}}</td>
                    <td>{{$customer->Cus_Address}}</td>
                    <td><a href="{{route('AddNewConnection',['customerId' => $customer->id])}}">Add</a></td>
                </tr>
            @endforeach  
            </table>
        </div>
    @endif
    {{-- @if(isset($customers)&& empty($customers))
    <span class="error">Credentials You Entered Does not Match With Any Record</span>
    @endif --}}
    </div>
</body>
</html>
