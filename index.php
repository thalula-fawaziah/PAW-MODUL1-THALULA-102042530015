<?php 

$products = [
    ["nama" => "Mouse Wireless", "kategori" => "Aksesoris", "harga" => 150000, "stok" => 12],
    ["nama" => "Keyboard Mekanik", "kategori" => "Aksesoris", "harga" => 450000, "stok" => 7],
    ["nama" => "Headset Gaming", "kategori" => "Audio", "harga" => 750000, "stok" => 0],
    ["nama" => "Monitor", "kategori" => "Monitor", "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop", "kategori" => "Laptop", "harga" => 850000, "stok" => 3],
    ["nama" => "Webcam", "kategori" => "Aksesoris", "harga" => 320000, "stok" => 0],
];

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

$batasDiskon = 1000000;
$persenDiskon = 10;

$totalProduk = count($products);
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cia Store</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
        <div class="container nav-inner">
            <h2 class="logo">Cia Store</h2>
            <nav class="nav-menu">
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
            </nav>
        </div>
    </header>

<main class="container">

<section class="hero" id="home">
    <span class="hero-label">Cia Store</span>
    <h1>Simple Tech Store.</h1>
    <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
    <a href="#products" class="btn-light">Lihat Produk</a>
</section>

<section class="catalog-head" id="products">
    <div>
        <span class="section-label">Our Product</span>
        <h2>Katalog Product</h2>
</div>
<div class="total-badge">Total Produk: <strong><?= $totalProduk; ?></strong></div>
</section>

<section class="product-grid">
    <?php foreach($products as $p): ?>
        <?php

        if($p["stok"] > 0) {
            $status         = "Tersedia";
            $statusClass    = "badge-ok"; 
        } else {
            $status = "Stok Habis";
            $statusClass = "badge-out";
        }

        $adaDiskon = $p["harga"] >= $batasDiskon;
        if ($adaDiskon) {
            $hargaAkhir = $p["harga"] - ($p["harga"] * $persenDiskon / 100);
        }
    ?>

    <article class="product-card">
                    <div class="card-top">
                        <span class="category"><?= $p["kategori"]; ?></span>
                        <?php if ($adaDiskon): ?>
                            <span class="discount-tag">DISKON <?= $persenDiskon; ?>%</span>
                        <?php endif; ?>
                    </div>
 
                    <h3><?= $p["nama"]; ?></h3>
 
                    <div class="price-box">
                        <?php if ($adaDiskon): ?>
                            <span class="price-old"><?= formatRupiah($p["harga"]); ?></span>
                            <span class="price"><?= formatRupiah($hargaAkhir); ?></span>
                        <?php else: ?>
                            <span class="price-old invisible">&nbsp;</span>
                            <span class="price"><?= formatRupiah($p["harga"]); ?></span>
                        <?php endif; ?>
                    </div>

       <div class="card-info">
                        <span>Stok: <?= $p["stok"]; ?></span>
                        <span class="badge <?= $statusClass; ?>"><?= $status; ?></span>
                    </div>
 
                    <?php if ($p["stok"] > 0): ?>
                        <button class="buy-button">Beli Sekarang</button>
                    <?php else: ?>
                        <button class="buy-button" disabled>Stok Habis</button>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </section>
 
    </main>

      <footer class="footer" id="about">
        <div class="container">
            <p>&copy; <?= date("Y"); ?> Cia Store. Toko perangkat dan aksesoris teknologi.</p>
        </div>
    </footer>
 
</body>
</html>