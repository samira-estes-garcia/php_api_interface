<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Attribute Api Interface</title>
</head>
<body>
    <br>
    <?php
        //gets content from input url
        $url = "example.json";
        $data = file_get_contents($url);
        $data = json_decode($data,true);
        //print out all data 
        echo '<pre>'. print_r($data, true) . '</pre>';

        //create table with row numbers, headers, and data
        $rownumber = 0;
        //prints out all keys and of the json in table format
        foreach($data as $item) {
            echo '<table>
                    <tr>
                        <th>Row Number</th>
                        <th>Key</th>
                        <th>Type</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>';
            foreach($item as $key => $value) {
                $rownumber ++;
                echo '<tr>
                        <td>'.$rownumber.'</td>
                        <td data-id="'.$rownumber.'">'.$key.'</td>';
                foreach($value as $valuekey => $typevalue) {
                    if ($typevalue == "select") {
                        $valuetd = '<td class="type-value" data-id="'.$rownumber.'">
                                        <select>
                                            <optgroup label="options">
                                            <option>'.$data["attributes"]["account"]["options"][0].'</option>
                                            <option>'.$data["attributes"]["account"]["options"][1].'</option>
                                            <option>'.$data["attributes"]["account"]["options"][2].'</option>
                                            </optgroup>
                                        </select>
                                    </td>';
                    } else {
                        $valuetd = '<td class="type-value" data-id="'.$rownumber.'">'.$typevalue.'</td>';
                    }
                    echo $valuetd.
                    '<td><button class="update-button" data-id="'.$rownumber.'">Update</button></td>
                     <td><button id="delete-button" data-id="'.$rownumber.'">Delete</button></td>
                     </tr>';
                }
            }
            echo '</table>';
        }

        //ajax request to php to update new content in the file
        // echo '<h1>'.$data["attributes"]["id"]["type"].'</h1>';
        // $data["attributes"]["id"]["type"] = "integer";
        // $updatedData = json_encode($data);
        // file_put_contents('example.json', $updatedData);
    ?>

<script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script src="index.js"></script>  
</body>
</html>