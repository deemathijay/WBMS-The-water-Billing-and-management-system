<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/Admin.css')}}">
    <title>Document</title>
<body>
    <div class="profile-topbar">
        <div class="sub1">
            <ul>
                <li><span class="topic">{{$Agent->Agt_NameInitials}}</span></li>
                <li>{{$Agent->Agt_FullName}} </li>
                <li>{{$Agent->Agt_Address}}</li>
                <li><b>Account Number : {{$AgentAcc->AgtAcc_No}} </b></li>
            </ul>
        </div>
        <div class="sub2">
            <ul>
                {{-- <li><span class="label">Account No  </span> <span class="input"> : AC 345743543</span> </li> --}}
                <li><span class="label">Agent ID </span> <span class="input"> : {{$Agent->Agt_id}}</span></li>
                <li><span class="label">Telephone No</span> <span class="input"> : {{$Agent->Agt_Phone1}}</span></li>
                <li><span class="label">Telephone No</span> <span class="input"> : {{$Agent->Agt_Phone2}}</span></li>
                <li><span class="label">NIC No      </span> <span class="input"> : {{$Agent->Agt_NIC}} </span></li>
                <li><span class="label">Reg Date    </span> <span class="input"> : {{$Agent->created_at}}</span></li>
                <li><span class="label">Updated Date    </span> <span class="input"> : {{$Agent->updated_at}}</span></li>
            </ul>
        </div>
        {{-- <div class="sub3">
            <ul>
                
                <li ><a href="" class="Btn-print" >Print</a></li>
                <li class="wtf"><span class="text-Btn-Active">Print</span></li>
                <li></li>
                
                <li ><span class="rs-tag">Rs.</span><span class="balance">5348.89</span></li>
            </ul>
        </div> --}}
        <div class="sub3">
            <ul>
                <li class="wtf"><span class="text-Btn-Active" style="background-color: rgb(8, 6, 156)">Print</span>
                <li class="wtf"><span class="text-Btn-Active">Active</span> <li class="wtf"><span class="text-Btn-Active" style="background-color: rgb(8, 6, 156)">Edit</span></li>
                <li ><span class="rs-tag">Rs.</span><span class="balance" style="color: green">{{$AgentAcc->AgtAcc_Balance}}</span></li>
            </ul>
        </div>
    </div>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Accounts</span></li>
            <li class="wtf"><span class="text-Btn-Active">Print</span></li>
            <!-- have to add js code to define today and limitations -->
            {{-- <li><div class="wtf">
                    <span class="filter-month"><input type="date" id="datePicker" name="datePicker" min="2024-01-01" max="2024-12-31"></span>
                    <span>To</span>
                    <input type="date" id="datePicker" name="datePicker" min="2024-01-01" max="2024-12-31">
                    <img src="Source/filter-icon.png" alt="filter-icon" srcset="" class="Btn-filter">
                </div>
            </li>  --}}
            {{-- <li><label for="sortingOptions">Sort By:</label>
                <select id="sortingOptions" name="sortingOptions" placeholder="Sort By">
                    <option value="dateAscending">Date (Ascending)</option>
                    <option value="dateDescending">Date (Descending)</option>
                    <option value="balanceAscending">Balance (Ascending)</option>
                    <option value="balanceDescending">Balance (Descending)</option>
                    <option value="payment">Payment (Ascending)</option>
                    <option value="payment">Payment (Decending)</option>
                    <option value="bill">Bill (Ascending)</option>
                    <option value="bill">Bill (Descending)</option>
                </select>
            </li> --}}
            {{-- <li>
                <div class="wtf">
                    <input type="text">
                    <img src="Source/search-icon.png" alt="search-btn" class="Btn-search">
                </div>
            </li>
            <li>
                <img src="Source/print-icon.png" alt="print-icon" srcset="" class="Btn-print">
            </li> --}}
            
        </ul>
    </div>
    <div class="table">
        <table>
            <tr>
                <th style="width: 15vw">Transaction ID</th>
                <th style="width: 10vw">Date</th>
                <th style="width: 15vw">Remarks</th>
                <th style="width: 15vw">Payment ID</th>
                <th style="width: 15vw">Reload ID</th>
                <th style="width: 15vw">Amount</th>
                <th style="width: 15vw">Balance</th>
           </tr>
           
           {{-- @foreach($customers as $customer) --}}
           @foreach($Transactions as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->created_at}}</td>
                <td>{{$transaction->AgtTrs_remark}}</td>
                <td>{{$transaction->Payment_id}}</td>
                <td>{{$transaction->Reload_is}}</td>
                <td>{{$transaction->AgtTrs_Amount}}</td>
                <td>{{$transaction->AgtTrs_Balance}}</td>
            </tr>
            @endforeach
            {{-- @endforeach --}}
            {{--  <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr>
            <tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr><tr>
                <td id="Trans-id-data">T 7268527</td>
                <td id="cus-name-data">Dewmini paboda</td>
                <td id="Trans-date-data">2024-08-17</td>
                <td id="cus-address-data">fhdfsdkf,hfkfjf</td>
                <td id="trans-Remark-data">Bill</td>
                <td id="trans-amount-data">12,090.00</td>
                <td id="trans-balance-data">2,989.00</td>
            </tr> --}}

            
            <!-- should add js code for change color according to remark value whether its Bill or payment -->
        </table>
    </div>
</body>
</html>