<?php

$current_page = "articles";
$page_title = "Articles";

if( ! function_exists( "get_articles" ) )
{
    function get_articles( String $path_to_articles, &$articles, $root_path_to_articles )
    {
        $dir_items = scandir( $path_to_articles );

        foreach( $dir_items as $dir_item )
        {
            if( $dir_item == "." || $dir_item == ".." )
                continue;
            
            $path_to_dir_item = $path_to_articles . DIRECTORY_SEPARATOR . $dir_item;

            if( is_dir( $path_to_dir_item ) )
            {
                get_articles( $path_to_dir_item, $articles, $root_path_to_articles );
                continue;
            }

            if( ! is_file( $path_to_dir_item ) || substr( $dir_item, -4 ) != ".php" )
                continue;
            
            include $path_to_dir_item;

            if( ! isset( $article_title, $article_description, $article_author ) )
                continue;
            
            $article['title'] = $article_title;
            $article['description'] = $article_description;
            $article['author'] = $article_author;
            $article['permalink'] = "/articles/" . str_replace( array( "\\", ".php" ), "/", substr( $path_to_dir_item, strlen( $root_path_to_articles ) + 1 ) );

            $articles[] = $article;
        }
    }
}

$page_content = function()
{
    $root_path_to_articles = __DIR__ . DIRECTORY_SEPARATOR . "articles";

    $articles = array();
    
    get_articles( $root_path_to_articles, $articles, $root_path_to_articles );

    $articles = array_reverse( $articles );
?>

<h2><b>All Articles</b></h2>

<section class="blog-entries">
    <?php if( isset( $articles ) && is_array( $articles ) && count( $articles ) > 0 ): ?>
        <?php foreach( $articles as $article ): ?>
            <article>
                <h3 class="title"><a href="<?php echo $article['permalink']; ?>"><?php echo $article['title']; ?></a></h3>
                <p class="metadata">Published by <?php echo $article['author']; ?>.</p>
                <p class="description"><?php echo $article['description']; ?></p>
                <p class="buttons">
                    <a href="<?php echo $article['permalink']; ?>">Read More</a>
                </p>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No knowledgebase articles yet. Please check back later.</p>
    <?php endif; ?>
</section>

<p>Also available in <a href="/api/articles.json" target="_blank">JSON format</a>.</p>

<?php
};

if( isset( $path_to_input_file ) && basename( $path_to_input_file ) == basename( __FILE__ ) )
    include __DIR__ . DIRECTORY_SEPARATOR . "_includes" . DIRECTORY_SEPARATOR . "base.php";
