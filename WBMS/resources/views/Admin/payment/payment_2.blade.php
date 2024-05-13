<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
            height: auto;
            margin: 10vh auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .head h1 {
            margin: 0;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
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

        /* Form Styles */
        .payment-form {
            text-align: center;
        }

        .input {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 70%; 
            box-sizing: border-box;
        }

        .button {
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: #fff;
            cursor: pointer;
            margin: 10px auto; 
            display: block; 
            width: 10vw;
        }

        .button:hover {
            background-color: #004080;
        }

        
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 80%;
            text-align: left;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .balance{
            color: #2f830f;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1>Payment Details</h1>
        <div class="details">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Customer ID</th>
                    <td>C001</td>
                </tr>
                <tr>
                    <th>NIC Number</th>
                    <td>123456789X</td>
                </tr>
                <tr>
                    <th>Account Number</th>
                    <td>A-12345678</td>
                </tr>
                <tr>
                    <th>Current Balance</th>
                    <td id="TotalAmount">$500.00</td>
                </tr>
            </table>
        </div>
        <div class="payment-form">
            <input type="number" name="paymentAmount" placeholder="Enter Payment Amount" class="input" id="PayAmount" required>
            <br>
            <span class="balance">Balance : <span id="Balance"></span></span>
            <button type="button" class="button" onclick="openPopup()">Pay</button>
        </div>
    </div>

    <div class="popup" id="paymentPopup">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h2>Confirm Payment</h2>
            <p>Please review the details before confirming:</p>
            <table>
                <tr>
                    <th>Customer Name</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Customer ID</th>
                    <td>C001</td>
                </tr>
                <tr>
                    <th>NIC Number</th>
                    <td>123456789X</td>
                </tr>
                <tr>
                    <th>Account Number</th>
                    <td>A-12345678</td>
                </tr>
                <tr>
                    <th>Payment Amount</th>
                    <td id="confirmAmount"></td>
                </tr>
                <tr>
                    <th>C/F Amount </th>
                    <td id="CFBalance"></td>
                </tr>
            </table>
            <button type="button" class="button" onclick="confirmPayment()">Confirm Payment</button>
            <button type="button" class="button" onclick="confirmPayment()">Print Invoice</button>
        </div>
    </div>

    <script>

        document.getElementById('PayAmount').addEventListener('input', CalBalance);
        // document.getElementById('TotalAmount').addEventListener('input', CalBalance);

        function CalBalance() {
            var Total = parseFloat(document.getElementById('TotalAmount').innerText.replace('$', ''));
            var PayAmount = parseFloat(document.getElementById('PayAmount').value);
            var Balance = PayAmount -Total  ;

            document.getElementById('Balance').innerText = Balance.toFixed(2);
        }



        function openPopup() {
            document.getElementById('paymentPopup').style.display = 'flex';
            var amount = document.getElementsByName('paymentAmount')[0].value;
            document.getElementById('confirmAmount').innerText = '$' + amount;
        }

        function closePopup() {
            document.getElementById('paymentPopup').style.display = 'none';
        }

        function confirmPayment() {
            alert('Payment confirmed!');
            closePopup();
        }
    </script>
</body>
</html>
