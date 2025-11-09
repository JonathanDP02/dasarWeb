<?php include 'views/header.php'; ?>

<h2>Ringkasan Departemen (Function PostgreSQL)</h2>
<p style="color:#666;">Data ini diambil langsung dari function <code>get_department_summary()</code> di PostgreSQL.</p>

<?php
$data = $summary->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (count($data) > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th>Departemen</th>
            <th>Jumlah Karyawan</th>
            <th>Rata-rata Gaji</th>
            <th>Total Budget Gaji</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><strong><?= htmlspecialchars($row['dept_name']); ?></strong></td>
            <td><?= $row['employee_count']; ?></td>
            <td>Rp <?= number_format($row['avg_salary'], 0, ',', '.'); ?></td>
            <td>Rp <?= number_format($row['total_budget'], 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p style="text-align:center;">Tidak ada data departemen.</p>
<?php endif; ?>

<?php include 'views/footer.php'; ?>
