<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header">
                </div> -->
            <div class="card-body">
                <h4>Klasifikasi C45</h4>
                <hr>
                <?php if ($spreadsheet != NULL) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="" id="performance">
                                <div class="form-group">
                                    <label id="lab">Persentase Data Training <?= $this->input->post('train') !== NULL ? $this->input->post('train') . '%, Data Testing ' . (100 - $this->input->post('train')) . '%' : '' ?></label>
                                    <select name="train" required="" onchange="if($(event.target).val()!=''){$('#lab').html('Prosentase Data Training '+$(event.target).val()+'%, Data Testing '+(100-$(event.target).val())+'%');$('#performance').submit();}else{$('#lab').html('Prosentase Data Training');}" class="form-control">
                                        <option value="">-- Pilih Persentase --</option>
                                        <option value="10" <?= $this->input->post('train') == 10 ? 'selected' : '' ?>>10 %</option>
                                        <option value="20" <?= $this->input->post('train') == 20 ? 'selected' : '' ?>>20 %</option>
                                        <option value="30" <?= $this->input->post('train') == 30 ? 'selected' : '' ?>>30 %</option>
                                        <option value="40" <?= $this->input->post('train') == 40 ? 'selected' : '' ?>>40 %</option>
                                        <option value="50" <?= $this->input->post('train') == 50 ? 'selected' : '' ?>>50 %</option>
                                        <option value="60" <?= $this->input->post('train') == 60 ? 'selected' : '' ?>>60 %</option>
                                        <option value="70" <?= $this->input->post('train') == 70 ? 'selected' : '' ?>>70 %</option>
                                        <option value="80" <?= $this->input->post('train') == 80 ? 'selected' : '' ?>>80 %</option>
                                        <option value="90" <?= $this->input->post('train') == 90 ? 'selected' : '' ?>>90 %</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php if ($this->input->post('train') !== NULL) { ?>
                                    <label id="lab">Hasil Performance</label>
                                    <?php
                                    $tp = 0;
                                    $tn = 0;
                                    $fp = 0;
                                    $fn = 0;
                                    $kamus_label = $this->input->post('labelkamus');
                                    $train = $this->input->post('train');
                                    $countdata = sizeof($dataset);
                                    $ndatatrain = ($train / 100) * $countdata;
                                    $ndatatrain = floor($ndatatrain);
                                    $newtraindata = [];
                                    $newtesdata = [];
                                    $x = 0;
                                    $flagtesting = 0;
                                    foreach ($dataset as $key) {
                                        $x++;
                                        //masukan ke data training
                                        if ($ndatatrain >= $x) {
                                            $newtraindata_temp = [];
                                            foreach ($index as $keys) {
                                                $newtraindata_temp[$keys] = $key[$keys];
                                            }
                                            $newtraindata[] = $newtraindata_temp;
                                        } else {
                                            //masukan ke data testing
                                            $newtesdata_temp = [];
                                            foreach ($index as $keys) {
                                                $newtesdata_temp[$keys] = $key[$keys];
                                            }
                                            $newtesdata[] = $newtesdata_temp;
                                        }
                                    }
                                    $spreadsheet = new Spreadsheet();
                                    $sheet = $spreadsheet->getActiveSheet();
                                    $j = 1;
                                    foreach ($index as $key) {
                                        $sheet->setCellValueByColumnAndRow($j, 1, $key);
                                        $j = $j + 1;
                                    }
                                    for ($i = 0; $i < count($newtraindata); $i++) {
                                        $row = $newtraindata[$i];
                                        $j = 1;
                                        foreach ($row as $x => $x_value) {
                                            $sheet->setCellValueByColumnAndRow($j, $i + 2, $x_value);
                                            $j = $j + 1;
                                        }
                                    }
                                    $writer = new Xlsx($spreadsheet);
                                    $writer->save('./assets/uploads/data-training.xlsx');

                                    $c45 = new Algorithm\C45();
                                    if (file_exists("./assets/uploads/data-training.xlsx")) {
                                        $c45->loadFile('./assets/uploads/data-training.xlsx'); // load example file
                                    } else if (file_exists("./assets/uploads/data-training.xls")) {
                                        $c45->loadFile('./assets/uploads/data-training.xls'); // load example file
                                    }
                                    $c45->setTargetAttribute($index[sizeof($index) - 1]);
                                    $benar = 0;
                                    $total = 0;
                                    $tree = 0;
                                    $c45tree = NULL;
                                    $c45tree = $c45->initialize()->buildTree();
                                    foreach ($newtesdata as $key) {
                                        $temp_prediksi = array();
                                        $hasil_tesing = "";
                                        $n = 0;
                                        foreach ($key as $keys => $val) {
                                            if ($n < sizeof($key) - 1) {
                                                $temp_prediksi[$keys] = $val;
                                                $n++;
                                            } else {
                                                $hasil_tesing = $val;
                                            }
                                        }
                                        $perform = "";
                                        $prediksi = $c45tree->classify($temp_prediksi);
                                        $total++;
                                        if ($hasil_tesing == $prediksi) {
                                            $benar++;
                                        }
                                    }
                                    $akurasi = ($benar / $total * 100);
                                    ?>

                                    <div class="alert
                                      <?php if ($akurasi < 60) {
                                            echo 'alert-danger';
                                        } else if ($akurasi < 80) {
                                            echo 'alert-warning';
                                        } else {
                                            echo 'alert-primary';
                                        } ?> text-white">
                                        <h5 class="mb-0 text-white">Hasil Akurasi : <?= round($akurasi, 3) ?>%</h5>
                                    </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-12">Data masih kosong.</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>