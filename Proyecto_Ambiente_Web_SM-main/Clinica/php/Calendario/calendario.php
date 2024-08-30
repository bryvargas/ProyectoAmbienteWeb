<?php

    require_once '../../DAL/citas.php';

    $resultado = getInfo();
    $arr = [];
    while ($row = $resultado->fetch_assoc()){
        array_push($arr, $row);
    }
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);

    ?>
