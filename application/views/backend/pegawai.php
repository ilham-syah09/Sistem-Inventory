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
                            <th>Nama Karyawan</th>
                            <th>alamat</th>
                            <th>No. Hp</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $dt) : ?>
                            <tr>
                                <th><?= $i++ ?></th>
                                <td><?= $dt['nama']; ?></td>
                                <td><?= $dt['alamat']; ?></td>
                                <td><?= $dt['kontak']; ?></td>
                                <td><?= $dt['tgl']; ?></td>
                                <td>
                                    <a class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $dt['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url() ?>Dashboard/deletePegawai/<?= $dt['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
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
            <form action="<?= base_url('Dashboard/addPegawai'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Karyawan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="kontak">No. Hp</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl" name="tgl" required autocomplete="off">
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

    <?php foreach ($data as $dt) : ?>
        <div class="modal fade" id="modalEdit<?= $dt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('Dashboard/editPegawai'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?= $dt['id']; ?>" name="id">
                            <div class="form-group">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $dt['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off" value="<?= $dt['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="kontak">No. Hp</label>
                                <input type="text" class="form-control" id="kontak" name="kontak" required autocomplete="off" value="<?= $dt['kontak']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $dt['tgl']; ?>">
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