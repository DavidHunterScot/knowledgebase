<?php

$article_title = "Name Servers";
$article_description = "Learn about Name Servers and find out what ones you need for the web hosting service.";
$article_author = "David Hunter";

$article_content = function()
{
    include __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "_includes" . DIRECTORY_SEPARATOR . "config.php";
?>

<p>Learn about Name Servers and find out what ones you need for the web hosting service.</p>

<h3>What are Name Servers?</h3>

<p>Name Servers, also commonly referred to as DNS servers, hold the DNS records that make your domain work. They are also responsible for converting the human readable web address, such as <code>www.yourwebsite.com</code> into its corresponding IP address such as <code>123.123.123.123</code>.</p>

<h3>What Name Servers do I need to set on my domain to use the web hosting service?</h3>

<p>You don't actually need to change the name servers on your domain if you already have DNS records hosted elsewhere, simply change the relevant DNS records you need.</p>

<p>If you do wish to change them and have your DNS records hosted as part of the service, then set them to the following.</p>

<ul>
    <li><code>ns1.cloudhosting.co.uk</code> OR <code>ns1.cloudhosting.uk</code></li>
    <li><code>ns2.cloudhosting.co.uk</code> OR <code>ns2.cloudhosting.uk</code></li>
</ul>

<p>The exact instructions on how to do this vary depending on your Domain Name Registrar, however, usually you would find the part related to the domain in question called Name Servers or DNS Servers, and set them to the above ones. Make sure you remove any that were there beforehand.</p>
<p>Should you need any help with this, feel free to get in touch and help will be provided.</p>

<?php
};

if( isset( $path_to_input_file ) && basename( $path_to_input_file ) == basename( __FILE__ ) )
    include __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "_includes" . DIRECTORY_SEPARATOR . "article.php";
