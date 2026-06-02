<?php

// data kelas dengan array 2 dimensi
$array = array(
    "1C" => array("udin", "ismail", "adi"),
    "1D" => array("lukman", "fajri", "mahmud")
);

// menampilkan data array
print_r($array);

// menampilkan kelas 1C
print_r($array['1D']);

// menampilkan kelas 1d dengan index 0
echo $array['1D'][0];

// tampilkan fajri
echo $array['1D'][1];

// tampilkan andi
echo $array['1C'][2];

// data kelas bisa ditulis juga dengan
$array_simple = [
    "1C" => ["udin", "ismail", "adi"],
    "1D" => ["lukman", "fajri", "mahmud"]
];
?>