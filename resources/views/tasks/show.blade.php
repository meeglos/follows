@extends('layouts/app')

@section('content')
    <div class="container">
        <h3 class="show-header">
            {{ $task->description }} {!! Form::submit('editar', ['class'=> 'btn btn-primary pull-right']) !!}
            <small> <p class="label label-warning">{{ $task->dif }}</p></small>
        </h3>

        <section class="row post-details">
            <section class="col-md-6 post-details-left">
                @foreach($task->tags as $tag)
                    <span class="tag-follow">{{ $tag->description }}</span>
                @endforeach
                <p class="creado-por">Reportado por: {{ $task->agent_code}} @ {{ $task->fecha }}</p>

            </section>
            <section class="col-md-6 post-details-right">
                <p><span class="post-details-title">ID del cliente:</span> {{ $task->client_code }}</p>
                <p><span class="post-details-title">Contacto del cliente:</span> {{ $task->client_phone }}</p>
                <p><span class="post-details-title">Nombre del contacto:</span> {{ $task->client_name }}</p>
            </section>
        </section>

        @if($task->posts)
            <ol id="lista2">
                @foreach($task->posts as $post)
                    <li>
                        <p class="follow-header"><span class="follow-author">{{ $post->user->name }}</span> &#8226; {{ $post->dif }}</p>
                        <p class="follow-comment">{{ $post->comments }}</p>
                    </li>
                @endforeach
            </ol>
        @else
            <div class="alert alert-info" role="alert">
                <h4 style="text-align: center; padding-top: 11px;">Aún no has registrado ningún comentario</h4>
            </div>
        @endif
        <hr>

        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="/tasks/{{ $task->id }}/follows">

                    {{ csrf_field() }}

                    <div class="form-group">
                        {!! Field::textarea('comments', ['label' => 'Descripción de seguimiento', 'rows' => '3', 'placeholder' => 'Descripción del seguimiento al cliente aquí']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Guardar', ['class'=> 'btn btn-primary form-control']) !!}
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <p>Creado por {{ $task->user->name }}</p>

    </div>
@endsection
