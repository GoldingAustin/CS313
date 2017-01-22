<?php
$json = file_get_contents('results.json');
$jsonTemp = json_decode($json, true);
$jsonTemp['results']['0'][$_POST['likeMovie']] += 1;
$jsonTemp['results']['1'][$_POST['dislikeMovie']] += 1;
$jsonTemp['results']['2'][$_POST['character']] += 1;
$jsonTemp['results']['3'][$_POST['era']] += 1;
$jsonTemp['results']['4'][$_POST['sand']] += 1;
$jsonTemp['results']['total'] += 1;
$json = json_encode($jsonTemp);

if (json_decode($json) != null)
{
    $file = fopen('results.json','w');
    fwrite($file, $json);
    fclose($file);
}
else
{
}


header("Location: results.php");
exit();
?>


