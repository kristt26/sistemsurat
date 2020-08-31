<div class="row col-md-12" ng-controller="KriteriaController">
    <div class="col-md-4">
        <div class="tile">
            <div class="box-header">
                <h5 class="box-title">Form Kriteria</h5>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="box-body">
                <form ng-submit="simpan()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kriteria</label>
                            <input class="form-control" type="text" ng-model="model.kriteria" placeholder="Nama Kriteria" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                <h5 class="box-title">Data Kriteria</h5>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <tr>
						<th style="width:10%">No</th>
						<th>Kriteria</th>
						<th style="width:20%">Actions</th>
                    </tr>
                    <tr ng-repeat="item in datas">
						<td>{{$inded+1}}</td>
						<td>{{item.kriteria}}</td>
						<td>
                            <button type="button" class="btn btn-info btn-xs" ng-click="edit(item)"><i class="fa fa-pencil"></i></button> 
                            <button type="button" class="btn btn-danger btn-xs" ng-click="hapus(item)"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-primary btn-xs" ng-click="addkategori(item)"><i class="fa fa-plus"></i></button>
                        </td>
                    </tr>
                </table>
                                
            </div>
        </div>
    </div>
</div>
