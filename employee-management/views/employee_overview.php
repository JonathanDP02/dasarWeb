<?php
include 'views/header.php';
?>

<h2>Ringkasan Data Karyawan</h2>
<p style="color:#666;">Informasi total karyawan, total gaji per bulan, dan rata-rata masa kerja.</p>

<div class="dashboard-cards">
    <div class="card">
        <h3>Total Karyawan</h3>
        <div class="number"><?= $overview['total_employees'] ?></div>
    </div>
    <div class="card">
        <h3>Total Gaji Per Bulan</h3>
        <div class="number">Rp <?= number_format($overview['total_salary'], 0, ',', '.') ?></div>
    </div>
    <div class="card">
        <h3>Rata-rata Masa Kerja</h3>
        <div class="number"><?= $overview['avg_years'] ?> tahun</div>
    </div>
</div>

<?php include 'views/footer.php'; ?>
