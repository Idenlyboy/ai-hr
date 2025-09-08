<?php

namespace App\Services;

use App\Models\Token;
use App\Models\User;
use App\NoticeTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{
    use NoticeTrait;

    /**
     * Login user logic
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function login($request)
    {
        $data = $request->validated();

        $email = $data['email'];
        $password = $data['password'];

        $user = User::where(function ($query) use ($email) {
            $query->where('email', $email);
        })
            ->where('status', 'active')
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return $this->notice('401', 'Неверная почта или пароль');
        }

        $token = $this->createToken($user);

        Session::put('role', $user->role);
        Session::put('token', $token->value);
        Session::put('user_id', $user->id);

        return $this->notice('200', 'Успешно!', [
            'user_id' => $user->id,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'surname' => $user->surname,
            'email' => $user->email,
            'role' => $user->role,
            'token' => $token->value,
        ]);
    }

    /**
     * Register hunter/hr logic
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function register($request)
    {
        $data = $request->validated();

        if ($data['role'] !== 'hr' && $data['role'] !== 'hunter') {
            return $this->notice('401', 'Неверная роль пользователя!');
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            $user = User::create($data);

            return $this->notice('200', 'Успешно!');
        }

        if ($user->status !== 'active' && $user->status !== 'blocked') {
            $user->update(['status' => 'active']);

            return $this->notice('200', 'Успешно!');
        }

        return $this->notice('403', 'Ваш аккаунт заблокирован!');
    }

    /**
     * Logout user logic
     * @return mixed|bool
     */
    public function logout()
    {
        $sessionToken = Session::get('token') ?? null;

        Session::forget('token');
        Session::forget('role');
        Session::forget('user_id');

        $auth = Token::where('value', $sessionToken)->first();

        if (!is_null($auth)) {
            $auth->delete();
            return $this->notice('200', 'Успешно!');
        }

        return $this->notice('200', 'Успешно!');
    }

    /**
     * Create auth Token logic
     * @param mixed $userID
     * @return Token
     */
    private function createToken($user)
    {
        $token = Token::where('user_id', $user->id)
            ->first();

        if (!$token) {
            $token = Token::create([
                'value' => Str::random(60),
                'role' => $user->role,
                'user_id' => $user->id,
            ]);
        } else {
            $token->value = Str::random(60);
            $token->save();
        }

        return $token;
    }
}
