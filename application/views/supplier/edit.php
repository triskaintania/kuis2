<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data Produk</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('produk/update/'.$data->kode); ?>
    <?php echo form_hidden('kode', $data->kode) ?>
    
    <div class="form-group">
      <label for="Nama">Nama Perusahaan Supplier (PT)</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Perusahaan Supplier"
      value="<?php echo $data->nama_PT ?>">
    </div>

    <a class="btn btn-info" href="<?php echo site_url('produk/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
