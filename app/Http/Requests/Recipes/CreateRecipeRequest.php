<?php

namespace App\Http\Requests\Recipes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CreateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        if (!Auth::check()) {
//            abort(403, trans('messages.login_please'));
//        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'ingredients.*.ingredient' => 'required',
            'ingredients.*.mass' => 'required|integer|max:3000',
            'blocks' => 'required|array',
//            'captcha' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        App::setLocale($this->lang);
        return [
            'title.required' => __('messages.question_required'),
            'title.string' => __('messages.question_string'),
            'ingredients.*.mass.required' => 'Поле грами не може бути пустим',
            'ingredients.*.mass.integer' => 'Поле грами має бути числом',
            'ingredients.*.mass.max' => 'Поле грами не може бути більше ніж 3000 грамів',
            'blocks.required' => __('messages.blocks_required'),
//            'blocks.max' => __('messages.blocks_max'),
        ];
    }

    public function prepareForValidation()
    {
        if (!$this->get('numberOfServings') || $this->get('numberOfServings') <= 0) {
            $this->merge([
                'numberOfServings' => 1
            ]);
        }
    }
}
