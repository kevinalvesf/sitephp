<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gerenciar Postagens</title>
</head>
<body>

    <header>
        <h1>Gerenciar Postagens</h1>
    </header>

    <section>
        <button onclick="location.href='index.php'">Voltar para o Início</button>
    </section>

    <div class="containergerenciar">
        <section class="post-container clearfix">
            <?php
            include('configdb.php');

            // deletar uma postagem pelo ID
            function deletarPostagem($id) {
                global $mysqli;

                $sql = "DELETE FROM noticias WHERE id = $id";
                $result = $mysqli->query($sql);

                if ($result) {
                    echo "Postagem deletada com sucesso.";
                } else {
                    echo "Erro ao deletar postagem: " . $mysqli->error;
                }
            }

            // Verifica se o formulário de deletar deu bom
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deletar']) && isset($_POST['postagem_id'])) {
                $postagem_id = $_POST['postagem_id'];
                deletarPostagem($postagem_id);
            }

            
            $sql = "SELECT * FROM noticias";
            $result = $mysqli->query($sql);
            $posts = [];

            
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $posts[] = $row;
                }
            } else {
                echo "<p>Nenhuma postagem encontrada.</p>";
            }

            
            $mysqli->close();

            foreach ($posts as $post): ?>
                <div class="post">
                    <h2><?= $post['titulo'] ?></h2>
                    <p>Autor: <?= $post['autor_nome'] ?></p>
                    <p>Data de Adição: <?= $post['data_adicao'] ?></p>
                    <p><?= $post['mensagem'] ?></p>
                    <?php if (!empty($post['imagem_link'])): ?>
                        <img src="<?= $post['imagem_link'] ?>" alt="Imagem da Notícia">
                    <?php endif; ?>

                    <!--deletar a postagem -->
                    <form method="post">
                        <input type='hidden' name='postagem_id' value='<?= $post['id'] ?>'>
                        <input type='submit' name='deletar' value='Deletar'>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
    </div>

    <section>
        <button onclick="location.href='criar.php'">Criar Postagem</button>
    </section>

    <footer>
        <p>&copy; 2023 Fique Ligado</p>
    </footer>

</body>
</html>
