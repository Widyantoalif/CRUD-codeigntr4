<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if (session()->get('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data siswa berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (session()->get('err')) {
                echo "<div class='alert alert-danger p-0 pt-2' role='alert'>" . session()->get('err') . "</div>";
                session()->remove('err');
            }
            ?>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                <i class="fa fa-plus">Tambah data</i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nisn</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalubah" class="btn btn-sm btn-warning" id="btn-edit" data-id="<?= $row['id']; ?>" data-nisn="<?= $row['nisn']; ?>" data-nama="<?= $row['nama']; ?>"><i class="fa fa-edit"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modalhapus" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->

<!-- Modal ubah data -->
<div class="modal fade" id="modalubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('siswa/ubah'); ?>" method="POST">
                    <input type="hidden" name="id" id="id-siswa">
                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan Nisn" value="<?= $row['nisn'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="<?= $row['nama'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah data</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!-- Modal tambah data -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('siswa/tambah'); ?>" method="POST">
                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan Nisn">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah data</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modalhapus">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    Apakah anda yalin ingin menghapus data
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/siswa/hapus/<?= $row['id']; ?>" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>