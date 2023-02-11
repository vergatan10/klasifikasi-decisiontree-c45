<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Global_Model extends CI_Model
{
  function cleansing($data)
  {
    foreach ($data as $key => $value) {
      foreach ($value as $keys => $val) {
        if ($val == "") {
          unset($data[$key][$keys]);
        }
      }
    }
    return $data;
  }

  function mapping($data)
  {
    $temp = array();
    $index = $data[0];
    for ($x = 1; $x < sizeof($data); $x++) {
      $temp2 = array();
      foreach ($index as $ind => $val) {
        $temp2[$val] = $data[$x][$ind];
      }
      $temp[] = $temp2;
    }
    return $temp;
  }
}
