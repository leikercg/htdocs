<?php
    include('articles.php');       // En este archivo estará el modelo
    $articles = Article::getAll();  // Este método del modelo nos devuelve la lista de artículos
    include('showAllArticles.php');   // En este archivo estará la vista
?>