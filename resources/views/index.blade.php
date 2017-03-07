@extends('layouts.app')
@section('content')
        
    </head>
    <body>
    <div class="container">
        <h2>Trabajadores</h2>
        <div  ng-controller="workersController">

            <!-- Table-to-load-the-data Part -->
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>@{{id}}</th>
                        <th>@{{cedula}}</th>
                        <th>@{{nombre}}</th>
                        <th>@{{apellido}}</th>
                        <th>@{{email}}</th>
                        <th>@{{charge}}</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Agregar un Nuevo Trabajador</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="worker in workers">
                        <td>@{{  worker.id }}</td>
                        <td>@{{ worker.cedula }}</td>
                        <td>@{{ worker.nombre }}</td>
                        <td>@{{ worker.apellido }}</td>
                        <td>@{{ worker.email }}</td>
                        <td>@{{ worker.charge }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', worker.id)">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(worker.id)">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmWorkers" class="form-horizontal" novalidate="">
                               
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">@{{}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="nombre" placeholder="@{{cedula}}" value="@{{name}}" 
                                        ng-model="worker.cedula" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmWorkers.name.$invalid && frmWorkers.name.$touched">El nombre es Requerido</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">@{{nombre}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="nombre" placeholder="@{{cedula}}" value="@{{name}}" 
                                        ng-model="worker.nombre" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmWorkers.name.$invalid && frmWorkers.name.$touched">El nombre es Requerido</span>
                                    </div>
                                </div>
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">@{{apellido}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="apellido" placeholder="@{{apellido}}" value="@{{apellido}}" 
                                        ng-model="worker.apellido" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmWorkers.name.$invalid && frmWorkers.name.$touched">El apellido es Requerido</span>
                                    </div>
                                </div>
                              

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">@{{email}}</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="@{{email}}" 
                                        ng-model="worker.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmWorkers.email.$invalid && frmWorkers.email.$touched">El Correo es Requerido</span>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">@{{charge}}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="charge" placeholder="Position" value="@{{position}}" 
                                        ng-model="worker.charge" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmWorkers.position.$invalid && frmWorkers.position.$touched">charge es Requerido</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmWorkers.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection