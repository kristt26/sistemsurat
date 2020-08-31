<div class="row col-md-12" ng-controller="KategoriController">
    <div class="col-md-4">
        <div class="tile">
            <div class="box-header">
                <h3 class="box-title">Form Kategori Surat</h3>
                
                <hr>
            </div>
            <div class="box-body">
                <form ng-submit="simpan()">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kriteria</label>
                        <input class="form-control" type="text" ng-model="datas.kriterium.kriteria" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Surat</label>
                        <input class="form-control" type="text" ng-model="model.nama_kategori" aria-describedby="emailHelp" placeholder="Kategori Surat" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <textarea class="form-control" ng-model="model.keterangan" rows="4" required></textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="tile">
            <div class="box-header">
                <div class="d-flex justify-content-between">
                    <h5 class="box-title">Data Kategori Surat Kriteria {{datas.kriterium.kriteria}}</h5>
                    <button type="button" class="btn btn-secondary btn-xs" ng-click="back()"><i class="fa fa-arrow-left"></i>Kembali</button>
                </div>
                <hr>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <tr>
						<th style="width: 10%">No</th>
						<th>Nama Kategori</th>
						<th>Keterangan</th>
						<th style="width: 15%">Actions</th>
                    </tr>
                    <tr ng-repeat="item in datas.kategorisurat">
						<td>{{$index+1}}</td>
						<td>{{item.nama_kategori}}</td>
						<td>{{item.keterangan}}</td>
						<td>
                            <button type="button" class="btn btn-info btn-xs" ng-click="edit(item)"><i class="fa fa-pencil"></i></button> 
                            <button type="button" class="btn btn-danger btn-xs" ng-click="hapus(item)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </table>
                                
            </div>
        </div>
    </div>
</div>
