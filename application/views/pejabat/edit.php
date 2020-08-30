<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pejabat Edit</h3>
            </div>
			<?php echo form_open('pejabat/edit/'.$pejabat['idpejabat']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idstruktural" class="control-label">Idstruktural</label>
						<div class="form-group">
							<input type="text" name="idstruktural" value="<?php echo ($this->input->post('idstruktural') ? $this->input->post('idstruktural') : $pejabat['idstruktural']); ?>" class="form-control" id="idstruktural" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $pejabat['status']); ?>" class="form-control" id="status" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idpegawai" class="control-label">Idpegawai</label>
						<div class="form-group">
							<input type="text" name="idpegawai" value="<?php echo ($this->input->post('idpegawai') ? $this->input->post('idpegawai') : $pejabat['idpegawai']); ?>" class="form-control" id="idpegawai" />
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