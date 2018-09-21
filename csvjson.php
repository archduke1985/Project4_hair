<?php
// file_put_contents(XOOPS_ROOT_PATH . '/uploads/contact.html', $html);
$file="http://www.tpex.org.tw/web/gold/lateststats/new_dl.php";
// $csv= file_get_contents($file);
// $array = array_map("str_getcsv", explode("\n", $csv));
// $json = json_encode($array);
// print_r($json);


function csvtojson($file,$delimiter)
{
    if (($handle = fopen($file, "r")) === false)
    {
            die("can't open the file.");
    }

    $csv_headers = fgetcsv($handle, 4000, $delimiter);
    $csv_json = array();

    while ($row = fgetcsv($handle, 4000, $delimiter))
    {
            $csv_json[] = array_combine($csv_headers, $row);
    }

    fclose($handle);
    return json_encode($csv_json, JSON_UNESCAPED_UNICODE);
}


$jsonresult = csvtojson($file, ",");

echo $jsonresult;
?>