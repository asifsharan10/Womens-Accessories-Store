<?php

$configFilePath = __DIR__ . DIRECTORY_SEPARATOR  . 'site-info.php';

if (file_exists($configFilePath)) {
    require_once $configFilePath;
}
else {
    echo 'General configuration error';
}

error_reporting(0);

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    return http_response_code(403);
}


if($_POST['action'] == 'import_order') {
    $response = import_order($_POST['data']);
    echo json_encode($response);
}





