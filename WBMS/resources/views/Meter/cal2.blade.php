<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .up {
            background-color: #ffffff;
            padding: 20px;
            box-sizing: border-box;
        }

        .meter {
            font-size: 20px;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #004080;
        }

        .read,
        .down {
            margin: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Add horizontal scrolling for small screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        td:first-child {
            font-weight: bold;
        }

        .align {
            margin-bottom: 10px;
        }

        .align p {
            margin: 0;
            margin-right: 5px;
            font-weight: bold;
        }

        .con {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: #fff;
            cursor: pointer;
        }

        .con:hover {
            background-color: #004080;
        }

        /* Media queries for responsiveness */
        @media only screen and (max-width: 600px) {
            .up, .read, .down {
                margin: 10px;
            }

            .meter {
                font-size: 16px;
            }

            input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body><center>
    @if(!isset($CalculatedData))
    <div class="up">
        <form action="{{route('MeterReadingdoCalculations')}}" method="GET">
            @csrf
        <label class="meter">Meter Reading</label>
        <input type="hidden" name="CustomerID" value="{{$customer->id}}">
        <input type="hidden" name="AccountID" value="{{$Acc->id}}">
        <input type="hidden" name="LastReading" value="{{$lastReadingTupple->LastReading}}">
        <input type="text" name="NewReading" placeholder="Enter meter reading" id="newReading">
        <button type="Submit" name="submit">Calculate</button>
        </form>
    </div>
    @endif
    </center>

    @if(!isset($CalculatedData))
    <div class="read">
    <table style="font-weight: 600">
        <tr>
            <td>New reading</td>
            <td id="newReadingValue" style="color: #1a570d"></td>
        </tr>
        <tr>
            <td>Post reading</td>
            <td id="postReadingValue">{{$lastReadingTupple->LastReading}}</td>
        </tr>
        <tr>
            <td>Net Units</td>
            <td class="u" id="netUnits" style="color: #1a570d"></td>
        </tr>
    </table>
    </div>
    @endif
    @if(isset($CalculatedData))
    <div class="read">
        <table>
            <tr>
                <td >New reading</td>
                <td style="color: #1a570d; font-weight: 600">{{$CalculatedData['NewReading']}}</td>
            </tr>
            <tr>
                <td >Post reading</td>
                <td>{{$CalculatedData['LastReading']}}</td>
            </tr>
            <tr>
                <td >Net Units</td>
                <td class="u" id="netUnits" style="color: #1a570d; font-weight: 600">{{$CalculatedData['NetUnits']}}</td>
            </tr>
            <tr>
                <td>Charging for Used Units</td>
                <td class="m">{{$CalculatedData['ChargeForUsedUnits']}}</td>
            </tr>
            <tr>
                <td>Service Charge</td>
                <td class="n">{{$CalculatedData['ServiceCharge']}}</td>
            </tr>
            <tr>
                <td>B/F</td>
                <td class="colo">{{$CalculatedData['B/F']}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td class="o">{{$CalculatedData['Tax']}}</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td class="colo">{{$CalculatedData['Discount']}}</td>
            </tr>
            <tr>
                <td>Installments</td>
                <td class="t">{{$CalculatedData['Installment']}}</td>
            </tr>
            <tr>
                <td>Interest</td>
                <td class="q">{{$CalculatedData['Interest']}}</td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td class="r">{{$CalculatedData['TotalAmount']}}</td>
            </tr>
        </table>
    </div>
    @endif
    <div class="down">
        <table>
            <tr>
                <td>Name</td>
                <td class="a">:</td>
                <td class="name1">{{$customer->Cus_NameInitials}}</td>
            </tr>
            <tr>
                <td>Acc No</td>
                <td class="b">:</td>
                <td class="name2">{{$Acc->CusAcc_No}}</td>
            </tr>
            <tr>
                <td>Customer ID</td>
                <td class="b">:</td>
                <td class="name2">{{$customer->Cus_id}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td class="c">:</td>
                <td class="name3">{{$customer->Cus_Address}}</td>
            </tr>
            <tr>
                <td>Tele</td>
                <td class="d">:</td>
                <td class="name4">{{$customer->Cus_Phone1}}</td>
            </tr>
        </table>
        
    </div>
    @if(isset($CalculatedData))
    <button type="submit" name="confirm" class="con" style="margin: 10px; font-size:18px">Confirm</button>
    @endif
    <script>
        const newReadingInput = document.getElementById('newReading');
        const newReadingValue = document.getElementById('newReadingValue');
        const postReadingValue = document.getElementById('postReadingValue');
        const netUnitsValue = document.getElementById('netUnits');

        newReadingInput.addEventListener('input', function() {
            let newReading = parseFloat(newReadingInput.value);
            let postReading = parseFloat(postReadingValue.textContent);

            
            newReadingValue.textContent = newReading;

            
            let netUnits = (newReading - postReading).toFixed(2);
            if(netUnits>=0){
            netUnitsValue.textContent = netUnits;
            }else{
                netUnitsValue.textContent = "Invalid Input ! Units Cannot Be Null";
            }
        });
    </script>


</body>
</html>
