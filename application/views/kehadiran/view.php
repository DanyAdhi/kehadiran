
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-5 text-gray-800">Overview Data <?=$section?></h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
      <div>
        <span class="m-0 font-weight-bold text-primary">Data <?=$section ?></span>
      </div>
      <div class="ml-auto">
        <a class="btn btn-sm btn-primary text-light" href="<?=base_url('kehadiran/add')?>"><i class="fa fa-plus"></i> <b>Tambah</b></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Jenis</th>
              <th width="150px" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($tampil as $t){ 
              $idd = $t->id_kehadiran;
              $id  = str_replace(['=','+','/'], ['-','_','~'], $this->encrypt->encode($t->id_kehadiran));
              ?>
            <tr>
              <td><?=$t->nip ?></td>
              <td><?=$t->nama ?></td>
              <td><?=$t->tgl_mulai ?></td>
              <td><?=$t->tgl_selesai ?></td>
              <td><?=$t->sub_cuti ?></td>
              <td>
                <button class="btn btn-sm btn-primary" title="Detail" data-toggle="modal" data-target="#exampleModalLong<?=$idd?>">Detail</button>
                <a href="<?=base_url('kehadiran/edit/'.$id) ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                  <button href="" onclick="deleteConfirm('<?=base_url('kehadiran/delete/'.$id) ?>')" class="btn btn-sm btn-danger" title="Hapus" data-target="#modalDelete" data-toggle="modal">Hapus</button>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda Yakin ingin Menghapus Data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn btn-danger" id="hapus">Hapus</a>
      </div>
    </div>
  </div>
</div>



<?php
foreach ($tampil as $p):
  $a=$p->id_kehadiran;
?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong<?=$a?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle"><strong >Detail Data Kehadiran</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table class="table table-bordered table-hover">
                  <tr>
                    <td class="col-sm-3"><strong>NIP</strong></td>
                    <td class="col-sm-9"><?=$p->nip ?></td>
                  </tr>
                  <tr>
                    <td><strong>Nama</strong></td>
                    <td><?=$p->nama ?></td>
                  </tr>
                  <tr>
                    <td><strong>Tanggal Mulai</strong></td>
                    <td><?=$p->tgl_mulai ?></td>
                  </tr>
                  <tr>
                    <td><strong>Tanggal Selesai</strong></td>
                    <td><?=$p->tgl_selesai ?></td>
                  </tr>
                  <tr>
                    <td><strong>Jenis Keterangan</strong></td>
                    <td><?=$p->sub_cuti ?></td>
                  </tr>
                  <tr>
                    <td><strong>No Surat</strong></td>
                    <td><?=$p->no_surat ?></td>
                  </tr>
                  <tr>
                    <td><strong>Keterangan</strong></td>
                    <td><?=$p->keterangan ?></td>
                  </tr>
                  <tr>
                    <td><strong>Dibuat</strong></td>
                    <td><?=$p->dibuat ?></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
 <?php endforeach;?>










<script>
  function deleteConfirm(url)
  {
    $('#hapus').attr('href',url);
    $('#modalDelete').modal();
  }

</script>