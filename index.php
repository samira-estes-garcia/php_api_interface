<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Attribute Api Interface</title>
</head>
<body>

    <?php

     //gets content from input url
     $url = "example.json";
     $data = file_get_contents($url);
     $data = json_decode($data,true);
     //print out all data 
     //echo '<pre>'. print_r($data, true) . '</pre>';

     ?>

    <form>
        <label>Key: </label>
        <input type="text" name="key-output" id="key-output" readonly/><br><br>
        <label>Data Type: </label>
        <input type="text" name="data-type" id="data-type-output" /></br><br>
        <input onclick="save()" type="submit" value="Submit"/>
    </form>

    <table id="table">
        <tr>
            <th>Row Number</th>
            <th>Key</th>
            <th>Data Type</th>
        </tr>

    <?php
    //create table with row numbers, headers, and data
        $rownumber = 0;
    //prints out all keys and of the json in table format
        foreach($data as $item) {
            foreach($item as $key => $value) {
                $rownumber ++;
                echo '<tr>
                <td>'.$rownumber.'</td>
                <td data-id="'.$rownumber.'">'.$key.'</td>';
                foreach($value as $valuekey => $datatype) {
                    if(is_array($datatype)) {
                        foreach($datatype as $datavalue) {
                            //echo $datavalue;
                            $select = '<option>'.$datavalue.'</option>';
                            // echo $select;
                            $valuetd = '<td id="type-value" data-id="'.$rownumber.'"><select>'.$select.'</select></td>';
                        }
                        // $valuetd = '<td id="type-value" data-id="'.$rownumber.'"><select>'.$select.'</select></td>';
                        } else {
                        $valuetd = '<td id="type-value" data-id="'.$rownumber.'">'.$datatype.'</td>';
                    }
                }
            echo $valuetd.
                '</tr>';
        }
    }
    ?>

    </table>
    
    
</body>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="index.js"></script>  
</body>
</html>