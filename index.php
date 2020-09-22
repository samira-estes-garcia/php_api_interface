<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attribute Api Interface</title>
</head>
<body>
    <?php
        // $url = "example.json";
        // $data = json_decode(file_get_contents($url), true);
        // $anydata = array();
        // foreach($data as $value) {
        //     $anydata[]=$value -> anydata;
        // }
        $data = file_get_contents("example.json");
        $data = json_decode($data, true);
        //echo '<pre>'. print_r($data, true) . '</pre>'
        //echo $data["attributes"]["id"]["type"]
        //prints out all key value pairs of the json 
        // foreach($data as $item) {
        //     foreach($item as $key => $value) {
        //         echo $key.":".$value."<br>";
        //     }
        // }

        //prints out all keys and of the json in table format
        foreach($data as $item) {
            echo '<table><tr><th>Key</th><th>Type</th><th>Edit</th></tr>';
            foreach($item as $key => $value) {
                echo '<tr><td>'.$key.'</td>';
                foreach($value as $valuekey => $valuevalue)
                echo '<td>'.$valuevalue.'</td><td><button>Edit</button></td></tr>';
            }
            echo '</table>';
        }
        echo '<h1>'.$data["attributes"]["id"]["type"].'</h1>';
        $data["attributes"]["id"]["type"] = "integer";
        $updatedData = json_encode($data);
        file_put_contents('example.json', $updatedData);
    ?>
    
</body>
</html>