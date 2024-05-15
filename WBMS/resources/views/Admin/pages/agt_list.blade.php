<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Customer List</title>
    <style>
        @media print{
            .hide-on-print {
                display: none !important; 
            }
        }
    </style>
</head>
<body>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Agent's Accounts List</span></li>
            <li>
                <label for="sortingOptions">Sort By:</label>
                <select id="sortingOptions" name="sortingOptions" onchange="sortTable()">
                    <option value="cusIdAsc">Agent ID (Ascending)</option>
                    <option value="cusIdDesc">Agent ID (Descending)</option>
                    <option value="nameAsc">Name (A-Z)</option>
                    <option value="nameDesc">Name (Z-A)</option>
                    <option value="dateAsc">Registered Date (Oldest First)</option>
                    <option value="dateDesc">Registered Date (Newest First)</option>
                </select>
            </li>
            <li>
                <div class="wtf">
                    <input type="date" id="fromDate" name="fromDate" onchange="filterTable()" min="2024-01-01">
                    <span>To</span>
                    <input type="date" id="toDate" name="toDate" onchange="filterTable()" min="2024-01-01">

                    {{-- <span class="text-Btn-Active" style="background-color: #b16107">Filter</span> --}}
                </div>
            </li>
            <li>

                <div class="wtf">
                    <input type="text" id="customerSearch" onkeyup="filterTable()" placeholder="Search ...">
                    <button type="submit" class="Btn-search">Search</button> 
                </div>
            </li>
            {{-- <li>
                <label for="filterStatus">Filter By Status:</label>
                <select id="filterStatus" name="filterStatus">
                    <option value="all">All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="red">Red</option>
                </select>
            </li> --}}
            <li>
                <button type="button" class="Btn-print" onclick="printWindow()">Print</button> 
            </li>
        </ul>
    </div>
    <div class="table">
        <table id="customerTable">
            <tr>
                <th id="cus-id">Agent ID</th>
                <th id="cus-name">Name With Initials</th>
                <th id="cus-nic">NIC</th>
                <th id="cus-phone">Phone NUmber</th>
                <th id="cus-reg-date">Registered Date</th>
                <th id="cus-address">Address</th>
                <th id="cus-balance">Balance</th>
                <th id="cus-status">Remark (if Any)</th>
                <th id="cus-edit" class="hide-on-print">Edit</th> 
            </tr>
         
            @foreach($agents as $agent)
                
                    <tr>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_id }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_NameInitials }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_NIC }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_Phone1 }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->created_at }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_Address }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_DOB }}</a></td>
                        <td><a href="{{route('viewAgtProfile',['id'=>$agent->id])}}">{{ $agent->Agt_Remark }}</a></td>
                        <td class="hide-on-print"><a href="{{route('editCusProfile',['id'=>$agent->id])}}" class="Btn-edit" style="color: aliceblue">Edit</a></td>
                    </tr>
                
            @endforeach
            
        </table>
    </div>

    {{-- here im going to fked up officially implementing js for filter sunctions --}}

    <script>
        function filterTable() {
            var input = document.getElementById('customerSearch').value.toLowerCase();
            var fromDate = document.getElementById('fromDate').value;
            var toDate = document.getElementById('toDate').value;
            var table = document.getElementById('customerTable');
            var rows = table.getElementsByTagName('tr');

            for (var i = 1; i < rows.length; i++) {
                var nameCell = rows[i].getElementsByTagName('td')[1]; 
                var nicCell = rows[i].getElementsByTagName('td')[2]; 
                var idCell = rows[i].getElementsByTagName('td')[0]; 
                var phoneCell = rows[i].getElementsByTagName('td')[3]; 
                var regDateCell = rows[i].getElementsByTagName('td')[4]; //  registration date cell

                if (nameCell && nicCell && idCell && phoneCell && regDateCell) {
                    var name = nameCell.textContent.toLowerCase();
                    var nic = nicCell.textContent.toLowerCase();
                    var id = idCell.textContent.toLowerCase();
                    var phone = phoneCell.textContent.toLowerCase();
                    var regDate = new Date(regDateCell.textContent);

                    var isInDateRange = true;

                    // Check if the registration date falls within the selected range
                    if (fromDate && toDate) {
                        var fromDateObj = new Date(fromDate);
                        var toDateObj = new Date(toDate);

                        if (regDate < fromDateObj || regDate > toDateObj) {
                            isInDateRange = false;
                        }
                    }

                    if ((name.indexOf(input) > -1 || 
                        nic.indexOf(input) > -1 || 
                        id.indexOf(input) > -1 || 
                        phone.indexOf(input) > -1) && isInDateRange) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }


       
            function sortTable() {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById("customerTable");
                switching = true;
                var sortOption = document.getElementById("sortingOptions").value;

                while (switching) {
                    switching = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[getColumnIndex(sortOption)];
                        y = rows[i + 1].getElementsByTagName("TD")[getColumnIndex(sortOption)];

                        if (x && y) {
                            if (sortOption.includes("Asc") && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            } else if (sortOption.includes("Desc") && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }

            function getColumnIndex(sortOption) {
                switch (sortOption) {
                    case "cusIdAsc":
                    case "cusIdDesc":
                        return 0; // Customer ID 
                    case "nameAsc":
                    case "nameDesc":
                        return 1; // Name 
                    case "nicAsc":
                    case "nicDesc":
                        return 2; // NIC 
                    case "phoneAsc":
                    case "phoneDesc":
                        return 3; // Phone Number 
                    case "dateAsc":
                    case "dateDesc":
                        return 4; // Registered Date 
                    case "addressAsc":
                    case "addressDesc":
                        return 5; // Address 
                    case "dobAsc":
                    case "dobDesc":
                        return 6; // Date Of Birth 
                    case "remarkAsc":
                    case "remarkDesc":
                        return 7; // Remark 
                    default:
                        return -1; // Invalid option
                }
            }

            function printWindow() {
                var printContents = document.getElementById("customerTable").outerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                }


        </script>

    
    












</body>
</html>
