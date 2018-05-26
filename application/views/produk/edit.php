<?php $this->load->view('layouts/base_start') ?>

<div class="container">
  <legend>Tambah Data Produk</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open('produk/update/'.$data->id); ?>
    <?php echo form_hidden('id', $data->id) ?>
    
    <div class="form-group">
      <label for="Nama">Nama Produk</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama produk"
      value="<?php echo $data->nama ?>">

    </div>
    <div class="form-group">
      <label for="Nama">Harga Produk</label>
      <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Produk"
      value="<?php echo $data->harga ?>">

    </div>
    <div class="form-group">
      <label for="Nama">Kode Produk</label>
      <br>
      <select name="kode" class="form-control">
      <option value="1">1 - PT. Unilever Indonesia</option>
      <option value="2">2 - PT. Mars, Inc</option>
      <option value="3">3 - PT. Johnson & Johnson</option>
      <option value="4">4 - PT. Procter & Gamble (P & G)</option>
      <option value="5">5 - PT. Nestle S.A</option>
      <option value="6">6 - PT. Kraft Foods</option>
        </select>
    </div>

    <a class="btn btn-info" href="<?php echo site_url('produk/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>
  <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('layouts/base_end') ?>
