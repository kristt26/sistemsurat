<div class="row col-md-12" ng-controller="StrukturController">
    <div class="col-md-4">
        <div class="tile">
            <div class="box-header">
                <h5 class="box-title">Form Struktural</h5>
                <hr>
            </div>
            <div class="box-body">
                <form ng-submit="simpan()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Struktural</label>
                            <input class="form-control" type="text" ng-model="model.nm_struktural" placeholder="Nama Strukutural" required>
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
                <h5 class="box-title">Data Struktural</h5>
                <hr>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <tr>
                        <th style="width:10%">No</th>
                        <th>Struktural</th>
                        <th style="width:15%">Actions</th>
                    </tr>
                    <tr ng-repeat="item in datas">
                        <td>{{$index+1}}</td>
                        <td>{{item.nm_struktural}}</td>
                        <td>
                            <button class="btn btn-info btn-xs" ng-click="edit(item)"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" ng-click="hapus(item)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

