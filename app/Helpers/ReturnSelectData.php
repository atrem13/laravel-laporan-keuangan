<?php

    function returnTypePatient($key = null){
        $arr = ['returnee' => 'Returnee', 'quarantined' => 'Quarantined', 'close contact' => 'Close Contact', 'infected' => 'Infected', 'suspected' => 'Suspected'];
        if ($key == null) return $arr;
        if (array_key_exists($key, $arr)) return $arr[$key];
        return "null";
    }

    function returnTestStatus($key = null){
        $arr = ['pending' => 'Pending', 'complete' => 'Complete'];
        if ($key == null) return $arr;
        if (array_key_exists($key, $arr)) return $arr[$key];
        return "null";
    }

    function returnLoginAs($key = null){
        $arr = ['patient' => 'Patient', 'tester' => 'Tester', 'tester_officer' => 'Tester Centre Officer', 'tester_manager' => 'Tester Centre Manager'];
        if ($key == null) return $arr;
        if (array_key_exists($key, $arr)) return $arr[$key];
        return "null";
    }

?>
