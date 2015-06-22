<?php
/**
 * Created by PhpStorm.
 * User: jesse
 * Date: 6/21/15
 * Time: 5:33 PM
 *
 * This file is only used once to add the removed attribute to all products rather than having to edit the json file manually
 * This should not be run unless you want to reset the removed attribute for ALL products
 */

//get json file to update and decode
$getJson = json_decode(file_get_contents('data.json'));
//look at only objects in sales
$allProducts = $getJson->sales;
//pa($getJson->sales);
//loop through all products
for($i=0; $i<count($allProducts); $i++){
    $allProducts[$i]->removed = 0;
    pa($allProducts[$i]);
}



//Encode the array back into a JSON string.
$backToJson = json_encode($getJson);

//Save the file.
file_put_contents('data.json', $backToJson);

//debugging print array/object
function pa($array, $title = 'Print Out', $die = false, $backtrace_full = false, $special_chars = false, $display_none = false) {
    if ($display_none != false) {
        $display_none = ' style="display: none"';
    }
    $return = '<div ' . $display_none . '><pre>' . $title . '<br />';
    $bt = debug_backtrace();
    if ($backtrace_full) {
        $return.= print_r($bt, true);
    } else {
        $return.= "Calling file: " . $bt[0]['file'] . ' line  ' . $bt[0]['line'] . '<br />';
    }

    $return.= print_r($array, true);
    if ($special_chars == true) {
        $return = htmlspecialchars($return);
    }
    $return.= '</pre><br /><br /></div>';
    echo $return;

    if ($die) {
        die();
    }
}