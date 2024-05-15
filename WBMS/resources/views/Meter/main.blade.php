<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Page</title>
        <style>
            body.main {
                background-color: #f5f5f5;
                margin: 0;
                margin-top: 20vh;
                padding: 20px;
                font-family: Arial, sans-serif;
                text-align: center;
                color: #333;
            }

            .p {
                background-color: #ffffff;
                color: rgb(41, 32, 32);
                padding: 25px;
                margin: 15px auto;
                border-radius: 5px;
                width: 80%;
                max-width: 300px;
                font-size: 1.4em;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s ease;
                text-align: center;
                text-decoration: none;
            }

            .p:hover {
                background-color: #0056b3;
            }
            a{
                text-decoration: none;
            }

            /* Media Query for smaller devices */
            @media screen and (max-width: 600px) {
                body.main {
                    padding: 10px;
                }

                .p {
                    width: 90%;
                    font-size: 1em;
                    padding: 12px;
                }
            }
        </style>
    </head>
    <body class="main">
        <a href="{{route('Calculatebill')}}"><p class="p">Calculate Bill</p></a>
        <a href="{{route('BillHistory')}}"><p class="p">Bill History</p></a>
        <a href="{{route('PayHistory')}}"><p class="p">Payment History</p></a>
        <a href="{{route('Pricing')}}"><p class="p">Pricing System</p></a>
    </body>
</html>
