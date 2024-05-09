<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Customer List</title>
</head>
<body>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Customer's Accounts List</span></li>
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
                    <button type="submit" class="Btn-search">Search</button> <!-- Replace with a suitable button -->
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
                <button type="button" class="Btn-print">Print</button> <!-- Replace with a suitable button -->
            </li>
        </ul>
    </div>
    <div class="table">
        <table>
            <tr>
                <th id="cus-id">Customer ID</th>
                <th id="cus-name">Name With Initials</th>
                <th id="cus-nic">NIC</th>
                <th id="cus-phone">Phone NUmber</th>
                <th id="cus-reg-date">Registered Date</th>
                <th id="cus-address">Address</th>
                <th id="cus-balance">Date Of Birth</th>
                <th id="cus-status">Remark (if Any)</th>
                <th id="cus-edit">Edit</th> <!-- New Edit column -->
            </tr>
            {{-- <tr>
                <td id="cus-id-data">C001</td>
                <td id="cus-name-data">John Doe</td>
                <td id="cus-nic-data">123456789X</td>
                <td id="cus-phone-data">123-456-7890</td>
                <td id="cus-reg-date-data">2023-10-15</td>
                <td id="cus-address-data">123 Main St, City</td>
                <td id="cus-balance-data">$500.00</td>
                <td id="cus-status-data">Active</td>
                <td id="cus-edit-data"><a href="edit_customer.html" class="Btn-edit">Edit</a></td> <!-- Change to a button class -->
            </tr> --}}
            @foreach($customers as $customer)
                {{-- @foreach($customer->accounts as $account) --}}
                    <tr>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_id }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_NameInitials }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_NIC }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_Phone1 }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->created_at }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_Address }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_DOB }}</a></td>
                        <td><a href="{{route('viewCusProfile',['id'=>$customer->id])}}">{{ $customer->Cus_Remark }}</a></td>
                        <td><a href="{{route('editCusProfile',['id'=>$customer->id])}}" class="Btn-edit" style="color: aliceblue">Edit</a></td>
                    </tr>
                {{-- @endforeach --}}
            @endforeach
            <!-- Additional customer rows go here -->
        </table>
    </div>
</body>
</html>
