<?php

    require 'Console/Table.php';
    
    $tbl = new Console_Table();
    $tbl->setHeaders(array('ID', 'Item Number', "BarCode", "Product Name","Price"));
    $id = array();
    $item = array();
    $bar = array();
    $product = array();
    $price = array();
    
    $file = fopen("products.csv","r");
    while (($row = fgetcsv($file, 0, ",")) !== FALSE) {    
        $row++;
        array_push($id,$row[0] . "\n");
        array_push($item,$row[1] . "\n");
        array_push($bar,$row[2] . "\n");
        array_push($product,$row[3] . "\n");
        array_push($price,$row[4] . "\n");
    }

    $tbl->addRow(array($id[1],$item[1],$bar[1],$product[1],$price[1]));
    $tbl->addRow(array($id[2],$item[2],$bar[2],$product[2],$price[2]));
    $tbl->addRow(array($id[3],$item[3],$bar[3],$product[3],$price[3]));
    $tbl->addRow(array($id[4],$item[4],$bar[4],$product[4],$price[4]));
    error_reporting(0);
    echo $tbl->getTable();


?>