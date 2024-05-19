<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #343a40;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .container div img {
            max-width: 100px;
            height: auto;
        }

        h1 {
            font-size: 2em;
            margin: 20px 0 10px;
        }

        h4 {
            font-size: 1.2em;
            margin-bottom: 20px;
            color: #6c757d;
        }

        .log {
            margin: 20px auto;
            padding: 30px;
            max-width: 300px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .log input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #0d6efd;
            color: #ffffff;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0b5ed7;
        }

        p {
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }

        p a {
            color: #0d6efd;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Media Query for smaller devices */
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
                margin-top: 10vh;
            }

            .log {
                padding: 20px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <img src="{{asset('source/logo.jpg')}}" alt="Logo">
            <h1>WBMS</h1>
            <h4>Meter Reading Portal</h4>
        </div>
       
      <form id="loginForm" action="{{route('MeterloginValidate')}}" method="POST">
            @csrf
        <div class="log">
          <input type="text" id="username" name="username" required placeholder="User Name">
            <input type="password" id="password" placeholder="Password" name="PWD">

           <p id="errorMessage" style="color: red; display: none;"></p>
           @if (session('error'))
           <div style="color: red;">
               {{ session('error') }}
           </div>
       @endif
        </div>

        <button type="submit">LOGIN</button>
        </form>
        <p>Any Issue? <a href="#">Contact Us</a></p>
    </div>



  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const loginForm = document.getElementById("loginForm");
          const usernameInput = document.getElementById("username");
          const errorMessage = document.getElementById("errorMessage");

          function containsSQLInjection(value) {
              const sqlInjectionPatterns = [
                  /(\b)(SELECT|INSERT|UPDATE|DELETE|DROP|UNION|CREATE|ALTER|TRUNCATE|EXEC)(\b)/i, 
                  /(\b)(AND|OR)(\b)/i, 
                  /['"=;]/ 
              ];

              return sqlInjectionPatterns.some(pattern => pattern.test(value));
          }

          loginForm.addEventListener("submit", function(event) {
              const username = usernameInput.value;
              if (containsSQLInjection(username)) {
                  event.preventDefault();
                  errorMessage.textContent = "Invalid username: Potential SQL injection detected.";
                  errorMessage.style.display = "block";
              } else {
                  errorMessage.style.display = "none";
              }
          });
      });
  </script>
</body>
</html>
