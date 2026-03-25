<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Role;
use Model\Gender;

class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'Привет,']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/login');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }

    public function profile(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
        return new View('site.profile');
    }

    public function profileEdit(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }

        $user = Auth::user();

        if ($request->method === 'POST') {

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->email = $request->email;
            $user->date_birth = $request->date_birth;
            $user->registration_address = $request->registration_address;
            $user->gender_id = $request->gender_id;

            $user->save();

            app()->route->redirect('/profile');
        }

        return new View('site.profile_edit', ['user' => $user]);
    }

    public function users(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

        if ($authUser->role_id != 1) {
            app()->route->redirect('/');
            exit;
        }

        if ($request->method === 'POST') {

            $user = User::find($request->id);

            if ($user) {
                $user->surname = $request->surname;
                $user->name = $request->name;
                $user->patronymic = $request->patronymic;
                $user->date_birth = $request->date_birth;
                $user->registration_address = $request->registration_address;
                $user->gender_id = $request->gender_id;
                $user->login = $request->login;
                $user->email = $request->email;
                $user->role_id = $request->role_id;

                $user->save();
            }

            app()->route->redirect('/users');
            exit;
        }

        $users = User::all();
        return (string) new View('site.users', ['users' => $users]);
    }

    public function userAdd(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

        if ($authUser->role_id != 1) {
            app()->route->redirect('/');
            exit;
        }

        if ($request->method === 'POST') {

            $user = new User();

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->login = $request->login;
            $user->email = $request->email;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->date_birth = $request->date_birth;
            $user->registration_address = $request->registration_address;
            $user->gender_id = $request->gender_id;
            $user->role_id = $request->role_id;

            $user->save();

            app()->route->redirect('/users');
        }

        $roles = Role::all();
        $genders = Gender::all();

        return (string)new View('site.user_add', [
            'roles' => $roles,
            'genders' => $genders
        ]);
    }
}