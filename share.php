<?php
$shareid = $_GET['p'];

libxml_use_internal_errors(true);
$c = file_get_contents("http://instagr.am/p/$shareid/");
$d = new DomDocument();
$d->loadHTML($c);
$xp = new domxpath($d);
foreach ($xp->query("//meta[@property='og:title']") as $el) {
    $title = $el->getAttribute("content");
}
foreach ($xp->query("//meta[@property='og:description']") as $el) {
    $description = $el->getAttribute("content");
}
foreach ($xp->query("//meta[@property='og:image']") as $el) {
    $image = $el->getAttribute("content");
}
foreach ($xp->query("//meta[@property='og:url']") as $el) {
    $url = $el->getAttribute("content");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="twitter:card" content="photo">
  <meta name="twitter:site" value="@instagrat13">
  <meta name="twitter:url" content="<?php echo $url ?>">
  <meta name="twitter:title" content="<?php echo $title ?>">
  <meta name="twitter:description" content="<?php echo $description ?>">
  <meta name="twitter:image" content="<?php echo $image ?>">
  <meta name="twitter:image:width" content="610">
  <meta name="twitter:image:height" content="610">
  <meta name="description" content="" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--[if lt IE 8]>
  <![endif]-->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

<script>
if($(window).height() > 100)
{
	window.location = "<?php echo $url ?>"
}
</script>

</body>
</html>
