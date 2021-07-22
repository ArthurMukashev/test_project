<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\cyrillic;
use App\Rules\Spaces;
use App\Rules\SnilsCheck;

class Rules extends FormRequest
{
    public function rules()
    {
        return [
            'surname' => ['required', new cyrillic, new Spaces],
            'name' => ['required', new cyrillic, new Spaces],
            'otch' => ['required', new cyrillic, new Spaces],
            'birthdate' => 'required',
            'snils' => ['required', new SnilsCheck],
            'polis' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'otch' => 'Отчество'
        ];
    }

    public function messages()
    {
        return [
            'surname.required' => 'Не введена фамилия',
            'name.required' => 'Не введено имя',
            'otch.required' => 'Не введено отчество',
            'birthdate.required' => 'Не введена дата рождения',
            'snils.required' => 'Не введен номер СНИЛС',
            'snils.digits' => 'Номер СНИЛС должен состоять только из цифр и быть 11 значным',
            'polis.required' => 'Не введен номер полиса ОМС',
            'polis.digits' => 'Номер полиса ОМС должен состоять только из цифр и быть 16 значным'
        ];
    }
}
