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
                    <td>123456</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>123 Main Street, Cityville</td>
                </tr>
                <tr>
                    <th>Telephone:</th>
                    <td>123-456-7890</td>
                </tr>
                <tr>
                    <th>NIC Number:</th>
                    <td>ABC123456</td>
                </tr>
                <tr>
                    <th>Birthdate:</th>
                    <td>01/01/1990</td>
                </tr>
                <tr>
                    <th>Account Number:</th>
                    <td>7890123456</td>
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
                    <td>Registration Fee</td>
                    <td>$50.00</td>
                </tr>
                <tr>
                    <td>Government Tax</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>New Connection Charges</td>
                    <td>$10.00</td>
                </tr>
                <tr class="total-row">
                    <td>Total</td>
                    <td>$65.00</td>
                </tr>
            </table>
        </div>
        <button class="print-button" onclick="window.print()">Print Invoice</button>
    </div>
</body>
</html>
