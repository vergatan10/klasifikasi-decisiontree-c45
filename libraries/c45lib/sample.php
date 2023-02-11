<?php
require 'vendor/autoload.php';
$c45 = new Algorithm\C45();
$c45->loadFile('example.xlsx')->setTargetAttribute('Hasil')->initialize();

echo "<pre>";
print_r ($c45->buildTree()->toString()); // print as string
echo "</pre>";

echo "<pre>";
print_r ($c45->buildTree()->toArray()); // print as array
echo "</pre>";//

?>
