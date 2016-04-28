<!DOCTYPE html>
<html lang="fr-CH">

<head>

<meta charset="utf-8" />

<meta name="author"      content="Christophe Biolley; Daniel Meilland" />
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords"    content="<?php echo $keywords; ?>" />
<meta name="generator"   content="CodeIgniter <?php echo CI_VERSION; ?>" />

<?php
if ($refresh) //S'il faut afficher meta refresh
{
	echo '<meta http-equiv="refresh" content="1; ' . site_url() . "\" />\n\n";
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- jQuery, nécessaire à Bootstrap -->
<script
  src         = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"
  integrity   = "sha512-WV1qJjwco1X+rI/ySPPxa0Abco3mbckW7qEEyoio9013SNL8hEuqWKqPpP2uC8dwroyG7gIeZ3xBbuY3KIbRFg=="
  crossorigin = "anonymous"
></script>

<!-- Bootstrap -->
<link
  rel         = "stylesheet"
  href        = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
  integrity   = "sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
  crossorigin = "anonymous"
/>

<script
  src         = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
  integrity   = "sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A=="
  crossorigin = "anonymous"
></script>

<!-- CSS supplémentaire pour la marge de la page -->
<style>
  html {
      margin: 7px;
  }
  
  form {
	  max-width: 222px;
  }
</style>

<title><?php echo $title; ?></title>

</head>

<body>

<header>

<h1><?php echo $title; ?></h1>

</header>

<main>

