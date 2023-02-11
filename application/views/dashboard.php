<section class="section">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('<?= base_url() ?>assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
                <div class="hero-inner">
                    <h2>Welcome, <?= ucwords($this->fungsi->user_login()->username) ?>!</h2>
                    <p class="lead">Ini adalah halaman dashboard, anda dapat melakukan Klasifikasi dengan metode C4.5 / Decision Tree menggunakan website ini.</p>
                    <div class="mt-4">
                        <a href="<?= base_url('dataset') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-table"></i> Mulai.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>