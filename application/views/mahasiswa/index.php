<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mahasiswa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('mahasiswa/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="box-body">
                <div style="width:100%">
					<table class="table table-striped">
						<tr>
							<th>ID</th>
							<th>Npm</th>
							<th>Kdps</th>
							<th>Jenjang</th>
							<th>Kelas</th>
							<th>Nmmhs</th>
							<th>Tmlhr</th>
							<th>Tglhr</th>
							<th>Jk</th>
							<th>Agama</th>
							<th>Kewarga</th>
							<th>Pendidikan</th>
							<th>Nmsmu</th>
							<th>Jursmu</th>
							<th>Kotasmu</th>
							<th>Kabsmu</th>
							<th>Provsmu</th>
							<th>Pekerjaan</th>
							<th>Almt</th>
							<th>Notlp</th>
							<th>Status</th>
							<th>Jmsaudara</th>
							<th>Nmayah</th>
							<th>Almtayah</th>
							<th>Nmibu</th>
							<th>Sumbiaya</th>
							<th>Statuskul</th>
							<th>Tgdaftar</th>
							<th>Kurikulum</th>
							<th>IdUser</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
						<?php foreach ($mahasiswa as $m) {?>
						<tr>
							<td><?php echo $m['Id']; ?></td>
							<td><?php echo $m['npm']; ?></td>
							<td><?php echo $m['kdps']; ?></td>
							<td><?php echo $m['jenjang']; ?></td>
							<td><?php echo $m['kelas']; ?></td>
							<td><?php echo $m['nmmhs']; ?></td>
							<td><?php echo $m['tmlhr']; ?></td>
							<td><?php echo $m['tglhr']; ?></td>
							<td><?php echo $m['jk']; ?></td>
							<td><?php echo $m['agama']; ?></td>
							<td><?php echo $m['kewarga']; ?></td>
							<td><?php echo $m['pendidikan']; ?></td>
							<td><?php echo $m['nmsmu']; ?></td>
							<td><?php echo $m['jursmu']; ?></td>
							<td><?php echo $m['kotasmu']; ?></td>
							<td><?php echo $m['kabsmu']; ?></td>
							<td><?php echo $m['provsmu']; ?></td>
							<td><?php echo $m['pekerjaan']; ?></td>
							<td><?php echo $m['almt']; ?></td>
							<td><?php echo $m['notlp']; ?></td>
							<td><?php echo $m['status']; ?></td>
							<td><?php echo $m['jmsaudara']; ?></td>
							<td><?php echo $m['nmayah']; ?></td>
							<td><?php echo $m['almtayah']; ?></td>
							<td><?php echo $m['nmibu']; ?></td>
							<td><?php echo $m['sumbiaya']; ?></td>
							<td><?php echo $m['statuskul']; ?></td>
							<td><?php echo $m['tgdaftar']; ?></td>
							<td><?php echo $m['kurikulum']; ?></td>
							<td><?php echo $m['IdUser']; ?></td>
							<td><?php echo $m['photo']; ?></td>
							<td>
								<a href="<?php echo site_url('mahasiswa/edit/' . $m['Id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
								<a href="<?php echo site_url('mahasiswa/remove/' . $m['Id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							</td>
						</tr>
						<?php }?>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
