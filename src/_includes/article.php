<?php

$current_page = "articles";
$page_title = $article_title . " - Articles";

include __DIR__ . DIRECTORY_SEPARATOR . "config.php";

$page_content = function( String $article_title, String $article_author, callable $article_content )
{
    include __DIR__ . DIRECTORY_SEPARATOR . "config.php";
?>

<article>
    <h2><b><?php echo $article_title; ?></b></h2>
    <p><b>Written By</b><br><?php echo $article_author; ?></p>

    <hr class="w3-border-black">

    <?php $article_content(); ?>
</article>

<?php
};

include __DIR__ . DIRECTORY_SEPARATOR . "base.php";
