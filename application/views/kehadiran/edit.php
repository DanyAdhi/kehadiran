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
            <form class="user" method="POST" action="<?=base_url('kehadiran/update')?>">
              <?php foreach ($tampil as $t): ?>
              <div class="form-group mb-3">
                <label class="text-dark">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" value="<?=$t->nip?>" onkeypress="return inputAngka(event)" disabled>
                <?=form_error('nip', "<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label class="text-dark">Nama</label>
                <input type="text" class="form-control" placeholder="Nama..." name="name" id="namaa" value="<?=$t->nama?>" disabled>
                <?=form_error('nama',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                <label class="text-dark">Tanggal Mulai</label>
                  <input type="date" class="form-control" placeholder="Tanggal Mulai..." name="mulai" value="<?=$t->tgl_mulai?>">
                <?=form_error('mulai',"<small class='text-danger'>",'</small>') ?>
                </div>
                <div class="col-sm-6">
                  <label class="text-dark">Tanggal Selesai</label>
                  <input type="date" class="form-control" placeholder="Tanggal Selesai..." name="selesai" value="<?=$t->tgl_selesai?>">
                <?=form_error('selesai',"<small class='text-danger'>",'</small>') ?>
                </div>
              </div>
              <div class="form-group row pb-3">
                <div class="col-sm-6 ">
                    <label class="text-dark">Jenis Keterangan</label>
                  <select class="form-control text-dark" name="jenis" id="jenis">
                    <option value="" selected >--Pilih--</option>
                    <option value="1" <?=set_select('jenis','1') ?> <?=($t->jenis_keterangan=='1')?'selected':'' ?> >Cuti</option>
                    <option value="2" <?=set_select('jenis','2') ?> <?=($t->jenis_keterangan=='2')?'selected':'' ?> >Dinas</option>
                    <option value="3" <?=set_select('jenis','3') ?> <?=($t->jenis_keterangan=='3')?'selected':'' ?> >Pendidikan</option>
                  </select>
                <?=form_error('jenis', "<small class='text-danger'>",'</small>') ?>

                </div>
                <div class="col-sm-6">
                    <label class="text-dark">Sub Keterangan</label>
                  <select class="form-control text-dark" name="sub_ket" id="sub">
                    <option value="<?=$t->sub_keterangan ?>"><?=$t->sub_cuti ?></option>
                  </select>
                <?=form_error('sub_ket', "<small class='text-danger'>",'</small>') ?>

                </div>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">No Surat</label>
                <input type="text" class="form-control" placeholder="Nomor Surat..." name="no_surat" value="<?=$t->no_surat?>">
                <?=form_error('no_surat',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">Keterangan</label>
                <textarea class="form-control" placeholder="Keterangan" name="keterangan"><?=$t->keterangan ?></textarea>
                <?=form_error('keterangan',"<small class='text-danger'>",'</small>') ?>
              </div>
              <div class="form-group mb-3">
                    <label class="text-dark">Tanggal Sekarang</label>
                <input type="text" class="form-control" name="sekarangg" value="<?=date('d-m-Y') ?>" disabled>
                <input type="hidden" name="sekarang" value="<?=$t->dibuat ?>">
              </div>
              <hr>
              <input type="hidden" name="id" value="<?=$t->id_kehadiran ?>">
              <div class="d-flex">
              <button type="submit" class="btn btn-primary mr-3">Simpan</button>
              <?php endforeach ?>

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
      // console.log(charCode)
      // jika charCode lebih dari 31(spasi) dan carCode kurang dari 48 atau charCode besar dari 57
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