<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Показывает страницу со списком пользователей.
     */
    public function getList()
    {
        $users = User::all();
        return view('admin.auth.list', compact('users'));
    }

    /**
     * Show the application registration form.
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }


    /**
     * Обработчик запроса на создание пользователя
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->create($request->all());
        return redirect()->route('admin.users.edit', ['user' => $user])
            ->with('success', 'Пользователь успешно создан.');
    }

    /**
     * Показывает страницу редактирования пользователя
     */
    public function getEdit(User $user)
    {
        return view('admin.auth.edit', compact('user'));
    }

    /**
     * Обработчик запроса на редактирование данных пользователя
     */
    public function postEdit(User $user, Request $request)
    {
        // Валидация
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'confirmed|min:6',
        ]);
        // Изменяем данные и сохраняем
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password'))
        {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect()->back()->with('success', 'Пользователь успешно отредактирован.');

    }

    /**
     * Удаление пользователя
     */
    public function getDelete(User $user)
    {
        // TODO: запрет удаления самого себя
        $user->delete();

        return redirect()->back()->with('success', 'Пользователь успешно удалён.');
    }
}
