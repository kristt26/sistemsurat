<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pegawai Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pegawai/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idpegawai</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Kontak</th>
						<th>TempatLahir</th>
						<th>TanggalLahir</th>
						<th>TahunMasuk</th>
						<th>NoSK</th>
						<th>NIK</th>
						<th>IdUser</th>
						<th>Photo</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pegawai as $p){ ?>
                    <tr>
						<td><?php echo $p['idpegawai']; ?></td>
						<td><?php echo $p['Nama']; ?></td>
						<td><?php echo $p['Alamat']; ?></td>
						<td><?php echo $p['Kontak']; ?></td>
						<td><?php echo $p['TempatLahir']; ?></td>
						<td><?php echo $p['TanggalLahir']; ?></td>
						<td><?php echo $p['TahunMasuk']; ?></td>
						<td><?php echo $p['NoSK']; ?></td>
						<td><?php echo $p['NIK']; ?></td>
						<td><?php echo $p['IdUser']; ?></td>
						<td><?php echo $p['photo']; ?></td>
						<td><?php echo $p['Status']; ?></td>
						<td>
                            <a href="<?php echo site_url('pegawai/edit/'.$p['idpegawai']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pegawai/remove/'.$p['idpegawai']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
