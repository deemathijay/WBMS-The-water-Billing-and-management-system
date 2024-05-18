<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout Confirmation</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    .logout-box {
        width: 800px;
        margin: 100px auto;
        background-color: #fff;
        border-radius: 5px;
        padding: 50px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .logout-box h2 {
        margin-bottom: 20px;
    }
    .btn-group {
        margin-top: 20px;
    }
    .btn {
        display: inline-block;
        padding: 8px 20px;
        margin-right: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn.yes {
        background-color: #007bff; /* Blue color for "Yes" */
    }
    .btn.yes:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
    .btn.no {
        background-color: #dc3545; /* Red color for "No" */
    }
    .btn.no:hover {
        background-color: #bb2d3b; /* Darker red on hover */
    }
</style>
</head>
<body>
    <div class="logout-box">
        <h2>Are you sure you want to log out?</h2>
        <div class="btn-group">
            <a href="{{route('LogoutConfirm')}}" class="btn yes" id="confirmLogout">Yes</a>
            <a href="{{route('Validate1')}}" class="btn no" id="cancelLogout">No</a>
        </div>
    </div>

    
</body>
</html>
