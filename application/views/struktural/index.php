<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Struktural Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('struktural/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idstruktural</th>
						<th>Nm Struktural</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($struktural as $s){ ?>
                    <tr>
						<td><?php echo $s['idstruktural']; ?></td>
						<td><?php echo $s['nm_struktural']; ?></td>
						<td>
                            <a href="<?php echo site_url('struktural/edit/'.$s['idstruktural']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('struktural/remove/'.$s['idstruktural']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
