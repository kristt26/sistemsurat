<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Suratmasuk Add</h3>
            </div>
            <?php echo form_open('suratmasuk/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nomor_surat" class="control-label">Nomor Surat</label>
						<div class="form-group">
							<input type="text" name="nomor_surat" value="<?php echo $this->input->post('nomor_surat'); ?>" class="form-control" id="nomor_surat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lampiran" class="control-label">Lampiran</label>
						<div class="form-group">
							<input type="text" name="lampiran" value="<?php echo $this->input->post('lampiran'); ?>" class="form-control" id="lampiran" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tujuan" class="control-label">Tujuan</label>
						<div class="form-group">
							<input type="text" name="tujuan" value="<?php echo $this->input->post('tujuan'); ?>" class="form-control" id="tujuan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pengirim" class="control-label">Pengirim</label>
						<div class="form-group">
							<input type="text" name="pengirim" value="<?php echo $this->input->post('pengirim'); ?>" class="form-control" id="pengirim" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tg_surat" class="control-label">Tg Surat</label>
						<div class="form-group">
							<input type="text" name="tg_surat" value="<?php echo $this->input->post('tg_surat'); ?>" class="has-datepicker form-control" id="tg_surat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="berkas" class="control-label">Berkas</label>
						<div class="form-group">
							<input type="text" name="berkas" value="<?php echo $this->input->post('berkas'); ?>" class="form-control" id="berkas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idkategori_surat" class="control-label">Idkategori Surat</label>
						<div class="form-group">
							<input type="text" name="idkategori_surat" value="<?php echo $this->input->post('idkategori_surat'); ?>" class="form-control" id="idkategori_surat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idpejabat" class="control-label">Idpejabat</label>
						<div class="form-group">
							<input type="text" name="idpejabat" value="<?php echo $this->input->post('idpejabat'); ?>" class="form-control" id="idpejabat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
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