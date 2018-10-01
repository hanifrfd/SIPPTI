<div class="pull-right">
	<a href="<?php echo site_url('c_unitkerja/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id UnitKerja</th>
		<th>NamaUnit</th>
		<th>Actions</th>
    </tr>
	<?php foreach($unitkerja as $u){ ?>
    <tr>
		<td><?php echo $u['id_unitKerja']; ?></td>
		<td><?php echo $u['namaUnit']; ?></td>
		<td>
            <a href="<?php echo site_url('c_unitkerja/edit/'.$u['id_unitKerja']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('c_unitkerja/remove/'.$u['id_unitKerja']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
