@extends('layout.layout')

@section('title', $title)

@section('content')

            <h1>{{ $title }}</h1>
            <hr>

            <form method="post" action="{{ route('note.update', ['note' => $note->id]) }}">
                @csrf
                @method('PUT')
                @include('layout.errors')
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter ..." value="{{ $note->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Контент</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Enter ...">{{ $note->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить заметку</button>
                </div>
            </form>

@endsection

