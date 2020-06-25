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
                            <th>Nama Tools</th>
                            <th>Pemohon</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $dt) : ?>
                            <tr>
                                <th><?= $i++ ?></th>
                                <td><?= $dt['nama_tools']; ?></td>
                                <td><?= $dt['pemohon']; ?></td>
                                <td><?= $dt['jumlah']; ?></td>
                                <td><?= $dt['harga']; ?></td>
                                <td><?= $dt['tanggal']; ?></td>
                                <td>
                                    <a class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $dt['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url() ?>Dashboard/deleteTools/<?= $dt['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('Dashboard/addTools'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_tools">Nama Tools</label>
                            <input type="text" class="form-control" id="nama_tools" name="nama_tools" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="nama">Pemohon</label>
                            <!-- <input type="text" class="form-control" id="pemohon" name="pemohon" required autocomplete="off"> -->
                            <select class="custom-select" id="nama" name="nama">
                                <option value="">-- Pilih Nama Pemohon --</option>
                                <?php foreach ($nama as $dt) : ?>
                                    <option value="<?= $dt['nama']; ?>"><?= $dt['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
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

<!-- modal edit -->
    <?php foreach ($data as $dt) : ?>
        <div class="modal fade" id="modalEdit<?= $dt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('Dashboard/editTools'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Tools</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $dt['id']; ?>" name="id">
                            <div class="form-group">
                                <label for="nama_tools">Nama Tools</label>
                                <input type="text" class="form-control" id="nama_tools" name="nama_tools" required autocomplete="off" value="<?= $dt['nama_tools']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pemohon">Pemohon</label>
                                <input type="text" class="form-control" id="pemohon" name="pemohon" required autocomplete="off" value="<?= $dt['pemohon']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required autocomplete="off" value="<?= $dt['jumlah']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" required autocomplete="off" value="<?= $dt['harga']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $dt['tanggal']; ?>">
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
        <!-- /.card-body -->
    </div>