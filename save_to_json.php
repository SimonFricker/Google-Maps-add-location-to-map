<?php

if (isset($_POST['lat']) && isset($_POST['lng'])) {
    //$params = array('lat' => $_POST['lat'], 'lng' => $_POST['lng']);
    $params = array('lat' => (float)$_POST['lat'], 'lng' => (float)$_POST['lng']);

    $json = @file_get_contents('my_json_data.json');
    if(empty($json)){
        $jsonObject = json_encode(array('votes' => [$params]));
        file_put_contents('my_json_data.json', $jsonObject);
    }else{
        $json = json_decode($json, true);
        $json['votes'][] = $params;
        file_put_contents('my_json_data.json', json_encode($json));
    }
}
else {
    echo "Noooooooob";
}
?>
