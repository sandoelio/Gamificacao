<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Perguntas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .img-thumbnail {
            display: block;
            margin: auto;
        }
        .navbar-brand div {
            background-color: #343a40;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .navbar-brand p {
            color: white;
            font-size: 1.25rem;
            margin: 0;
        }
        .navbar-brand span {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        /* Adicionando estilo específico para dispositivos móveis */
        @media (max-width: 576px) {
            .navbar-brand div {
                flex-direction: column;
                padding: 10px;
            }
            .navbar-brand span {
                margin-right: 0;
                margin-bottom: 5px;
            }
            .navbar-brand p {
                font-size: 1rem;
            }
            .container {
                padding: 15px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('questions.index') }}" style="text-align: center; display: block; width: 100%;">
                <div>
                    <span>🏀</span>
                    <p>Gamificação com Perguntas</p>
                </div>
            </a>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
