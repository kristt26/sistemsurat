<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Kategorisurat Add</h3>
            </div>
            <?php echo form_open('kategorisurat/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nama_kategori" class="control-label">Nama Kategori</label>
						<div class="form-group">
							<input type="text" name="nama_kategori" value="<?php echo $this->input->post('nama_kategori'); ?>" class="form-control" id="nama_kategori" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label">Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo $this->input->post('keterangan'); ?>" class="form-control" id="keterangan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idkriteria" class="control-label">Idkriteria</label>
						<div class="form-group">
							<input type="text" name="idkriteria" value="<?php echo $this->input->post('idkriteria'); ?>" class="form-control" id="idkriteria" />
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