<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Bank Sampah</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h2>Bank Sampah Dashboard</h2>
    <div>Total Berat Sampah: <?= number_format($summary['total_berat'], 0, ',', '.') ?> Kg</div>
    <div>Total Poin: <?= number_format($summary['total_poin'], 0, ',', '.') ?></div>
    <div>Nasabah Aktif: <?= $summary['nasabah_aktif'] ?></div>
    <div>Transaksi Hari Ini: <?= $summary['transaksi_hari_ini'] ?></div>

    <h3>Performa Per Cabang</h3>
    <table border="1">
        <tr>
            <th>Cabang</th>
            <th>Berat Sampah (Kg)</th>
            <th>Transaksi</th>
            <th>Nasabah Aktif</th>
        </tr>
        <?php foreach ($performa as $p): ?>
            <tr>
                <td><?= $p->nama_cabang ?></td>
                <td><?= $p->berat_sampah ?></td>
                <td><?= $p->transaksi ?></td>
                <td><?= $p->nasabah_aktif ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Komposisi Sampah</h3>
    <canvas id="komposisiChart"></canvas>
    <script>
        const komposisiData = {
            labels: [<?php foreach ($komposisi as $k) {
                            echo "'" . $k->jenis_sampah . "',";
                        } ?>],
            datasets: [{
                data: [<?php foreach ($komposisi as $k) {
                            echo $k->total . ",";
                        } ?>],
                backgroundColor: ['blue', 'green', 'orange', 'red', 'cyan']
            }]
        };
        new Chart(document.getElementById('komposisiChart'), {
            type: 'pie',
            data: komposisiData
        });
    </script>

    <h3>Aktivitas Harian</h3>
    <canvas id="aktivitasChart"></canvas>
    <script>
        const aktivitasData = {
            labels: [<?php foreach ($aktivitas as $a) {
                            echo "'" . $a->tanggal . "',";
                        } ?>],
            datasets: [{
                label: 'Berat (Kg)',
                data: [<?php foreach ($aktivitas as $a) {
                            echo $a->total . ",";
                        } ?>],
                borderColor: 'blue',
                fill: false
            }]
        };
        new Chart(document.getElementById('aktivitasChart'), {
            type: 'line',
            data: aktivitasData
        });
    </script>

    <h3>Data Nasabah</h3>
    <div>Total Nasabah: <?= $nasabah['total'] ?></div>
    <div>Nasabah Baru Bulan Ini: <?= $nasabah['baru'] ?></div>
    <ul>
        <?php foreach ($nasabah['top'] as $n): ?>
            <li>ID Nasabah: <?= $n->id_nasabah ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>