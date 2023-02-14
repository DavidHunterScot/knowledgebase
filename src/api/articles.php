<?php

if( ! isset( $path_to_output_file ) )
    exit;

$custom_output_path = substr( $path_to_output_file, 0, -5 ) . ".json";

include __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "index.php";

$path_to_articles_dir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "articles";

$articles = array();

get_articles( $path_to_articles_dir, $articles, $path_to_articles_dir );

$articles = array_reverse( $articles );
$articles_json = json_encode( $articles );

echo $articles_json;
