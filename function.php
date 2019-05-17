<?php
function keyboard($tasti, $text, $cd){
$tasti2 = $tasti;

$tasti3 = json_encode($tasti2);

    if(strpos($text, "\n")){
        $text = urlencode($text);
    }   
>
