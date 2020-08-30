<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Suratmahasiswa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('suratmahasiswa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idsuratmahasiswa</th>
						<th>Mahasiswa Id</th>
						<th>Pejabat Idpejabat</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($suratmahasiswa as $s){ ?>
                    <tr>
						<td><?php echo $s['idsuratmahasiswa']; ?></td>
						<td><?php echo $s['mahasiswa_Id']; ?></td>
						<td><?php echo $s['pejabat_idpejabat']; ?></td>
						<td>
                            <a href="<?php echo site_url('suratmahasiswa/edit/'.$s['idsuratmahasiswa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('suratmahasiswa/remove/'.$s['idsuratmahasiswa']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
