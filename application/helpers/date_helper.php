<?php
function format_tanggal_waktu($datetime)
{
    $hari = [
        'Sunday'    => 'Minggu',
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu'
    ];

    $bulan = [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    $dt = new DateTime($datetime);
    $hari_indo = $hari[$dt->format('l')];
    $tanggal   = $dt->format('j');
    $bulan_indo = $bulan[$dt->format('n')]; // format 'n' = bulan tanpa leading zero
    $tahun     = $dt->format('Y');
    $jam       = $dt->format('H.i');

    return "$hari_indo, $tanggal $bulan_indo $tahun jam $jam WIB";
}

function format_tanggal($date)
{
    $hari = [
        'Sunday'    => 'Minggu',
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu'
    ];

    $bulan = [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    $dt = new DateTime($date);
    $hari_indo = $hari[$dt->format('l')];
    $tanggal   = $dt->format('j');
    $bulan_indo = $bulan[$dt->format('n')];
    $tahun     = $dt->format('Y');

    return "$hari_indo, $tanggal $bulan_indo $tahun";
}
