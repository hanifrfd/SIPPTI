<div class="pull-right">
	<a href="<?php echo site_url('c_status/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Status</th>
		<th>Status</th>
		<th>Keterangan</th>
		<th>Actions</th>
    </tr>
	<?php foreach($statuss as $s){ ?>
    <tr>
		<td><?php echo $s['id_status']; ?></td>
		<td><?php echo $s['status']; ?></td>
		<td><?php echo $s['keterangan']; ?></td>
		<td>
            <a href="<?php echo site_url('c_status/edit/'.$s['id_status']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('c_status/remove/'.$s['id_status']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
