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
            exit;
        }

        $authUser = Auth::user();
        if ($authUser->role_id == 3) {
            app()->route->redirect('/users');
            exit;
        }

        $user = User::find($request->id);

        if (!$user) {
            app()->route->redirect('/users');
            exit;
        }

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
                'password' => ['required', 'min:6'],
                'date_birth' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'min' => 'Поле :field должно быть не меньше минимальной длины'
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
            exit;
        }

        $user = Auth::user();
        $avatarUrl = '';
        $avatarDir = dirname(__DIR__, 2) . '/public/uploads/avatars';
        $avatarExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($avatarExtensions as $extension) {
            $avatarPath = $avatarDir . "/user_{$user->user_id}.{$extension}";
            if (is_file($avatarPath)) {
                $avatarUrl = "/uploads/avatars/user_{$user->user_id}.{$extension}?v=" . (filemtime($avatarPath) ?: time());
                break;
            }
        }

        return new View('site.profile', [
            'avatarUrl' => $avatarUrl
        ]);
    }

    public function profileEdit(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $user = Auth::user();
        $message = '';
        $avatarUrl = '';
        $avatarDir = dirname(__DIR__, 2) . '/public/uploads/avatars';
        $avatarExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($avatarExtensions as $extension) {
            $avatarPath = $avatarDir . "/user_{$user->user_id}.{$extension}";
            if (is_file($avatarPath)) {
                $avatarUrl = "/uploads/avatars/user_{$user->user_id}.{$extension}?v=" . (filemtime($avatarPath) ?: time());
                break;
            }
        }

        if ($request->method === 'POST') {

            $user->surname = $request->surname;
            $user->name = $request->name;
            $user->patronymic = $request->patronymic;
            $user->email = $request->email;
            $user->date_birth = $request->date_birth;
            $user->registration_address = $request->registration_address;
            $user->gender_id = $request->gender_id;

            if (!empty($_FILES['avatar']) && is_array($_FILES['avatar'])) {
                $avatar = $_FILES['avatar'];
                $avatarError = $avatar['error'] ?? UPLOAD_ERR_NO_FILE;

                if ($avatarError != UPLOAD_ERR_NO_FILE) {
                    if ($avatarError != UPLOAD_ERR_OK) {
                        $message = 'Ошибка загрузки файла';
                    } elseif (($avatar['size'] ?? 0) > 2097152) {
                        $message = 'Размер файла больше 2 МБ';
                    } elseif (empty($avatar['tmp_name']) || !is_uploaded_file($avatar['tmp_name'])) {
                        $message = 'Некорректный файл';
                    } else {
                        $mimeType = mime_content_type($avatar['tmp_name']) ?: '';
                        $newExtension = '';

                        if ($mimeType == 'image/jpeg') {
                            $newExtension = 'jpg';
                        } elseif ($mimeType == 'image/png') {
                            $newExtension = 'png';
                        } elseif ($mimeType == 'image/webp') {
                            $newExtension = 'webp';
                        } else {
                            $message = 'Можно загрузить только JPG, PNG или WEBP';
                        }

                        if ($message === '') {
                            if (!is_dir($avatarDir)) {
                                mkdir($avatarDir, 0755, true);
                            }

                            if (!is_dir($avatarDir)) {
                                $message = 'Не удалось создать папку для аватарок';
                            } else {
                                $newAvatarPath = $avatarDir . "/user_{$user->user_id}.{$newExtension}";

                                if (!move_uploaded_file($avatar['tmp_name'], $newAvatarPath)) {
                                    $message = 'Не удалось сохранить аватарку';
                                } else {
                                    foreach ($avatarExtensions as $extension) {
                                        $oldAvatarPath = $avatarDir . "/user_{$user->user_id}.{$extension}";
                                        if ($oldAvatarPath != $newAvatarPath && is_file($oldAvatarPath)) {
                                            @unlink($oldAvatarPath);
                                        }
                                    }
                                    $avatarUrl = "/uploads/avatars/user_{$user->user_id}.{$newExtension}?v=" . time();
                                }
                            }
                        }
                    }
                }
            }

            if ($message === '') {
                $user->save();

                app()->route->redirect('/profile');
            }
        }

        $roles = Role::all();
        $genders = Gender::all();

        return new View('site.profile_edit', [
            'user' => $user,
            'roles' => $roles,
            'genders' => $genders,
            'avatarUrl' => $avatarUrl,
            'message' => $message
        ]);
    }

    public function users(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();
        $query = $request->all()['search'] ?? '';

        if (!empty($query)) {
            if ($authUser->role_id == 1) {
                $users = User::where('user_id', '!=', $authUser->user_id)
                    ->where(function ($searchQuery) use ($query) {
                        $searchQuery->where('surname', 'LIKE', "%$query%")
                            ->orWhere('name', 'LIKE', "%$query%")
                            ->orWhere('patronymic', 'LIKE', "%$query%")
                            ->orWhere('login', 'LIKE', "%$query%")
                            ->orWhere('email', 'LIKE', "%$query%")
                            ->orWhereHas('department', function ($departmentQuery) use ($query) {
                                $departmentQuery->where('department_name', 'LIKE', "%$query%");
                            })
                            ->orWhereHas('discipline', function ($disciplineQuery) use ($query) {
                                $disciplineQuery->where('discipline_name', 'LIKE', "%$query%");
                            });
                    })
                    ->get();
            } else {
                $users = User::where('role_id', '!=', 1)
                    ->where('user_id', '!=', $authUser->user_id)
                    ->where(function ($searchQuery) use ($query) {
                        $searchQuery->where('surname', 'LIKE', "%$query%")
                            ->orWhere('name', 'LIKE', "%$query%")
                            ->orWhere('patronymic', 'LIKE', "%$query%")
                            ->orWhere('login', 'LIKE', "%$query%")
                            ->orWhere('email', 'LIKE', "%$query%")
                            ->orWhereHas('department', function ($departmentQuery) use ($query) {
                                $departmentQuery->where('department_name', 'LIKE', "%$query%");
                            })
                            ->orWhereHas('discipline', function ($disciplineQuery) use ($query) {
                                $disciplineQuery->where('discipline_name', 'LIKE', "%$query%");
                            });
                    })
                    ->get();
            }
        } else {
            if ($authUser->role_id == 1) {
                $users = User::where('user_id', '!=', $authUser->user_id)->get();
            } else {
                $users = User::where('role_id', '!=', 1)
                    ->where('user_id', '!=', $authUser->user_id)
                    ->get();
            }
        }

        return (string)new View('site.users', [
            'users' => $users,
            'search' => $query
        ]);
    }

    public function userAdd(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();

        if ($authUser->role_id == 3 ) {
            app()->route->redirect('/users');
            exit;
        }

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

        $query = $request->all()['search'] ?? '';

        if (!empty($query)) {
            $departments = Department::where('department_name', 'LIKE', "%$query%")
                ->orWhere('department_description', 'LIKE', "%$query%")
                ->orWhereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where('surname', 'LIKE', "%$query%")
                        ->orWhere('name', 'LIKE', "%$query%")
                        ->orWhere('patronymic', 'LIKE', "%$query%");
                })
                ->get();
        } else {
            $departments = Department::all();
        }

        return (string)new View('site.departments', [
            'departments' => $departments,
            'search' => $query
        ]);

    }

    public function department(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();
        if ($authUser->role_id == 3) {
            app()->route->redirect('/departments');
            exit;
        }

        $department = Department::find($request->id);

        if (!$department) {
            app()->route->redirect('/departments');
            exit;
        }

        if ($request->method === 'POST') {
            $department->department_name = $request->department_name;
            $department->department_description = $request->department_description;
            $department->save();

            app()->route->redirect('/departments');
        }

        return (string)new View('site.department', ['department' => $department]);
    }

    public function departmentAdd(Request $request): string
    {

        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();
        if ($authUser->role_id == 3) {
            app()->route->redirect('/departments');
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

        $query = $request->all()['search'] ?? '';

        if (!empty($query)) {
            $disciplines = Discipline::where('discipline_name', 'LIKE', "%$query%")
                ->orWhere('discipline_description', 'LIKE', "%$query%")
                ->orWhereHas('user', function ($userQuery) use ($query) {
                    $userQuery->where('surname', 'LIKE', "%$query%")
                        ->orWhere('name', 'LIKE', "%$query%")
                        ->orWhere('patronymic', 'LIKE', "%$query%");
                })
                ->get();
        } else {
            $disciplines = Discipline::all();
        }

        return (string)new View('site.disciplines', [
            'disciplines' => $disciplines,
            'search' => $query
        ]);
    }
    public function discipline(Request $request): string
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();
        if ($authUser->role_id == 3) {
            app()->route->redirect('/disciplines');
            exit;
        }

        $discipline = Discipline::find($request->id);

        if (!$discipline) {
            app()->route->redirect('/disciplines');
            exit;
        }

        if ($request->method === 'POST') {
            $discipline->discipline_name = $request->discipline_name;
            $discipline->discipline_description = $request->discipline_description;
            $discipline->save();

            app()->route->redirect('/disciplines');
        }

        return (string)new View('site.discipline', ['discipline' => $discipline]);
    }

    public function disciplineAdd(Request $request): string
    {

        if (!Auth::check()) {
            app()->route->redirect('/login');
            exit;
        }

        $authUser = Auth::user();
        if ($authUser->role_id == 3) {
            app()->route->redirect('/disciplines');
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
