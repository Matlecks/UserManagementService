@extends('main.index')

@section('content')
    <section class="main_wrapper d-flex mt-4 gap-3">
        <div class="menu col-2">
            <a href="{{ route('user.index') }}"
                class="menu_point shadow-sm bg-white rounded p-3 text-decoration-none w-100 d-block">Пользователи</a>
        </div>
        <div class="content_wrapper col-10 shadow-sm bg-white rounded p-5">

            <div class="button_group d-flex justify-content-end mb-4">
                @if (isset($message))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <a href="{{ route('user.create') }}" class="btn btn-outline-success">Создать пользователя</a>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Создан</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="backgroud:none; border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6C757DFF"
                                        class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('user.edit', $id = $user->id) }}">Изменить</a></li>
                                    <li>
                                        <form action="{{ route('user.destroy', $id = $user->id) }}" method="POST"
                                            class="dropdown-item">
                                            @csrf
                                            <button type="submit"
                                                style="border:none; background: none; padding: 0px;">Удалить</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
