<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
  <head>
	<meta name="content-type" http-equiv="content-type" value="text/html; utf-8"/>
    <link rel="stylesheet" type="text/css" href="/markdown-handler/md-styles.css"/>
	<title>Markdown output</title>
  </head>
  <body>
<?php

require('markdown.php');
require('smartypants.php');

$legalExtensions = array('md', 'markdown');

$file = realpath($_SERVER['PATH_TRANSLATED']);
if($file &&
   in_array(strtolower(substr($file, strrpos($file, '.') + 1)),
	    $legalExtensions)) {
  echo SmartyPants(Markdown(file_get_contents($file)));
}
else {
  echo "<p>Bad filename given</p>";
}
?>
  </body>
</html>
