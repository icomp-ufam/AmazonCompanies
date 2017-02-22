<?php
 
$data = str_replace(' ', '+', $_POST['bin_data']);
$data = base64_decode($data);
//$fileName = date('ymdhis').'.png';
$fileName = 'salvou.png';
$im = imagecreatefromstring($data);
 
if ($im !== false) {
    // Save image in the specified location
    imagepng($im, $fileName);
    imagedestroy($im);
    echo "Saved successfully";
}
else {
    echo 'An error occurred.';
}

?>