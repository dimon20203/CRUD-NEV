<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed',
        'surname' => 'nullable|string',
        'patronymic' => 'nullable|string',
        'age' => 'nullable|integer',
        'address' => 'nullable|string',
        'gender' => 'nullable|string', // или 'integer', в зависимости от вашей логики
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Пожалуйста, укажите ваше имя.',
        'name.string' => 'Имя может содержать только буквы.',
        'email.required' => 'Пожалуйста, укажите ваш адрес электронной почты.',
        'email.string' => 'Адрес электронной почты должен быть строкой.',
        'email.email' => 'Пожалуйста, укажите корректный адрес электронной почты.',
        'email.unique' => 'Этот адрес электронной почты уже используется.',
        'password.required' => 'Пожалуйста, введите пароль.',
        'password.string' => 'Пароль должен быть строкой.',
        'password.min' => 'Пароль должен содержать минимум :min символов.',
        'password.max' => 'Пароль не может быть длиннее :max символов.',
        'surname.string' => 'Фамилия может содержать только буквы.',
        'patronymic.string' => 'Отчество может содержать только буквы.',
        'age.integer' => 'Возраст должен быть целым числом.',
        'address.string' => 'Адрес должен быть строкой.',
        'gender.string' => 'Пол должен быть строкой.', // или 'integer', в зависимости от вашей логики
    ];
}

}
