<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1.css">
</head>
<style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .form-div {
            max-width: 600px;
            margin: 20vh auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .topic {
            display: block;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        span {
            margin-left: 5px;
        }
        #Intallment-form {
            display: none; /* Hide the installment form initially */
        }
        input[type="submit"] {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 15px;
            float: right;
            transition: background-color 0.3s ease;
            display: none; /* Hide the button initially */
        }
        input[type="button"]:hover {
            background-color: #0056b3;
        }
        #premium_value {
            font-weight: bold;
            color: green;
        }
        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .form-div {
                padding: 15px;
            }
            .topic {
                font-size: 20px;
                margin-bottom: 15px;
            }
            input[type="text"],
            input[type="number"] {
                padding: 6px;
            }
            input[type="submit"] {
                padding: 6px 10px;
            }
        }
        @media only screen and (max-width: 480px) {
            .form-div {
                margin: 10px auto;
                padding: 10px;
            }
            .topic {
                font-size: 18px;
                margin-bottom: 10px;
            }
            input[type="text"],
            input[type="number"] {
                padding: 4px;
            }
            input[type="submit"] {
                padding: 4px 8px;
            }
        }
</style>
<body>
    <div class="form-div">
        <span class="topic">Payment</span>
        <form id="paymentForm" action="{{route('Cus_RegOneTimePay')}}" method="post" onsubmit="return proceedToPay()">

            {{ csrf_field() }}
            <label for="Amount">Enter Total Amount :</label>
            <input type="text" name="Reg_Fee" id="Reg_Fee"><br>
            <label for="method">Choose Payment Method</label><br>
            <input type="radio" name="Payment_method" value="One-Time" id="One-Time" onchange="toggleButton()"> <span>Pay One Time</span><br>
            <input type="submit" value="proceed to Pay" id="One-Time-Btn" onclick="proceedToPay()" style="display: none;"> 
            <input type="radio" name="Payment_method" value="Installment" id="Installment" onchange="toggleForms()"> <span>Settle Installment</span><br>
        </form>
        <form action="{{route('Installment')}}" id="Installment-form" style="display: none;" method="POST">
            {{ csrf_field() }} 
            <label for="No-of-Installments">Enter Number of Installments :</label>
            <input type="number" name="No_Installments" id="No_Installments"><br>
            <label for="interest">Interest per Year</label>
            <input type="number" name="Interest" id="Interest" value="0" ><br>
            <label for=""> Amount For a premium</label> 
            <span id="premium_value"></span>
            <input type="hidden" name="premiumAmount" id="premiumAmount" value="0">
            <input type="submit" value="Settle Installment" id="Setup-instmnt">
        </form>
    </div>
    <script>
        function toggleButton() {
            var RegFee = document.getElementById('Reg_Fee');
            var oneTimeRadio = document.getElementById('One-Time');
            var proceedBtn = document.getElementById('One-Time-Btn');

            if (oneTimeRadio.checked && RegFee.value.trim() !='') {
                proceedBtn.style.display = 'block';
            } else {
                proceedBtn.style.display = 'none';
            }
        }

        function toggleForms() {
            var installmentForm = document.getElementById('Installment-form');
            var Installment = document.getElementById('Installment');

            if (Installment.checked) {
                installmentForm.style.display = 'block';
                document.getElementById('Setup-instmnt').style.display='block';
            } else {
                installmentForm.style.display = 'none';
            }
        }

        function proceedToPay() {
            // proceed with payment
            return true;
        }
        function calculatePremium() {
            var amountField = document.getElementById('Reg_Fee');
            var noInstallmentsField = document.getElementById('No_Installments');
            var interestField = document.getElementById('Interest');
            var premiumSpan = document.getElementById('premium_value');

            var amount = parseFloat(amountField.value.trim());
            var noInstallments = parseInt(noInstallmentsField.value.trim());
            var interest = parseFloat(interestField.value.trim());

            if (isNaN(amount) || isNaN(noInstallments) || isNaN(interest) || amount <= 0 || noInstallments <= 0 || interest < 0) {
                premiumSpan.textContent = 'Invalid input';
            } else {
                var premium = (amount + amount * interest / 100) / noInstallments;
                premiumSpan.textContent = premium.toFixed(2); 
                document.getElementById('premiumAmount').value = premium.toFixed(2);
            }
        }

    
        document.getElementById('Reg_Fee').addEventListener('input', calculatePremium);
        document.getElementById('No_Installments').addEventListener('input', calculatePremium);
        document.getElementById('Interest').addEventListener('input', calculatePremium);

    </script>
</body>
</html>
