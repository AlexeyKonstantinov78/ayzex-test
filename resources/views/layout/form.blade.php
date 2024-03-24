<form class="form1" method="post" action="{{ route('note.store') }}" enctype="multipart/form-data">
    @csrf
    @include('layout.errors')
    <div class="card-body">
        <svg class="modal__close" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="10.833" width="0.851136" height="15.3204" transform="rotate(45 10.833 0)" fill="#C1AB91"/>
            <rect y="0.60183" width="0.851136" height="15.3204" transform="rotate(-45 0 0.60183)" fill="#C1AB91"/>
        </svg>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter ..." value="{{ old('title') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Контент</label>
                    <textarea class="form-control" name="content" rows="3" placeholder="Enter ...">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary form__submit">Добавить заметку</button>
    </div>
</form>
