<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin.css">
    <title>Customer List</title>
</head>
<body>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Customers</span></li>
            <li>
                <label for="sortingOptions">Sort By:</label>
                <select id="sortingOptions" name="sortingOptions" placeholder="Sort By">
                    <option value="nameAscending">Name (A-Z)</option>
                    <option value="nameDescending">Name (Z-A)</option>
                    <option value="dateAscending">Date Added (Oldest First)</option>
                    <option value="dateDescending">Date Added (Newest First)</option>
                </select>
            </li>
            <li>
                <div class="wtf">
                    <input type="text" id="customerSearch" placeholder="Search by name">
                    <img src="Source/search-icon.png" alt="search-btn" class="Btn-search">
                </div>
            </li>
            <li>
                <label for="filterStatus">Filter By Status:</label>
                <select id="filterStatus" name="filterStatus">
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="red">Red</option>
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
                <th id="cus-id">Customer ID</th>
                <th id="cus-name">Name</th>
                <th id="cus-nic">NIC</th>
                <th id="cus-phone">Phone</th>
                <th id="cus-reg-date">Registered Date</th>
                <th id="cus-address">Address</th>
                <th id="cus-balance">Balance</th>
                <th id="cus-status">Status</th>
                <th id="cus-edit">Edit</th> <!-- New Edit column -->
            </tr>
            <tr>
                <td id="cus-id-data">C001</td>
                <td id="cus-name-data">John Doe</td>
                <td id="cus-nic-data">123456789X</td>
                <td id="cus-phone-data">123-456-7890</td>
                <td id="cus-reg-date-data">2023-10-15</td>
                <td id="cus-address-data">123 Main St, City</td>
                <td id="cus-balance-data">$500.00</td>
                <td id="cus-status-data">Active</td>
                <td id="cus-edit-data"><a href="edit_customer.html"><img src="Source/edit-icon.png" alt="Edit" class="Btn-edit"></a></td>
            </tr>
            <!-- Additional customer rows go here -->
        </table>
    </div>
</body>
</html>
