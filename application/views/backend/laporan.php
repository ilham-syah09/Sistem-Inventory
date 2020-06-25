<!DOCTYPE html>
<html><head>
<title></title>
<style type="text/css">
.table1 {
    color: #232323;
    border-collapse: collapse;
}
.table1, th, td{
    border: 1px solid #999;
    padding: 8px 20px:
}
</style>
</head><body>
<h1 style="text-align: center">CV. SUKSES JAYA MANDIRI</h1><br>
    <h3 style="text-align: center">LAPORAN STOK BARANG</h3><br>
    <table style="text-align: center" class="table1">
        <tr style="text-align: center" class="table1">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga</th>
        </tr>
            <?php $no = 1;
            foreach ($data as $dt) : ?>
                <tr>
                     <td><?= $no++ ?></td>
                                <td><?= $dt['kdbrg']; ?></td>
                                <td><?= $dt['nmbrg']; ?></td>
                                <td><?= $dt['stokbrg']; ?></td>
                                <td><?= $dt['hrgbrg']; ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body></html>