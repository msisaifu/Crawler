<?php
include 'getData.php';
error_reporting(0);

	$content=  getData('http://www.prothom-alo.com/');
	$slice=explode('link_overlay',$content);
	$k=count($slice);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prothom Alo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center"><img src="//paimages.prothom-alo.com/contents/themes/public/style/images/Prothom-Alo.png" alt=""></h2>
        <div class="row">
<?php	for ($i=1;$i<$k;$i++){
    $slice1=explode('href',$slice[$i]);
    $slice3= str_replace('="','',$slice1[1]);
    $slice4= str_replace('"></a>','',$slice3);
    $slice5=explode('<!--image-->',$slice4);

    $title_explode=explode('<span class="title">',$slice1[1]);
    $title=explode('</span>',$title_explode[1]);

    $img=explode('<img src="',$slice1[1]);
    $img_slice=explode('</noscript>',$img[1]);
    $img_path=str_replace('" />','',$img_slice[0]);
?>
            <div class="col-3" style="margin: 1em">
                <img src="<?php echo $img_path?>" alt="">
                <a href="http://www.prothom-alo.com<?php echo $slice5[0]?>"><?php echo $title[0]?></a>
            </div>
    <?php } ?>

        </div>
    </div>

</body>
</html>


