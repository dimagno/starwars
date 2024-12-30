<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Meu Projeto MVC' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark text-white p-3">
        <div class="container">
            <h1>StarWars</h1>
            <nav>
                <a href="/" class="text-white">Home</a> |
                <a href="/sobre" class="text-white">Sobre</a>
            </nav>
        </div>
    </header>
    <main class="container mt-4">
        <?= $conteudo; ?>
    </main>
    <footer class="bg-light text-center py-3">
        <p>&copy; Star Wars </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
