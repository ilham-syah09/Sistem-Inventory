<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('flash-success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <ul class="text-right">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Data</button>
            </ul>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table table-success">
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Keluar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $dt) : ?>
                            <tr>
                                <th><?= $i++ ?></th>
                                <td><?= $dt['kdbrg']; ?></td>
                                <td><?= $dt['nmbrg']; ?></td>
                                <td><?= $dt['jmlkeluar']; ?></td>
                                <td><?= $dt['tanggal']; ?></td>
                                <td>
                                    <a class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $dt['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url() ?>Dashboard/deletek/<?= $dt['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- Modal Add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('Dashboard/addBarangk'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kdbrg">Kode Barang</label>
                            <!-- <input type="text" class="form-control" id="kdbrg" name="kdbrg" required autocomplete="off"> -->
                            <select class="custom-select" id="kdbrg" name="kdbrg">
                                <option value="">-- Pilih Kode Barang --</option>
                                <?php foreach ($kdbrg as $dt) : ?>
                                    <option value="<?= $dt['kdbrg']; ?>"><?= $dt['kdbrg']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jmlkeluar">Jumlah Keluar</label>
                            <input type="text" class="form-control" id="jmlkeluar" name="jmlkeluar" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="add" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($data as $dt) : ?>
        <div class="modal fade" id="modalEdit<?= $dt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('Dashboard/editBarangk'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $dt['id']; ?>" name="id">
                            <input type="hidden" value="<?= $dt['jmlkeluar']; ?>" name="jmlawal">
                            <div class="form-group">
                                <label for="kdbrg">Kode Barang</label>
                                <input type="text" readonly="true" class="form-control" id="kdbrg" name="kdbrg" required autocomplete="off" value="<?= $dt['kdbrg']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jmlkeluar">Jumlah Keluar</label>
                                <input type="text" class="form-control" id="jmlkeluar" name="jmlkeluar" required autocomplete="off" value="<?= $dt['jmlkeluar']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?= $dt['tanggal']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-warning">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>


</div>