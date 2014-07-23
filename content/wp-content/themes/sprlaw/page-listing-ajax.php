<?php
  /*
  *
  * Template Name: Page - Listing / AJAX
  *
  */

$url = parse_url($_SERVER["REQUEST_URI"]);
$url = str_replace('/', '', $url['path']);

include('partials/content-' . $url . '-list.php');

?>