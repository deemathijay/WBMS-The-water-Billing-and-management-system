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
            background-color: #f5f5f5;
        }

        /* Header Styles */
        .head {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            width: 50vw;
            height: 40vh;
            margin: auto;
            margin-top: 20vh;
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
    </style>
    <title>Search Account</title>
</head>
<body>
    <div class="head">
        <h1>Search Account</h1>
        <form method="post" action="{{route('SearchPay')}}">
            {{ csrf_field() }}
            <input type="text" name="searchInput" placeholder="Enter Account Number or NIC Number" class="input" required>
            <button type="submit" name="search" class="button"><b>Search</b></button>
        </form>
        <div class="details">

            {{-- @if($accounts)
                <tr> --}}
                    {{-- <th>Name</th>
                    <th>Account Number</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                </tr>
            @foreach ($accounts as $account)
                <tr>
                    <td>Imesha Dewmini</td>
                    <td>A 0934824238</td>
                    <td>123456789 V</td>
                    <td>kotadeniya road, meerigama</td>
                </tr>
            @endforeach
            @endif
            @if($customers)
                <tr>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                </tr>
            @foreach ($customers as $customer) --}}
                {{-- @foreach ($customer->accounts as $account)
                    
                @endforeach
                <tr>
                    <td>Imesha Dewmini</td>
                    <td>A 0934824238</td>
                    <td>123456789 V</td>
                    <td>kotadeniya road, meerigama</td>
                </tr>
            @endforeach
            @endif
            <table>
                <tr>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                </tr>
                <tr>
                    <td>Imesha Dewmini</td>
                    <td>A 0934824238</td>
                    <td>123456789 V</td>
                    <td>kotadeniya road, meerigama</td>
                </tr> --}}
                <!-- Additional rows go here -->
            </table>
        </div>
    </div>
</body>
</html>
