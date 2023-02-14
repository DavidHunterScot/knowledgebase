<?php include __DIR__ . DIRECTORY_SEPARATOR . 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php if( isset( $page_title ) && $page_title ) echo $page_title . ' - '; ?><?php echo $site_title; ?><?php if( ! isset( $page_title ) || ! $page_title ) echo ' - ' . $site_tagline; ?></title>

        <link rel="stylesheet" type="text/css" href="/assets/w3css/4.15/w3.css">
        <link rel="stylesheet" type="text/css" href="/assets/webfonts/poppins/poppins.css">

        <style>
            h1, h2, h3, h4, h5, h6, p { font-family: "Poppins", sans-serif; }
        </style>
    </head>
    
    <body class="w3-white">
        <header>
            <div class="w3-auto w3-padding">
                <h1 class="w3-xlarge"><b><?php echo $site_title; ?></b></h1>
                <p class="w3-small"><i><?php echo $site_tagline; ?></i></p>

                <nav class="w3-bar w3-stretch">
                    <a href="/" class="w3-bar-item w3-button w3-hover-none w3-hover-text-indigo"><b>Home</b></a>
                </nav>
            </div>
        </header>

        <main class="w3-light-gray">
            <div class="w3-auto w3-padding">

                <?php
                if( isset( $page_content ) && is_callable( $page_content ) )
                {
                    if( isset( $article_title, $article_author, $article_content ) && is_string( $article_title ) && is_string( $article_author ) && is_callable( $article_content ) )
                    {
                        $page_content( $article_title, $article_author, $article_content );
                    }
                    else
                    {
                        $page_content();
                    }
                }
                ?>
            
            </div>
        </main>

        <footer>
            <div class="w3-auto w3-padding">
                <p class="w3-tiny">Copyright &copy; <a href="<?php echo $site_author_url; ?>" target="_blank"><?php echo $site_author; ?></a>. Built and deployed from <a href="https://github.com/DavidHunterScot/knowledgebase" target="_blank">Source Code on GitHub</a>.</p>
            </div>
        </footer>
    </body>
</html>