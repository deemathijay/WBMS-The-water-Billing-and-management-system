<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" href="{{asset('CSS/cus_reg.css')}}">
        <style>
            .password{
                border: 1px solid rgba(5, 121, 20, 0.589);
                border-radius: 10px;
                background-color: rgba(60, 179, 70, 0.288);
                padding: 20px;
            }
            .password input{
                width: 50%;
                height: 30px;
                border-radius: 5px;
                border: 1px solid rgba(39, 39, 39, 0.589);
            }
            .error {
                color: red;
                font-size: 20px;
            }
            </style>
    </head>
    <body>
        <div class="head">
            <h1>Meter Reader Registration</h1>
        </div>
            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
        <div class="form">
            <form method="post" name="form" action="{{route('MTRRegistration')}}" onsubmit="return validateForm()">
                {{ csrf_field() }}
                <br /><br />

                <div class="first">
                    <label>Full Name</label>
                    <input type="text" name="MTR_FullName" required/><br /><br />

                    <label>Name with Initials</label> 
                    <input type="text" name="MTR_NameInitials" required /><br /><br />

                    <label>NIC Number</label> 
                    <input type="text" name="MTR_NIC" id="nic" required/><br /><br />

                    <div class="password">
                        <label>Password</label> 
                        <input type="password" name="MTR_Pwd" id="password" required />
                        <p>* Password should contain at least 8 characters, a numeric value, and a capital letter.</p>
                    </div>
                    <br /><br />
                </div>

                <div class="mobile">
                    <label>Mobile Number</label>
                    <input type="text" name="MTR_Phone1" id="mobile1" required/><br>
                    <span>(Number for sending SMS)</span>
                </div><br />

                <div class="mobile">
                    <label>Mobile Number 2</label>
                    <input type="text" name="MTR_Phone2" id="mobile2" required value="0000000000"/>
                </div><br />

                <div class="last">
                    <label>Address</label> 
                    <textarea name="MTR_Address" rows="3" cols="74" class="address" required></textarea>
                    <br /><br /><br/><br />

                    <label>Gender</label> 
                    <select name="MTR_Gender" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select><br /><br />

                    <label>Date of Birth</label> 
                    <input type="date" class="date" name="MTR_DOB" required>
                    <br /><br />

                    <label>Remark</label>
                    <input type="text" name="Agt_Remark" value="None"/><br /><br />
                </div>

                <div class="ok">
                    <input type="submit" name="submit" value="submit"/>
                </div>
            </form>
        </div>

        <script>
            function validateForm() {
                const form = document.forms['form'];
                const inputs = form.querySelectorAll('input, select, textarea');

                for (let i = 0; i < inputs.length; i++) {
                    const input = inputs[i];
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        alert('Please fill in all required fields.');
                        return false;
                    }
                }

                const nicValue = document.getElementById('nic').value.trim();
                const mobile1Value = document.getElementById('mobile1').value.trim();
                const mobile2Value = document.getElementById('mobile2').value.trim();
                const passwordValue = document.getElementById('password').value.trim();

                const nicRegex = /^(?:\d{9}V|\d{12})$/;
                const mobileRegex = /^0\d{9}$/;
                const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

                if (!nicRegex.test(nicValue)) {
                    alert('NIC number should be 9 digits with "V" or 12 digits.');
                    return false;
                }

                if (!mobileRegex.test(mobile1Value) || (mobile2Value !== '' && !mobileRegex.test(mobile2Value))) {
                    alert('Mobile numbers should have 10 digits and start with "0".');
                    return false;
                }

                if (!passwordRegex.test(passwordValue)) {
                    alert('Password should contain at least 8 characters, a numeric value, and a capital letter.');
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>
