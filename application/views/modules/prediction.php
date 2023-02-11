<?php
require 'libraries/c45lib/vendor/autoload.php';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
foreach ($index as $key) {
    $label[$key] = array_unique(array_column($dataset, $key));
}
$datatoprediksi = [];
foreach ($dataset as $key) {
    $rowdata = [];
    foreach ($index as $keys) {
        $rowdata[] = $key[$keys];
    }
    $datatoprediksi[] = $rowdata;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header">
                </div> -->
            <div class="card-body">
                <h4>Decision Tree</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="">
                            <?php
                            $x = 0;
                            $lab = [];
                            foreach ($label as $key => $value) {
                                $x++;
                                array_push($lab, $key);
                                if ((sizeof($label)) > $x) {
                            ?>
                                    <div class="form-group">
                                        <label><?= $key ?></label>
                                        <select name="pred[<?= $key ?>]" class="form-control">
                                            <?php foreach ($value as $keys) {
                                                $PRED = $this->input->post('pred'); ?>
                                                <option value="<?= $keys ?>" <?= isset($PRED[$key]) && $PRED[$key] == $keys ? 'selected' : '' ?>><?= $keys ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            <?php }
                            }
                            ?>
                            <div class="form-group">
                                <button class="btn btn-primary" name="prediksi" value="1" type="submit">Prediksi</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <?php
                        if ($this->input->post('prediksi') !== NULL) {
                        ?>
                            <h4>Decission Tree</h4>
                            <?php
                            $this->session->set_userdata("prediksi", true);
                            $c45 = new Algorithm\C45();
                            if (file_exists("./assets/uploads/dataset.xlsx")) {
                                $c45->loadFile('./assets/uploads/dataset.xlsx'); // load example file
                            } else if (file_exists("./assets/uploads/dataset.xls")) {
                                $c45->loadFile('./assets/uploads/dataset.xls'); // load example file
                            }
                            $c45->setTargetAttribute($index[sizeof($index) - 1]); // set target attribute
                            $initialize = $c45->initialize(); // initialize
                            $buildTree = $initialize->buildTree(); // build tree
                            $stringTree = $buildTree->toString(); // set to string
                            echo "<pre>";
                            print_r($stringTree);
                            echo "</pre>";
                            $predict = $this->input->post('pred');
                            $prediksi = $buildTree->classify($predict); // print "No"
                            // $spreadsheet = $reader->load("./assets/uploads/product.xlsx");
                            // $product = $spreadsheet->getSheet(0)->toArray();
                            // $product = $this->gmodel->mapping($product);
                            ?>
                    </div>
                    <div class="col-md-12">
                        <h4>Proses</h4>
                        <div class="card card-body bg-primary text-white">
                            <h4 class="card-title mb-2 text-white">Hasil Prediksi</h4>
                            <!-- <h4 class="card-title mb-2 text-white" align="center"><?php var_dump($stringTree); ?></h4> -->
                            <h4 class="card-title mb-2 text-white" align="center"><?= $prediksi; ?></h4>
                        </div>
                    </div>
                    <!-- hasil prediksi -->
                <?php
                            if ($this->session->userdata('prediksi') == true) {
                                $this->session->set_userdata("prediksi", false);
                            }
                        }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>