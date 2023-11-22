<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Site de Notícias</title>
</head>
<body>

    <header>
        <h1>Notícias Importantes</h1>
    </header>

    <section>
        <button onclick="location.href='gerenciar.php'">Gerenciar</button>
    </section>

    <section class="post-container clearfix">
        <?php include('exibir.php'); ?>
    </section>

    <footer>
        <p>&copy; 2023 Site de Notícias</p>
    </footer>

</body>
</html>
