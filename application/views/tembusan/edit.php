<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tembusan Edit</h3>
            </div>
			<?php echo form_open('tembusan/edit/'.$tembusan['idtembusan']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idpejabat" class="control-label">Idpejabat</label>
						<div class="form-group">
							<input type="text" name="idpejabat" value="<?php echo ($this->input->post('idpejabat') ? $this->input->post('idpejabat') : $tembusan['idpejabat']); ?>" class="form-control" id="idpejabat" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idsuratmahasiswa" class="control-label">Idsuratmahasiswa</label>
						<div class="form-group">
							<input type="text" name="idsuratmahasiswa" value="<?php echo ($this->input->post('idsuratmahasiswa') ? $this->input->post('idsuratmahasiswa') : $tembusan['idsuratmahasiswa']); ?>" class="form-control" id="idsuratmahasiswa" />
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