<?php
/**
 * Created by PhpStorm.
 * User: jesse
 * Date: 6/21/15
 * Time: 5:33 PM
 */

//get json file to update and decode
$getJson = json_decode(file_get_contents('data.json'));
//look at only objects in sales
$allProducts = $getJson->sales;
//pa($getJson->sales);
//loop through all products
for($i=0; $i<count($allProducts); $i++){
    $allProducts[$i]->removed = 0;
}

pa($getJson);

//Encode the array back into a JSON string.
$backToJson = json_encode($getJson);

//Save the file.
file_put_contents('data.json', $backToJson);