<?php
//checks whether a post has already commented on by pusheen
include "token.php";
function userExists($phpArray2){
$key = 0;
while ($key < 23){
$refid = $phpArray->Activities[$key]->RefID;
$type = $phpArray->Activities[$key]->Type;
$comment = $phpArray->Activities[$key]->Comment;
$rurl="https://ws.anomo.com/v210/index.php/webservice/activity/detail/" . $token . "/" . $refid . "/" . $type;
$refData = file_get_contents($rurl);
$refArray = json_decode($refData);
//print $rurl . "<br>";
//print_r($refData);
//print "<br><br><br>";
$ckey = 0;
while ($ckey < $comment){
//print $content;
$username = $refArray->Activity->ListComment[$ckey]->UserName;
if ($username == "Pusheen"){
return true;
}
$ckey++;

}
$key++;
}
}
?>