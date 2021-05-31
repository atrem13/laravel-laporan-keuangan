<?php
    function responseApi($status, $data, $msg){
        return response()->json([
            'status' => $status,
            'data' => $data,
            'msg' => $msg
        ]);
    }
?>
