@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="page-header" style="margin-top: 11px;">
                    <h3 style="margin-top: 11px;">Registro de etiquetas &because;&nbsp;<small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at aut blanditiis.</small></h3>
                </div>
            </div>
            <div class="col-md-2">
                <a role="button" class="btn btn-danger pull-right" href="create" aria-label="Left Align">Agregar etiqueta
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>

        @if(count($tags) > 0)
            @foreach($tags as $tag)
                <div class="panel panel-default" style="margin-bottom: 5px;">
                    <div class="panel-body" style="padding-top: 8px; padding-bottom: 8px;">
                        <a href="{{ $tag->description }}" data-toggle="tooltip" data-html="true" data-placement="bottom" title="{{ $tag->tooltip }}">
                            {{ str_limit($tag->description, 80) }} | <b style="color: #2d760c;">Creado por: <u>{{ $tag->user->name }}</u></b> {{ $tag->dif }}
                        </a>
                        {{--<span class="badge">{{ $tag->count }}</span>--}}
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
                {{ $tags->render() }}
            </div>
        </div>
    </div>
@endsection