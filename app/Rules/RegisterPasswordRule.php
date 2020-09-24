<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RegisterPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $pass ;
    protected $confirm ;
    public function __construct($pass , $confirm)
    {
        $this->pass = $pass ;
        $this->confirm = $confirm ;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->pass == $this->confirm;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
