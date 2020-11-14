<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        .container {
            max-width: 945px;
            margin: auto;
        }


        .contact__header {
            background-color: #F57C00;
            display: flex;
            justify-content: center;
            color: #fff;
        }

        .contact__credit {
            border-bottom: 1px solid lightgrey;
        }

    </style>
    <title>Graduate</title>
</head>

<body>
    <section>
        <div class="container">
            <header class="contact__header">
                <h1>New message from Graduate!</h1>
            </header>
            <div class="contact__credit">
                <h3>From: {{$email}}</h3>
            </div>
            <div class="contact__credit">
                <h3>Name: {{$name}}</h3>
            </div>
            <div class="contact__credit">
                <h3>Message: </h3>
                <p>
                    {{$text}}
                </p>
            </div>
        </div>
    </section>
</body>

</html>