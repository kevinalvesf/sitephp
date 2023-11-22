<?php
include_once('configdb.php');

$sql = "SELECT * FROM noticias";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>Autor: " . $row['autor_nome'] . "</p>";
        echo "<p>Data da noticia: " . $row['data_adicao'] . "</p>";
        echo "<p>" . $row['mensagem'] . "</p>";
        if (!empty($row['imagem_link'])) {
            echo "<img src='" . $row['imagem_link'] . "' alt='Imagem da Notícia'>";
        }
        echo "</div>";
    }
} else {
    echo "Nenhuma notícia encontrada.";
}

$mysqli->close();
?>