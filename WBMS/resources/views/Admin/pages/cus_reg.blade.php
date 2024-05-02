<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" href="{{asset('CSS/cus_reg.css')}}">
    </head>

    <body>
        {{-- @extends('Admin.Main')

        @section('content') --}}
        <div class="head">
        <h1>Customer Registration</h1>
        </div>
        
        <div class="form">
        <form method="post"name="form" action="{{route('Cus_reg')}}">
            {{ csrf_field() }}
            <br />
            <br />

            <div class="first">
            <label>Full Name</label>
            <input type="text" name="Cus_FullName" /><br /><br />

            <label>Name with Initials</label> 
            <input type="text" name="Cus_NameInitials" /><br /><br />

            <label>NIC Number </label> 
            <input type="text" name="Cus_NIC" /><br /><br />

            <label>Account No </label> 
            <input type="text" name="accNo" /><br /><br />
            </div>

            <div class="mobile">
            <label>Mobile Number</label>
            <input type="text" name="Cus_Phone1" /><br><span>(Number for send SMS)</span>
            </div><br />

            <div class="mobile">
                <label>Mobile Number 2</label>
                <input type="text" name="Cus_Phone2" />
                </div><br />

            <div class="last">
            <label>Address</label> 
            <textarea name="Cus_Address" rows="3" cols="74" class="address"> </textarea>
            <br /><br /><br/><br />

            <label>Gender</label> 
            <select name="Cus_Gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br /><br />

            <label>Date of Birth</label> 
            <input type="date" class="date" name="Cus_DOB">
            <br /><br />

            <label>Remark </label>
            <input type="text" name="Cus_Remark" /><br /><br />
            </div>

            <div class="ok">
            <input type="submit" name="submit" value="submit"/>
            </div>
        </div>
    </form>
    </body>
    </html>