<?php
include_once('configdb.php');

$noticiasPorPagina = 2;

$totalNoticias = $mysqli->query("SELECT COUNT(*) as total FROM noticias")->fetch_assoc()['total'];

$totalPaginas = ceil($totalNoticias / $noticiasPorPagina);

$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$offset = ($paginaAtual - 1) * $noticiasPorPagina;

$sql = "SELECT * FROM noticias LIMIT $noticiasPorPagina OFFSET $offset";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="post-container clearfix">';
    while ($row = $result->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>Autor: " . $row['autor_nome'] . "</p>";
        echo "<p>Data da notícia: " . $row['data_adicao'] . "</p>";
        echo "<p>" . $row['mensagem'] . "</p>";
        if (!empty($row['imagem_link'])) {
            echo "<img class='post-image' src='" . $row['imagem_link'] . "' alt='Imagem da Notícia'>";
        }
        echo "</div>";
    }
    echo '</div>';

    echo '<div class="pagination">';
    
    if ($paginaAtual > 1) {
        
        echo "<a href='?pagina=1'>Início</a> ";
    }

    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<a href='?pagina=$i'>$i</a> ";
    }
    echo '</div>';
} else {
    echo "<p class='semnoticia semnoticiaa'>Nenhuma notícia encontrada.</p>";
}

$mysqli->close();
?>
