<?php

namespace App\Http\Controllers;

/* Слушатель */

use App\Events\UserCreated;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/* Реквесты */
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;

/* Для тайпхинтов */
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit($id): View
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, int  $id): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::find($id);
        $user->update($validated);

        $message = "Пользователь отредактирован";
        return redirect()->route('user.index')->with('message', $message);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create($validated);

        //генерим ивент
        event(new UserCreated($user));

        // отправляем запрос на сервис task
        Http::post('http://taskmanagementservice.ru/api/user-created', [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);


        $message = "Задача создана";
        return redirect()->route('user.index')->with('message', $message);
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::find($id);

        $user->delete();

        $message = "Задача удалена";
        return redirect()->route('user.index')->with('message', value: $message);
    }

    public function give_all_users(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'status' => 200,
            'data' => $users,
        ]);
    }
}
