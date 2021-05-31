<?php
    function split($arr){
        return explode(' ', $arr);
    }

    function generateCode($arr){
        $text = '';
        foreach($arr as $i){
            $text .= $i[0];
        }
        return $text;
    }
?>
