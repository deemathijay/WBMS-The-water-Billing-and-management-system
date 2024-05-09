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
        <form method="post"name="form" action="{{route('saveProfileChanges',['id'=>$customer->id])}}" onsubmit="return validateForm()">
            
            @csrf
            {{-- @method('PUT')  --}}
            <br />
            <br />

            <div class="first">
            <label>Full Name</label>
            <input type="text" name="Cus_FullName" value="{{ $customer->Cus_FullName }}" required/><br /><br />

            <label>Name with Initials</label> 
            <input type="text" name="Cus_NameInitials" value="{{ $customer->Cus_NameInitials }}" required /><br /><br />

            <label>NIC Number </label> 
            <input type="text" name="Cus_NIC" id="nic" value="{{ $customer->Cus_NIC }}" required/><br /><br />

            <!-- <label>Account No </label> 
            <input type="text" name="accNo" value="{{ $customer->Cus_FullName }}" required /><br /><br />
            </div> -->

            <div class="mobile">
            <label>Mobile Number</label>
            <input type="text" name="Cus_Phone1" id="mobile1" value="{{ $customer->Cus_Phone1 }}" required/><br><span>(Number for send SMS)</span>
            </div><br />

            <div class="mobile">
                <label>Mobile Number 2</label>
                <input type="text" name="Cus_Phone2" id="mobile2" value="{{ $customer->Cus_Phone2 }}" />
                </div><br />

            <div class="last">
            <label>Address</label> 
            <input type="text" name="Cus_Address" rows="3" cols="74" class="address" value="{{ $customer->Cus_Address }}" required> </input>
            <br /><br /><br/><br />

            <label>Gender</label> 

            @if($customer->Cus_Gender=='M')
                <span> Male</span>
                @else
                <span> Female</span>
            @endif

            <select name="Cus_Gender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br /><br />

            <label>Date of Birth</label> 
            <input type="date" class="date" name="Cus_DOB" value="{{ $customer->Cus_DOB }}" required>
            <br /><br />

            <label>Remark </label>
            <input type="text" name="Cus_Remark" value="{{ $customer->Cus_Remark }}"/><br /><br />
            </div>

            <div class="ok">
            <input type="submit" name="submit" value="submit"/>
            </div>
        </div>
        <script>
            // const nicInput = document.getElementById('nic');
            // nicInput.addEventListener('blur', function() {
                
            //     const nicValue = nicInput.value.trim();
            //     const nicRegex = /^(?:\d{9}V|\d{12})$/;
            //     if (!nicRegex.test(nicValue)) {
            //         nicInput.classList.add('error');
            //         nicInput.classList.remove('success')
            //     } else {
            //         nicInput.classList.remove('error');
            //         nicInput.classList.add('success');
            //     }
            // });


            // const mobileInput = document.getElementById('mobile1');
            //     mobileInput.addEventListener('blur', function() {
            //     const mobileValue = mobileInput.value.trim();
            //     const mobileRegex = /^0\d{9}$/;
            //     if (!mobileRegex.test(mobileValue)) {  
            //         mobileInput.classList.add('error');
            //         mobileInput.classList.remove('success')
            //     } else {
            //         mobileInput.classList.remove('error');
            //         mobileInput.classList.add('success');

            //     }
            // });
            // const mobileInput1 = document.getElementById('mobile2');
            //     mobileInput1.addEventListener('blur', function() {
            //     const mobileValue1 = mobileInput1.value.trim();
            //     const mobileRegex = /^0\d{9}$/;
            //     if (!mobileRegex.test(mobileValue1)) {  
            //         mobileInput1.classList.add('error');
            //         mobileInput1.classList.remove('success')
            //     } else {
            //         mobileInput1.classList.remove('error');
            //         mobileInput1.classList.add('success');

            //     }
            // });

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

                if (!mobileRegex.test(mobile1Value) && !mobileRegex.test(mobile2Value)) {
                    alert('Mobile numbers should have 10 digits and start with "0".');
                    return false;
                }

                
                return true;
            }



        </script>
        <style>
            .error {
                border-color: lightcoral;
                background-color: rgba(240, 128, 128, 0.377);
            }
            .success {
                border-color: rgb(128, 240, 147);
                background-color: rgba(43, 226, 68, 0.377);
            }
        </style>





    </form>
    </body>
    </html>