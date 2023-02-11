<?php
defined('BASEPATH') or exit('No direct script access allowed');
class NaiveBayes_Model extends CI_Model
{
  var $reslabel = array();
  var $resall = array();
  var $data = array();
  var $predict = array();
  public function init($data = NULL, $predict = NULL)
  {
    $this->reset();
    $this->data = $data;
    $this->predict = $predict;
  }
  public function reset()
  {
    $this->reslabel = array();
    $this->resall = array();
    $this->reslabel = array();
    $this->data = array();
    $this->predict = array();
  }
  public function predict()
  {
    /*Bagian 1*/
    $this->resultlabel($this->data);
    for ($x = 0; $x < sizeof($this->predict); $x++) {
      $this->resall[] = $this->resultatribute($x, $this->predict[$x], $this->data);
    }
    /*Bagian 2*/
    $result = array();
    foreach ($this->reslabel as $key => $value) {
      if ($key != 'Total') {
        $result[$key] = $value / $this->reslabel['Total'];
      }
    }
    /*Bagian 3*/
    foreach ($this->resall as $key => $value) {
      foreach ($value as $keys => $values) {
        foreach ($this->reslabel as $keyn => $valuen) {
          if ($keyn != 'Total') {
            $result[$keyn] *= $values[$keyn] / $this->reslabel[$keyn];
          }
        }
      }
    }
    return $result;
  }
  function label_composition($data, $predict)
  {
    $index = sizeof($predict);
    $label = array_column($data, $index);
    $label_unique = array_unique($label);
    $result = array();
    foreach ($label_unique as $lu) {
      $result[$lu] = 0;
    }
    foreach ($label as $l) {
      foreach ($label_unique as $lu) {
        if ($lu == $l) {
          $result[$lu]++;
        }
      }
    }
    return $result;
  }
  function conf_matrix($data, $predict)
  {
    $index = sizeof($predict);
    $label = array_column($data, $index);
    $label_unique = array_unique($label);
    $result = array();
    $result_all = array();
    for ($x = 0; $x < $index; $x++) {
      $attribute = array_column($data, $x);
      $attribute_unique = array_unique($attribute);
      $result = array();
      foreach ($attribute_unique as $au) {
        foreach ($label_unique as $lu) {
          $result[$au][$lu] = 0;
        }
      }
      foreach ($label_unique as $lu) {
        for ($n = 0; $n < sizeof($attribute); $n++) {
          if ($label[$n] == $lu) {
            $result[$attribute[$n]][$lu]++;
          }
        }
      }
      array_push($result_all, $result);
    }
    return $result_all;
  }
  private function resultatribute($index, $atribute, $data)
  {
    $result = array();
    foreach ($this->reslabel as $keys => $value) {
      if ($keys != 'Total') {
        $result[$atribute][$keys] = 0;
      }
    }
    foreach ($data as $key) {
      if ($key[$index] == $atribute) {
        $result[$atribute][$key[sizeof($key) - 1]]++;
      }
    }
    return $result;
  }
  private function resultlabel($data)
  {
    $temp = array();
    foreach ($data as $key) {
      $temp[] = $key[sizeof($key) - 1];
    }
    $uniq = array_unique($temp);
    $resultlabel = array();
    foreach ($uniq as $key) {
      $resultlabel[$key] = 0;
    }
    foreach ($temp as $key) {
      $resultlabel[$key]++;
    }
    $resultlabel['Total'] = sizeof($data);
    $this->reslabel = $resultlabel;
  }
}
