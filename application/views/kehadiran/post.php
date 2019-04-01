<?=$this->session->flashdata('flash') ?>

<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-11">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Input Data <?=$section ?></h1>
            </div>
            <form class="user" method="POST" action="<?=base_url('kehadiran/save')?>">
              <div class="form-group mb-3">
                <label class="text-dark">NIP</label>
                <input type="text" class="form-control" placeholder="Masukkan NIP..." name="nip" id="nip" value="<?=set_value('nip') ?>" onkeypress="return inputAngka(event)">
                <?=form_error('nip', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Nama</label>
                <input type="text" class="form-control" placeholder="Nama..." name="name" id="namaa" value="<?=set_value('nama') ?>" disabled>
                <input type="hidden" name="nama" id="nama">
                <?=form_error('nama',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                <label class="text-dark">Tanggal Mulai</label>
                  <input type="date" class="form-control" placeholder="Tanggal Mulai..." name="mulai" value="<?=set_value('mulai') ?>">
                <?=form_error('mulai',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="col-sm-6">
                  <label class="text-dark">Tanggal Selesai</label>
                  <input type="date" class="form-control" placeholder="Tanggal Selesai..." name="selesai" value="<?=set_value('selesai') ?>">
                <?=form_error('selesai',"<small class='text-danger'>",'</small>') ?>
                </div>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                    <label class="text-dark">Jenis Keterangan</label>
                  <select class="form-control text-dark" name="jenis" id="jenis">
                    <option value="" selected >--Pilih--</option>
                    <option value="1" <?=set_select('jenis','1') ?> >Cuti</option>
                    <option value="2" <?=set_select('jenis','2') ?> >Dinas</option>
                    <option value="3" <?=set_select('jenis','3') ?> >Pendidikan</option>
                  </select>
                <?=form_error('jenis', "<small class='text-danger'>",'</small>') ?>

                </div>
                <div class="col-sm-6">
                    <label class="text-dark">Sub Keterangan</label>
                  <select class="form-control text-dark" name="sub_ket" id="sub">
                    <option value="" >--Pilih--</option>
                  </select>
                <?=form_error('sub_ket', "<small class='text-danger'>",'</small>') ?>

                </div>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">No Surat</label>
                <input type="text" class="form-control" placeholder="Nomor Surat..." name="no_surat" value="<?=set_value('no_surat') ?>">
                <?=form_error('no_surat',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">Keterangan</label>
                <textarea class="form-control" placeholder="Keterangan" name="keterangan"></textarea>
                <?=form_error('keterangan',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">Tanggal Sekarang</label>
                <input type="text" class="form-control" name="sekarangg" value="<?=date('d-m-Y') ?>" disabled>
                <input type="hidden" name="sekarang" value="<?=date('d-m-Y') ?>">
              </div>
              <hr>
              <div class="d-flex">
              <button type="submit" class="btn btn-primary mr-3">Simpan</button>
            </form>        
            <a href="<?=base_url('kehadiran') ?>" class="btn btn-secondary">Kembali</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  function inputAngka(evt){
      var charCode = (evt.charCode);
      if(charCode>32 && (charCode<48 || charCode>57) && charCode!=45)
      {
        return false;
      }
      else
      {
        return true;
      }
  }
</script>