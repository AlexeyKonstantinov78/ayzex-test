<!doctype html>
<html lang="ru">
@include('layout.head')
<body>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <div class="modal__form">
        <div class="container modal__form_container">
            @include('layout.form')
        </div>
    </div>
</body>
</html>
