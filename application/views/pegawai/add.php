<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pegawai Add</h3>
            </div>
            <?php echo form_open('pegawai/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="Nama" class="control-label">Nama</label>
						<div class="form-group">
							<input type="text" name="Nama" value="<?php echo $this->input->post('Nama'); ?>" class="form-control" id="Nama" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Alamat" class="control-label">Alamat</label>
						<div class="form-group">
							<input type="text" name="Alamat" value="<?php echo $this->input->post('Alamat'); ?>" class="form-control" id="Alamat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Kontak" class="control-label">Kontak</label>
						<div class="form-group">
							<input type="text" name="Kontak" value="<?php echo $this->input->post('Kontak'); ?>" class="form-control" id="Kontak" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TempatLahir" class="control-label">TempatLahir</label>
						<div class="form-group">
							<input type="text" name="TempatLahir" value="<?php echo $this->input->post('TempatLahir'); ?>" class="form-control" id="TempatLahir" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TanggalLahir" class="control-label">TanggalLahir</label>
						<div class="form-group">
							<input type="text" name="TanggalLahir" value="<?php echo $this->input->post('TanggalLahir'); ?>" class="has-datepicker form-control" id="TanggalLahir" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="TahunMasuk" class="control-label">TahunMasuk</label>
						<div class="form-group">
							<input type="text" name="TahunMasuk" value="<?php echo $this->input->post('TahunMasuk'); ?>" class="has-datepicker form-control" id="TahunMasuk" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="NoSK" class="control-label">NoSK</label>
						<div class="form-group">
							<input type="text" name="NoSK" value="<?php echo $this->input->post('NoSK'); ?>" class="form-control" id="NoSK" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="NIK" class="control-label">NIK</label>
						<div class="form-group">
							<input type="text" name="NIK" value="<?php echo $this->input->post('NIK'); ?>" class="form-control" id="NIK" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="IdUser" class="control-label">IdUser</label>
						<div class="form-group">
							<input type="text" name="IdUser" value="<?php echo $this->input->post('IdUser'); ?>" class="form-control" id="IdUser" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="photo" class="control-label">Photo</label>
						<div class="form-group">
							<input type="text" name="photo" value="<?php echo $this->input->post('photo'); ?>" class="form-control" id="photo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="Status" value="<?php echo $this->input->post('Status'); ?>" class="form-control" id="Status" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>