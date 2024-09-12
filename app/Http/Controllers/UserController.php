<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
        ]);

        $user = User::find($id);
        $user->update($validated);

        $message = "Пользователь отредактирован";
        return redirect()->route('user.index')->with('message', value: $message);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)/* : JsonResponse|mixed */
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
        ]);

        $user = User::create($validated);

        //генерим ивент
        event(new UserCreated($user));

        //отправляем в очередь
        //dispatch(new UserCreated($user));

        Http::post('http://taskmanagementservice.ru/api/user-created', [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);


        $message = "Задача создана";
        return redirect()->route('user.index')->with('message', value: $message);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        $message = "Задача удалена";
        return redirect()->route('user.index')->with('message', value: $message);
    }

    public function give_all_users()
    {
        $users = User::all();

        return response()->json([
            'status' => 200,
            'data' => $users,
        ]);
    }


}
