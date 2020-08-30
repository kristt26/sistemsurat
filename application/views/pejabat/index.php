<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pejabat Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pejabat/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idpejabat</th>
						<th>Idstruktural</th>
						<th>Status</th>
						<th>Idpegawai</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pejabat as $p){ ?>
                    <tr>
						<td><?php echo $p['idpejabat']; ?></td>
						<td><?php echo $p['idstruktural']; ?></td>
						<td><?php echo $p['status']; ?></td>
						<td><?php echo $p['idpegawai']; ?></td>
						<td>
                            <a href="<?php echo site_url('pejabat/edit/'.$p['idpejabat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pejabat/remove/'.$p['idpejabat']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
