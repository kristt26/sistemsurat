<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kategorisurat Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('kategorisurat/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idkategori Surat</th>
						<th>Nama Kategori</th>
						<th>Keterangan</th>
						<th>Idkriteria</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($kategorisurat as $k){ ?>
                    <tr>
						<td><?php echo $k['idkategori_surat']; ?></td>
						<td><?php echo $k['nama_kategori']; ?></td>
						<td><?php echo $k['keterangan']; ?></td>
						<td><?php echo $k['idkriteria']; ?></td>
						<td>
                            <a href="<?php echo site_url('kategorisurat/edit/'.$k['idkategori_surat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('kategorisurat/remove/'.$k['idkategori_surat']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
