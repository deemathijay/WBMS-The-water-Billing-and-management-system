<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Registration Invoice</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .invoice-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .invoice-header, .invoice-details, .invoice-footer {
        margin-bottom: 20px;
    }
    .invoice-details table {
        width: 100%;
        border-collapse: collapse;
    }
    .invoice-details th, .invoice-details td {
        padding: 8px;
        border: 1px solid #ccc;
        text-align: left;
        
    }
    .invoice-details th {
        background-color: #f2f2f2;
    }
    .total-row td {
        padding-top: 10px;
        font-weight: 600;

    }
    .print-button {
        background-color: #ff0000;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .wtf{
        width: 50vw;
    }
</style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Customer Registration Invoice</h1>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>Customer ID:</th>
                    <td>{{$customer->Cus_id}}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{$customer->Cus_NameInitials}}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{$customer->Cus_Address}}</td>
                </tr>
                <tr>
                    <th>Telephone:</th>
                    <td>{{$customer->Cus_Phone1}}</td>
                </tr>
                <tr>
                    <th>NIC Number:</th>
                    <td>{{$customer->Cus_NIC}}</td>
                </tr>
                <tr>
                    <th>Birthdate:</th>
                    <td>{{$customer->Cus_DOB}}</td>
                </tr>
                <tr>
                    <th>Account Number:</th>
                    <td>{{$CusAccid->CusAcc_No}}</td>
                </tr>
            </table>
        </div>
        <div class="invoice-footer">
            <h3>Invoice Details</h3>
            <table>
                <tr>
                    <th class="wtf">Description</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>New Connection Charges</td>
                    <td>{{$RegFee->RegFee_Amount}}</td>
                </tr>
                <tr>
                    <td>Registration Fee</td>
                    <td>{{$RegFee->RegFee_RegFee}}</td>
                </tr>
                <tr>
                    <td>Government Tax</td>
                    <td>{{$RegFee->RegFee_GovTax}}</td>
                </tr>
                <tr>
                    <td>Handling Charges</td>
                    <td>{{$RegFee->RegFee_Handling}}</td>
                </tr>
                <tr>
                    <td>Other Charges</td>
                    <td>{{$RegFee->RegFee_Other}}</td>
                </tr>
                
                <tr class="total-row">
                    <td>Total</td>
                    <td>{{$RegFee->RegFee_Total}}</td>
                </tr>
            </table>
        </div>
        <button class="print-button" onclick="window.print()">Print Invoice</button>
    </div>
</body>
</html>
