<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tembusan Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tembusan/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idtembusan</th>
						<th>Idpejabat</th>
						<th>Idsuratmahasiswa</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tembusan as $t){ ?>
                    <tr>
						<td><?php echo $t['idtembusan']; ?></td>
						<td><?php echo $t['idpejabat']; ?></td>
						<td><?php echo $t['idsuratmahasiswa']; ?></td>
						<td>
                            <a href="<?php echo site_url('tembusan/edit/'.$t['idtembusan']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tembusan/remove/'.$t['idtembusan']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
