@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <span class="mr-page-header">Registro de emisión</span>
                        {{--&because;<span class="rotsign">&because;</span>&nbsp;&nbsp;<small> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at aut blanditiis.</small></h3>--}}
                </div>
            </div>
            <div class="col-md-9">

                <a role="button" class="btn btn-sm btn-primary pull-right btn-mr-sp" href="create" aria-label="Left Align">Agregar registro
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
                <!-- Split button -->
                <div class="btn-group btn-group-sm pull-right btn-mr-sp">
                    <button type="button" class="btn btn-info">Mostrar</button>
                    <button type="button" class="btn btn-info  btn-smdropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Más antiguos primero</a></li>
                        <li><a href="#">Más recientes primero</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Pendientes</a></li>
                        <li><a href="#">Finalizados</a></li>
                        <li><a href="#">Todos</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Sin seguimiento</a></li>
                    </ul>
                </div>
                <div class="btn-group btn-group-sm pull-right btn-mr-sp">
                    <button type="button" class="btn btn-info btn-sm">Agrupar</button>
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Esta semana</a></li>
                        <li><a href="#">Este mes</a></li>
                        <li><a href="#">Resúmen por semanas</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Limpiar filtros</a></li>
                    </ul>
                </div>
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="basic-addon1">Buscar</span>
                    <input type="text" class="form-control" placeholder="Inserta el contenido de tu búsqueda" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <hr>
        {{--<div id="app-root">--}}
            {{--<div class="tabs is-centered is-medium">--}}
                {{--<ul>--}}
                    {{--<li v-for="skill in skills"><a>@{{ skill }}</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
                <div class="panel panel-default mr-mg-bottom">
                    <div class="panel-body mr-item-padding">
                        <a href="{{ $task->url }}" data-toggle="tooltip" data-html="true" data-placement="bottom" title="{{ $task->tooltip }}">
                            {{ str_limit($task->description, 80) }} &nbsp;&bullet;&nbsp; Creado por {{ $task->user->name }} {{ $task->dif }}
                        </a>
                        <span class="badge">{{ $task->count }}</span>
                        <span class="pull-right">{!! $task->status !!}</span>
                        {{--<div id="working">--}}
                            {{--<user-list>--}}
                                {{--<user></user>--}}
                            {{--</user-list>--}}
                        {{--</div>--}}
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info" role="alert">
                <h4 style="text-align: center; padding-top: 11px;">Aún no has creado ningún registro</h4>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-7 col-xs-offset-5">
                {{ $tasks->render() }}
            </div>
        </div>
    </div>
@endsection