<?php

namespace Controller;

use Model\Post;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class Api
{
    public function index(): void
    {
        $posts = Post::all()->toArray();

        (new View())->toJSON($posts);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    public function auth(Request $request): void
    {
        $credentials = [
            'login' => $request->all()['login'] ?? '',
            'password' => $request->all()['password'] ?? '',
        ];

        if (!Auth::attempt($credentials)) {
            (new View())->toJSON([
                'message' => 'Неправильные логин или пароль'
            ]);
        }

        (new View())->toJSON([
            'token' => Auth::generateApiToken()
        ]);
    }

    public function profile(): void
    {
        $user = Auth::user();
        if (!$user) {
            (new View())->toJSON(['message' => 'Пользователь не авторизован']);
        }

        (new View())->toJSON([
            'user_id' => $user->user_id,
            'surname' => $user->surname,
            'name' => $user->name,
            'patronymic' => $user->patronymic,
            'email' => $user->email,
            'login' => $user->login,
            'date_birth' => $user->date_birth,
            'registration_address' => $user->registration_address,
            'gender_id' => $user->gender_id,
            'role_id' => $user->role_id,
        ]);
    }
}
