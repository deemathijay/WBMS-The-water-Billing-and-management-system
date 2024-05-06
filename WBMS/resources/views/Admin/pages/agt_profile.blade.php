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
                <li><span class="topic">Bataya ABC</span></li>
                <li>Ammatasiri bataya company </li>
                <li>1/3 , kotendeniya road ,Meerigama.</li>
            </ul>
        </div>
        <div class="sub2">
            <ul>
                <li><span class="label">Account No  </span> <span class="input"> : AC 345743543</span> </li>
                <li><span class="label">Agent ID </span> <span class="input"> : Ag 435354353</span></li>
                <li><span class="label">Telephone No</span> <span class="input"> : 0716434757</span></li>
                <li><span class="label">NIC No      </span> <span class="input"> : 652460135 V </span></li>
                <li><span class="label">Reg Date    </span> <span class="input"> : 2024 / 10 / 45</span></li>
            </ul>
        </div>
        <div class="sub3">
            <ul>
                <li ><img src="./Source/print-icon.png" alt="print-icon" class="Btn-print" /></li>
                <li class="wtf"><span class="text-Btn-Active">Active</span><img src="Source/edit-icon.png" alt="print-icon" class="Btn-edit"></li>
                <li ><span class="rs-tag">Rs.</span><span class="balance">5348.89</span></li>
            </ul>
        </div>
    </div>
    <div class="sub-topic-bar">
        <ul>
            <li><span class="sub-topic">Transactions</span></li>
            <!-- have to add js code to define today and limitations -->
            <li><div class="wtf">
                    <span class="filter-month"><input type="date" id="datePicker" name="datePicker" min="2024-01-01" max="2024-12-31"></span>
                    <span>To</span>
                    <input type="date" id="datePicker" name="datePicker" min="2024-01-01" max="2024-12-31">
                    <img src="Source/filter-icon.png" alt="filter-icon" srcset="" class="Btn-filter">
                </div>
            </li> 
            <li><label for="sortingOptions">Sort By:</label>
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
            </li>
            <li>
                <div class="wtf">
                    <input type="text">
                    <img src="Source/search-icon.png" alt="search-btn" class="Btn-search">
                </div>
            </li>
            <li>
                <img src="Source/print-icon.png" alt="print-icon" srcset="" class="Btn-print">
            </li>
        </ul>
    </div>
    <div class="table">
        <table>
            <tr>
                <th id="Trans-id">Transac. ID</th>
                <th id="cus-name">Customer</th>
                <th id="Trans-date">Date</th>
                <th id="cus-address">Address</th>
                <th id="trans-Remark">Remark</th>
                <th id="trans-amount">Amount</th>
                <th id="trans-balance">Balance</th>
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
            </tr>

            
            <!-- should add js code for change color according to remark value whether its Bill or payment -->
        </table>
    </div>
</body>
</html>