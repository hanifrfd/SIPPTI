<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>

<div class="duaa">

</div>

<input type="text" name="" class="tigaa" value="">

  </body>


  <select name="selectuser" class="form-control select" data-live-search="true" required="true">
    <option value="">Pilih Unit Kerja</option>
    <?php
    foreach ($all_unitkerja as $uk) {
        echo '<option value="'.$uk['id_unitKerja'].'" '.$selected.'>'.$uk['namaUnit'].'</option>';
    }
    ?>
  </select>

<button id="tes">test</button>
<div class="panel panel-default">
<div class="panel-body panel-body-table">
    <div class="table-responsive">
        <div class="panel-button">
            <!-- <a href='<?php echo base_url();?>C_pengajuanperbaikan/add/' class="btn btn-info btn-md pull-right"><span class="fa fa-edit"></span> Tambah Pengajuan</a> -->

        </div>
        <div class="row loading-pencarian"  style="display:none;" >
          <div class="col-md-2 col-md-offset-4">
          </div>
          <img src="<?php echo base_url();?>asset/img/loaders/default.gif" alt="">
        </div>
        <?php echo form_open('c_pengajuanperbaikan/tesinput', array("class"=>"form-horizontal")); ?>
        <table id="tableDataTeknisi" class="table table-bordered  table-actions" style="display:none;">
          <thead>
              <tr>
                  <th></th>
                  <th>Username</th>
                  <th>Bidang</th>
                  <th>Baru</th>
                  <th>Sedang</th>
                  <th>Selesai</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($all_teknisi as $teknisi): ?>
              <tr>
                <td><?php echo $teknisi['id_user'] ?></td>
                <td><?php echo $teknisi['username'] ?></td>
                <td><?php echo $teknisi['Bidang'] ?></td>
                <td><?php echo $teknisi['baru'] ?></td>
                <td><?php echo $teknisi['sedang'] ?></td>
                <td><?php echo $teknisi['selesai'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="toolbar"></div>
        <?php echo form_close(); ?>
    </div>

</div>

</div>

</html>

<script type="text/javascript">
$(document).ready(function() {
  var time = moment().format('YYYY-MM-DD hh:mm:ss');
  $('.duaa').append(time);
  $('.tigaa').val(time);
var data =   $('.tigaa').val(time);
  // alert($('.tigaa').val());



  $(document).on('change', '.pengajuan', function(event) {
    alert($(".pengajuan").val());
  })

  $('#tableDataTeknisi').DataTable( {
    columnDefs: [ {
      'targets': 0,
      'searchable': false,
      'orderable': false,
      'className': 'dt-body-center',
      'render': function(data) {
        return '<input type="checkbox" class="select" name="teknisi[]" value="' + data + '">';
      }
    } ],
    initComplete: function() {
			$('div.toolbar').html('<button type="submit" class="btn btn-primary pull-right btn-lg " value="Submit" >Submit</button>');
		}
    }

   );
  $('#tableDataTeknisi').show();

  $('#cekdata').on('click', function(event){
    var selected = [];
		$('#tableDataTeknisi input:checked').each(function() {
			selected.push($(this).attr('value'));
		});
    alert(selected);
  })

} );
</script>



<!--
select option

<select name="id_unitKerja" class="form-control">
  <option value="">Pilih Opsi</option>
  <option class="detailButton" data-toggle="modal" data-target="#formModal"   value="<?php echo $pengajuan['id_pengajuan'] ?>">Detail</option>
  <option class="editButton"   data-toggle="modal"   data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>">Edit</option>
  <option class="deleteButton" data-toggle="modal" data-target="#myModal"     value="<?php echo $pengajuan['id_pengajuan'];?>">Hapus</option>
<span class="help-block"></span>
<button type="button"class="btn btn-primary btn-sm detailButton" data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>"><span class="fa fa-search"></span>
<button type="button"class="btn btn-info btn-sm editButton" data-toggle="modal" data-target="#formModal" value="<?php echo $pengajuan['id_pengajuan'] ?>"><span class="fa fa-edit"></span>
<button type="button"class="btn btn-danger btn-sm deleteButton" data-toggle="modal" data-target="#myModal" value=" <?php   echo $pengajuan['id_pengajuan'];  ?>"><span class="fa fa-trash-o"></span></button>
</select> -->
