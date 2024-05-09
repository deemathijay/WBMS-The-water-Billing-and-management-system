<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .heading {
            text-align: center;
            margin-bottom: 20px;
        }
        .customer-info {
            margin-bottom: 20px;
        }
        .customer-info label {
            font-weight: bold;
            width: 40vw;
            margin-left: 1vw; 
            box-sizing: border-box;
        }
        .customer-info span {
            margin-left: 10px;
        }
        [class ^='btn'] {
            display: inline;
            margin: 30px;
            margin-top: 5vh;
            width: 12vw;
            margin: 0 auto;
            text-align: center;
            background-color: #08330a;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            text-decoration: none;
        }
        [class ^='btn']:hover {
            background-color: #00681a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Customer Details Updated</h1>
        <div class="customer-info">
            <label>Full Name:</label>
            <span>{{ $customer->Cus_FullName }}</span>
        </div>
        <div class="customer-info">
            <label>Name with Initials:</label>
            <span>{{ $customer->Cus_NameInitials }}</span>
        </div>
        
        <div class="customer-info">
            <label>National ID:</label>
            <span>{{ $customer->Cus_NIC }}</span>
        </div>
        
        <div class="customer-info">
            <label>Address:</label>
            <span>{{ $customer->Cus_Address }}</span>
        </div>
        <div class="customer-info">
            <label>Gender:</label>
            <span>{{ $customer->Cus_Gender }}</span>
        </div>
        <div class="customer-info">
            <label>Mobile Phone 1 :</label>
            <span>{{ $customer->Cus_Phone1 }}</span>
        </div>
        <div class="customer-info">
            <label>Mobile Phone 2 :</label>
            <span>{{ $customer->Cus_Phone2 }}</span>
        </div>
        <div class="customer-info">
            <label>Date of Birth :</label>
            <span>{{ $customer->Cus_DOB }}</span>
        </div>
        <div class="customer-info">
            <label>Remark (if any ):</label>
            <span>{{ $customer->Cus_DOB }}</span>
        </div>
        <div class="customer-info">
            <label>Customer ID:</label>
            <span>{{ $customer->Cus_id }}</span>
        </div>
        <div class="customer-info">
            <label>Registered Date :</label>
            <span>{{ $customer->created_at }}</span>
        </div>

        <div class="customer-info">
            <label>Updated Date :</label>
            <span>{{ $customer->updated_at }}</span>
        </div>
        <a href="#" class="btn-back">Back to Customer List</a>
        <a href="#" class="btn-print">Print Invoice</a>
    </div>
</body>
</html>
