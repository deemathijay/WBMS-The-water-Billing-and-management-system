<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Additional Charges Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        margin-top: 15vh;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        margin-top: 10px;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    select{
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Add Additional Charges</h1>
        <form id="additionalChargesForm" action="{{ route('Cus_RegAdditionalCharges') }}" method="POST">
            @csrf
            
            <label for="account_type">Choose the Account Type:</label>
                <select name="account_type" id="account_type">
                    <option value="Home">Home</option>
                    <option value="Business">Business</option>
                    <option value="Charity">Charity</option>
                    <option value="Option 1">Option 1</option>
                    <option value="Option 2">Option 2</option>
                    <option value="Option 3">Option 3</option>
                </select>

            <label for="">Remark (If Any Changes Ex: Address)</label>
            <input type="text" name="Cus_Remark">

            <label for="registrationFee">Registration Fee:</label>
            <input type="text" id="registrationFee" name="registrationFee">

            <label for="governmentTax">Government Tax:</label>
            <input type="text" id="governmentTax" name="governmentTax">

            <label for="handlingCharges">Handling Charges:</label>
            <input type="text" id="handlingCharges" name="handlingCharges">

            <label for="otherCharges">Other Charges:</label>
            <input type="text" id="otherCharges" name="otherCharges">

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('additionalChargesForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var registrationFee = parseFloat(document.getElementById('registrationFee').value) || 0;
            var governmentTax = parseFloat(document.getElementById('governmentTax').value) || 0;
            var handlingCharges = parseFloat(document.getElementById('handlingCharges').value) || 0;
            var otherCharges = parseFloat(document.getElementById('otherCharges').value) || 0;

            var totalCharges = registrationFee + governmentTax + handlingCharges + otherCharges;

            var confirmation = confirm('Total Charges: $' + totalCharges.toFixed(2) + '. Are you sure you want to submit?');
            
            if (confirmation) {
                
                this.submit(); 
            }
        });
    </script>
</body>
</html>
