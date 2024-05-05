<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Agent List</title>
</head>
<body>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Agents</span></li>
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
                    <input type="text" id="agentSearch" placeholder="Search by name">
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
                <th id="agt-id">Agent ID</th>
                <th id="agt-name">Name</th>
                <th id="agt-nic">NIC</th>
                <th id="agt-phone">Phone</th>
                <th id="agt-reg-date">Registered Date</th>
                <th id="agt-address">Address</th>
                <th id="agt-balance">Balance</th>
                <th id="agt-status">Status</th>
                <th id="agt-edit">Edit</th> <!-- New Edit column -->
            </tr>
            <tr>
                <td id="agt-id-data">A001</td>
                <td id="agt-name-data">John Doe</td>
                <td id="agt-nic-data">123456789X</td>
                <td id="agt-phone-data">123-456-7890</td>
                <td id="agt-reg-date-data">2023-10-15</td>
                <td id="agt-address-data">123 Main St, City</td>
                <td id="agt-balance-data">$500.00</td>
                <td id="agt-status-data">Active</td>
                <td id="agt-edit-data"><a href="edit_agent.html"><img src="Source/edit-icon.png" alt="Edit" class="Btn-edit"></a></td>
            </tr>
            <!-- Additional agent rows go here -->
        </table>
    </div>
</body>
</html>
