<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Headers Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f0f0, #ffffff);
            color: #333333;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            table-layout: fixed;
            word-wrap: break-word;
        }

        th, td {
            border: 1px solid rgba(48, 51, 107, 0.3);
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: rgba(48, 51, 107, 0.1);
        }

        td {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .vertical-header th {
            writing-mode: vertical-rl;
            text-orientation: mixed;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                writing-mode: horizontal-tb;
                text-orientation: upright;
                text-align: left;
                background-color: rgba(48, 51, 107, 0.1);
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #ddd;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: calc(50% - 20px);
                text-align: left;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
    <h1>Service Charges and Rates</h1>
    <table class="vertical-header">
        <thead>
            <tr>
                <th>Type of Accounts</th>
                <th>Service Charge</th>
                <th>Late Interest</th>
                <th>0-5 units</th>
                <th>6-10 units</th>
                <th>11-15 units</th>
                <th>16-20 units</th>
                <th>21-25 units</th>
                <th>26-30 units</th>
                <th>31-35 units</th>
                <th>36-40 units</th>
                <th>41-50 units</th>
                <th>51-80 units</th>
                <th>80 upwards</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Type of Accounts">Residential</td>
                <td data-label="Service Charge">$5</td>
                <td data-label="Late Interest">$1</td>
                <td data-label="0-5 units">$0.50</td>
                <td data-label="6-10 units">$0.75</td>
                <td data-label="11-15 units">$1.00</td>
                <td data-label="16-20 units">$1.25</td>
                <td data-label="21-25 units">$1.50</td>
                <td data-label="26-30 units">$1.75</td>
                <td data-label="31-35 units">$2.00</td>
                <td data-label="36-40 units">$2.25</td>
                <td data-label="41-50 units">$2.50</td>
                <td data-label="51-80 units">$3.00</td>
                <td data-label="80 upwards">$4.00</td>
            </tr>
            <tr>
                <td data-label="Type of Accounts">Commercial</td>
                <td data-label="Service Charge">$10</td>
                <td data-label="Late Interest">$2</td>
                <td data-label="0-5 units">$1.00</td>
                <td data-label="6-10 units">$1.50</td>
                <td data-label="11-15 units">$2.00</td>
                <td data-label="16-20 units">$2.50</td>
                <td data-label="21-25 units">$3.00</td>
                <td data-label="26-30 units">$3.50</td>
                <td data-label="31-35 units">$4.00</td>
                <td data-label="36-40 units">$4.50</td>
                <td data-label="41-50 units">$5.00</td>
                <td data-label="51-80 units">$6.00</td>
                <td data-label="80 upwards">$8.00</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</body>
</html>
