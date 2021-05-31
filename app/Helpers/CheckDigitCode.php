<?php
    function generateDigit($id){
        return ($id < 10) ? '00'.$id : ($id < 100 ? '0'.$id : $id);
    }
?>
