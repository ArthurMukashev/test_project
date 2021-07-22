<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SnilsCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace("-", "", $value);
        $value = str_replace(" ","",$value);
        $x = mb_substr($value, 0, 9);
        $y = mb_substr($value, 9, 2);
        if (preg_match_all('/(.)\1{2}/', $value)) {
            return false;
        }
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int)$x{$i} * (9 - $i);
        }
        $check_digit = 0;
        if ($sum < 100) {
            $check_digit = $sum;
        } elseif ($sum > 101) {
            $check_digit = $sum % 101;
            if ($check_digit === 100) {
                $check_digit = 0;
            }
        }
        $c = ($check_digit === (int)$y);
        return $c;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Некорректный номер СНИЛС.';
    }
}
