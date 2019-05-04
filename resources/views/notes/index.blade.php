@extends('layouts.app')

@section('title')
    Listagem de anotações
@endsection

@section('content')

        <div class="row">

            <div class="col-md-2">
                <h4>Grupos</h4>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/notes">--Nenhum--</a></li>
                    @foreach($groups as $group)
                        <li class="list-group-item"><a href="/groups/{{ $group->id }}/notes">{{ $group->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-10">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Anotação</th>
                        <th>Grupo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                            <tr>
                                <td>
                                    <a href="/notes/{{ $note->id }}">
                                      {{ $note->title }}
                                      @if($note->isImportant())
                                        *
                                      @endif
                                    </a>
                                </td>
                                <td>
                                    @if($note->group_id != null)
                                        <label class="btn btn-info btn-sm">{{ $note->group->name }}</label>
                                    @endif
                                </td>
                                 <td>
                                    <a href="/notes/{{ $note->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                 <td>
                                    <form action="/notes/{{ $note->id }}" method="POST">
                                       {{ method_field('DELETE') }}
                                       {{ csrf_field() }}
                                        <button type="button" class="btn btn-danger btn-sm btn-delete">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
@endsection

@section('scripts')
    <script>
        $('.btn-delete').on('click', function(){
            if(confirm('Tem certeza que deseja eliminar a anotação?')){
                $(this).parents('form:first').submit();
            }
        })
    </script>
@endsection