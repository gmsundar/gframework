<?php
// input is in format: data:image/png;base64,...
$im = imagecreatefrompng($post['image']);
$folder="camera/".$get['table']."/".$get['column']."/";
$filename=$folder.str_replace(array(" ","."),"",microtime()).".png";
//mkdir($folder,777,true);
imagepng($im,AppUploadsURL.$filename);
echo $filename;
exit;
?>