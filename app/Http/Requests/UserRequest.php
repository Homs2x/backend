<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        if(request()->routeIs('user.login')){
            return [
                        'email'=>'required|string|max:255',
                        'password'=>'required|min:8',
            ];
        }
        else if(request()->routeIS('user.image')){
            return [
                'image' => 'required|image|mimes:jpg,bmp,png|max:2048',
            ];
        }

        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255|email',
            'password'=>'required|min:8',
        ];
    }
}
