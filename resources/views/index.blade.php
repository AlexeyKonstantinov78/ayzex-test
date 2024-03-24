@extends('layout.layout')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>
    <hr>

    <a href="#" class="btn btn-primary mb-3 add__note">Добавить заметку</a>

        <table class="table table-bordered table-hover text-nowrap">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Дата</th>
            </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td>{{$note->id}}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{$note->created_at}}</td>
                        <td>
                            <a href="{{ route('note.edit', ['note' => $note->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                <i class="fas fa-pencil-alt"></i>Edit
                            </a>

                            <form action="{{ route('note.destroy', ['note' => $note->id]) }}" method="post" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Подтвердите удаление')">
                                    <i
                                        class="fas fa-trash-alt"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($notes) === 0)
            <p class="table__message">Пока ни чего нет</p>
        @endif
@endsection

