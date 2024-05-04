<?php require 'home/header.view.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Online Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/kategori">Kategori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/suplier">Supplier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaction">Transaksi</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h1>Welcome toko online Dashboard</h1>
    <p>Ini Tampilan Utama Toko</p>

    <div class="row mt-4">
        <?php
        // Simulasi data produk (biasanya data ini akan diambil dari database)
        $produk = array(
            array("Nama Produk 1", "Deskripsi Produk 1", 100000, "gambar1.jpg"),
            array("Nama Produk 2", "Deskripsi Produk 2", 150000, "gambar2.jpg"),
            array("Nama Produk 3", "Deskripsi Produk 3", 120000, "gambar3.jpg"),
            array("Nama Produk 4", "Deskripsi Produk 4", 90000, "gambar4.jpg"),
        );

        // Looping untuk menampilkan setiap produk
        foreach ($produk as $item) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="' . $item[3] . '" alt="">
                        <div class="card-body">
                            <h4 class="card-title">' . $item[0] . '</h4>
                            <p class="card-text">' . $item[1] . '</p>
                            <h5>Rp ' . number_format($item[2], 0, ',', '.') . '</h5>
                        </div>
                        <div class="card-footer">
                            <a href="/transaction" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

<?php require 'home/footer.view.php'; ?>
