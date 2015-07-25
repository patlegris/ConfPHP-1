<!doctype html>
<html>
<head>
    @include('mail.includes.head')
    <style>
        body {
            background: #ecf0f1;
        }

        header {
            background-image: linear-gradient(to bottom, #2980b9 0, #3498db 100%);
            text-align: center;
        }

        header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
            padding: 30px 0 0 0;
            text-shadow: 0 0 30px #fff;
        }

        header h1 a {
            color: #275181;
            text-decoration: none;
            transition: color .5s ease, text-shadow .5s ease
        }

        header h3 {
            color: #275181;
            margin: 0;
            padding: 0 0 30px 0;
        }

        blockquote {
            background: #fff;
            border: 1px solid #c3c7c8;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include('mail.includes.header')

    <p>
        Vous avez reçu un message de {{ '<' }}<strong>{{ $email }}</strong>{{ '>' }} :
    </p>

    <blockquote>
        <em>{{ $content }}</em>
    </blockquote>
</body>
</html>