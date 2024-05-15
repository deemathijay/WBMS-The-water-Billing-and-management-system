<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" href="{{asset('CSS/cus_reg.css')}}">
    </head>

    <body>
        <div class="head">
        <h1>Agent Registration</h1>
        </div>
        
        <div class="form">
        <form method="post"name="form" action="{{route('Agt_reg')}}" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <br />
            <br />

            <div class="first">
            <label>Full Name</label>
            <input type="text" name="Agt_FullName" required/><br /><br />

            <label>Name with Initials</label> 
            <input type="text" name="Agt_NameInitials" required /><br /><br />

            <label>NIC Number </label> 
            <input type="text" name="Agt_NIC" id="nic" required/><br /><br />

            {{-- <label>Account No </label> 
            <input type="text" name="accNo" required /><br /><br />
            </div> --}}

            <div class="mobile">
            <label>Mobile Number</label>
            <input type="text" name="Agt_Phone1" id="mobile1" required/><br><span>(Number for send SMS)</span>
            </div><br />

            <div class="mobile">
                <label>Mobile Number 2</label>
                <input type="text" name="Agt_Phone2" id="mobile2" required value="0000000000"/>
                </div><br />

            <div class="last">
            <label>Address</label> 
            <textarea name="Agt_Address" rows="3" cols="74" class="address" required> </textarea>
            <br /><br /><br/><br />

            <label>Gender</label> 
            <select name="Agt_Gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br /><br />

            <label>Date of Birth</label> 
            <input type="date" class="date" name="Agt_DOB" required>
            <br /><br />

            <label>Remark </label>
            <input type="text" name="Agt_Remark" value="None"/><br /><br />
            </div>

            <div class="ok">
            <input type="submit" name="submit" value="submit"/>
            </div>
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

                
                const nicRegex = /^(?:\d{9}V|\d{12})$/;
                const mobileRegex = /^0\d{9}$/;

                
                if (!nicRegex.test(nicValue)) {
                    alert('NIC number should be 9 digits with "V" or 12 digits.');
                    return false;
                }

                if (!mobileRegex.test(mobile1Value) || mobile2Value !== '' && !mobileRegex.test(mobile2Value)) {
                    alert('Mobile numbers should have 10 digits and start with "0".');
                    return false;
                }

                
                return true;
    }



        </script>





    </form>
    </body>
    </html>