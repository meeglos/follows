@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header" style="margin-top: 11px;">
                    <h3 style="margin-top: 11px;">Creamos registro emisión &because;&nbsp;<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">Registrar datos de seguimiento</div>--}}
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'tasks.store']) !!}
                            <div class="col-md-6">
                                {!! Field::text('agent_code', ['label' => 'Reportado por', 'placeholder' => 'Código del agente que reporta la incidencia']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_code', ['label' => 'Id cliente', 'placeholder' => 'Id del cliente a llamar']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_name', ['label' => 'Nombre cliente', 'placeholder' => 'Nombre de la persona de contacto']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('client_phone', ['label' => 'Teléfono', 'placeholder' => 'Teléfono de contacto']) !!}
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Field::date('client_contact', ['label' => 'Fecha de contacto', 'placeholder' => 'Fecha y hora de contacto']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Field::time('client_contact', ['label' => 'Hora de contacto', 'placeholder' => 'Fecha y hora de contacto']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('category[]', $tags,  null, ['id' => 'tag_list', 'multiple', 'label' => 'Categoría']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Field::textarea('description', ['label' => 'Motivo llamada', 'rows' => '3', 'placeholder' => 'Descripción del motivo de llamada']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary form-control']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
