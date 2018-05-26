<?php $this->load->view('layouts/base_start') ?>

<div class="container">
<h2> Daftar Supplier </h2>
  <hr>
  <a href="<?php echo site_url()?>/supplier/create"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp;Create </button></a>
  <hr>

  <?php echo form_open('supplier/index'); ?>
  <div class="form-group">
      <th><input type="text" id='search' name='search' class="form-control" placeholder="Search"></th>
  <button type="submit" class="btn btn-default">Submit</button>
  <?php echo form_close(); ?>
  
  <?php if (isset($results)) { ?>
  <table class="table table-striped">
    <thead>
      <th>Kode Supplier (PT)</th>
      <th>Nama Perusahaan Supplier (PT)</th>
    </thead>
    <tbody>
    <?php foreach ($results as $data) { ?>
    <tr>
      <td><?php echo $data->kode ?></td>
      <td><?php echo $data->nama_PT ?></td>

      <td>
          <a href="<?php echo base_url()?>supplier/destroy/<?php echo $data->kode; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete </button></a> 
          <a href="<?php echo base_url()?>supplier/edit/<?php echo $data->kode; ?>"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span>&nbsp;Update </button>
          </a> 
      </td>

    </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php echo $links ?>
  <?php } else { ?>
  <div>Tidak ada data</div>
  <?php } ?>
</div>

<?php $this->load->view('layouts/base_end') ?>
