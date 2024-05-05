<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Payment List</title>
</head>
<body>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Payments</span></li>
            <li>
                <label for="sortingOptions">Sort By:</label>
                <select id="sortingOptions" name="sortingOptions" placeholder="Sort By">
                    <option value="idAscending">ID (Ascending)</option>
                    <option value="idDescending">ID (Descending)</option>
                    <option value="dateAscending">Date (Oldest First)</option>
                    <option value="dateDescending">Date (Newest First)</option>
                </select>
            </li>
            <li>
                <div class="wtf">
                    <input type="text" id="paymentSearch" placeholder="Search by customer name">
                    <img src="Source/search-icon.png" alt="search-btn" class="Btn-search">
                </div>
            </li>
            <li>
                <label for="filterStatus">Filter By Status:</label>
                <select id="filterStatus" name="filterStatus">
                    <option value="all">All</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </li>
            <li>
                <img src="Source/print-icon.png" alt="print-icon" srcset="" class="Btn-print">
            </li>
        </ul>
    </div>
    <div class="table">
        <table>
            <tr>
                <th id="trans-id">Payment ID</th>
                <th id="trans-customer-name">Customer Name</th>
                <th id="trans-nic">NIC</th>
                <th id="trans-account">Account Number</th>
                <th id="trans-date">Date</th>
                <th id="trans-time">Time</th>
                <th id="trans-agent">Agent Name</th>
                <th id="trans-amount">Amount</th>
            </tr>
            <tr>
                <td id="trans-id-data">P001</td>
                <td id="trans-customer-name-data">John Doe</td>
                <td id="trans-nic-data">123456789X</td>
                <td id="trans-account-data">A-12345678</td>
                <td id="trans-date-data">2023-10-15</td>
                <td id="trans-time-data">12:30 PM</td>
                <td id="trans-agent-data">Agent Smith</td>
                <td id="trans-amount-data">$100.00</td>
            </tr>
            <!-- Additional payment rows go here -->
        </table>
    </div>
</body>
</html>
