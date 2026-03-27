<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Role;
use Model\Gender;
use Model\Department;
use Model\Discipline;
use Src\Validator\Validator;

class Site
{
    public function user(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }

        $user = User::find($request->id);

        if ($request->method === 'POST') {

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->email = $request->email;
            $user->date_birth = $request->date_birth;
            $user->registration_address = $request->registration_address;
            $user->gender_id = $request->gender_id;
            $user->role_id = $request->role_id;

            $user->save();

            $requestData = $request->all();
            $user->department()->sync($requestData['departments'] ?? []);
            $user->discipline()->sync($requestData['disciplines'] ?? []);

            app()->route->redirect('/users');
        }

        $roles = Role::all();
        $genders = Gender::all();
        $departments = Department::all();
        $disciplines = Discipline::all();

        $userDepartments = $user->department->pluck('department_id')->toArray();
        $userDisciplines = $user->discipline->pluck('discipline_id')->toArray();

        return new View('site.user', [
            'user' => $user,
            'roles' => $roles,
            'genders' => $genders,
            'departments' => $departments,
            'disciplines' => $disciplines,
            'userDepartments' => $userDepartments,
            'userDisciplines' => $userDisciplines
        ]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'Привет,']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'surname' => ['required'],
                'name' => ['required'],
                'patronymic' => [],
                'gender_id' => ['required'],
                'registration_address' => [],
                'email' => ['required', 'unique:users,email'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }


            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }

        $genders = Gender::all();

        return new View('site.signup', ['genders' => $genders]);


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

        $roles = Role::all();
        $genders = Gender::all();

        return new View('site.profile_edit', ['user' => $user, 'roles' => $roles, 'genders' => $genders]);
    }

    public function users(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

        if ($authUser->role_id == 1) {
            $users = User::where('user_id', '!=', $authUser->user_id)->get();
        } else {
            $users = User::where('role_id', '!=', 1)
                ->where('user_id', '!=', $authUser->user_id)
                ->get();
        }

        return (string)new View('site.users', ['users' => $users]);
    }

    public function userAdd(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

//        if ($authUser->role_id != 1 ) {
//            app()->route->redirect('/');
//            exit;
//        }

        if ($request->method === 'POST') {

            $user = new User();

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->login = $request->login;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->date_birth = $request->date_birth;
            $user->registration_address = $request->registration_address;
            $user->gender_id = $request->gender_id;
            $user->role_id = $request->role_id;

            $user->save();

            app()->route->redirect('/users');
        }

        $genders = Gender::all();
        $roles = Role::all();

        return (string)new View('site.user_add', [
            'genders' => $genders,
            'roles' => $roles
        ]);
    }

    public function departments(Request $request): string
    {

        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $departments = Department::all();
        return (string)new View('site.departments', ['departments' => $departments]);

    }

    public function department(Request $request): string
    {
        $departments = Department::where('department_id', $request->id)->get();
        return (new View())->render('site.department', ['departments' => $departments]);
    }

    public function departmentAdd(Request $request): string
    {

        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        if ($request->method === 'POST') {

            $department = new Department();

            $department->department_name = $request->department_name;
            $department->department_description = $request->department_description;

            $department->save();

            app()->route->redirect('/departments');
        }
        return (string)new View('site.department_add');
    }

    public function disciplines(Request $request): string{
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $disciplines = Discipline::all();
        return (string)new View('site.disciplines', ['disciplines' => $disciplines]);
    }
    public function discipline(Request $request): string
    {
        $disciplines = Discipline::where('discipline_id', $request->id)->get();
        return (new View())->render('site.discipline', ['disciplines' => $disciplines]);
    }

    public function disciplineAdd(Request $request): string
    {

        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        if ($request->method === 'POST') {

            $discipline = new Discipline();

            $discipline->discipline_name = $request->discipline_name;
            $discipline->discipline_description = $request->discipline_description;

            $discipline->save();

            app()->route->redirect('/disciplines');
        }
        return (string)new View('site.discipline_add');
    }

}
