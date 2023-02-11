<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Dataset C45</h4>
                <hr>
                <small><a href="<?= base_url(); ?>assets/c45/sample.xlsx" target="_blank">Download contoh Format .xlsx</a></small>&nbsp;
                <form enctype="multipart/form-data" method="POST" action="<?= base_url() ?>operation/savedataset">
                    <input type="file" name="files">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form><br>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <?php
                                foreach ($index as $key) {
                                ?>
                                    <th><?= $key ?></th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dataset as $key) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($index as $keys) {
                                    ?>
                                        <td><?= $key[$keys] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>