<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header">
                </div> -->
            <div class="card-body">
                <h4>Atribut Label</h4>
                <hr>
                <p>(Kuning untuk attribute pendukung, Hijau untuk Label)</p>
                <div class="table-responsive">
                    <table class="table table-border" id="table1">
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
                            <!-- <tr>
                            <td align="center" style="border-right: 1px solid black;" colspan="<?= sizeof($index) - 1 ?>"><b>--Attribut Pendukung--</b></td>
                            <td align="center"><b>--Label--</b></td>
                          </tr> -->
                            <?php
                            foreach ($dataset as $key) {
                            ?>

                                <tr>
                                    <?php
                                    $x = 0;
                                    foreach ($index as $keys) {
                                        $x++;
                                    ?>
                                        <td class="<?= $x == sizeof($index) ? 'table-success' : 'table-warning'; ?>"><?= $key[$keys] ?></td>
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