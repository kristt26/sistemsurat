<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Suratmasuk Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('suratmasuk/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idarsip Surat</th>
						<th>Nomor Surat</th>
						<th>Lampiran</th>
						<th>Tujuan</th>
						<th>Pengirim</th>
						<th>Tg Surat</th>
						<th>Berkas</th>
						<th>Idkategori Surat</th>
						<th>Idpejabat</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($suratmasuk as $s){ ?>
                    <tr>
						<td><?php echo $s['idarsip_surat']; ?></td>
						<td><?php echo $s['nomor_surat']; ?></td>
						<td><?php echo $s['lampiran']; ?></td>
						<td><?php echo $s['tujuan']; ?></td>
						<td><?php echo $s['pengirim']; ?></td>
						<td><?php echo $s['tg_surat']; ?></td>
						<td><?php echo $s['berkas']; ?></td>
						<td><?php echo $s['idkategori_surat']; ?></td>
						<td><?php echo $s['idpejabat']; ?></td>
						<td><?php echo $s['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('suratmasuk/edit/'.$s['idarsip_surat']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('suratmasuk/remove/'.$s['idarsip_surat']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
