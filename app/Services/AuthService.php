<?php

namespace App\Services;

use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{

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

        $token = $this->createToken($user->id);

        Session::put('token', $token->value);
        Session::put('user_id', $user->id);

        return $this->notice('200', 'Успешно!', [
            'user_id' => $user->id,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'surname' => $user->surname,
            'email' => $user->email,
            'role' => $user->role,
        ]);
    }

    public function createToken($userID)
    {
        $token = Token::where('user_id', $userID)
            ->first();

        if (!$token) {
            $token = Token::create([
                'value' => Str::random(60),
                'user_id' => $userID,
            ]);
        } else {
            $token->value = Str::random(60);
            $token->save();
        }

        return $token;
    }

    public function register($request)
    {
        $data = $request->validated();

        if ($data['role'] !== 'hr' && $data['role'] !== 'hunter') {
            return $this->notice('401', 'Неверная роль пользователя!');
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            $user = User::create($data);

            return true;
        }

        if ($user->status !== 'active' && $user->status !== 'blocked') {
            $user->update(['status' => 'active']);

            return true;
        }

        return $this->notice('403', 'Ваш аккаунт заблокирован!');
    }

    public function logout()
    {
        $sessionToken = Session::get('token') ?? null;

        if (!is_null($sessionToken)) {
            return $this->notice('401', 'Вы не авторизованы!');
        }

        $auth = Token::where('value', $sessionToken)->first();

        Session::forget('token');
        Session::forget('user_id');

        if (!is_null($auth)) {
            return $auth->delete();
        }

        return true;
    }

    private function notice($code, $message = null, $data = null)
    {
        return [
            [
                'message' => $message,
                'data' => $data,
            ],
            'code' => $code,
        ];
    }
}
