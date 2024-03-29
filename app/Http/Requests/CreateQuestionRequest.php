<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CreateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!Auth::check()) {
            abort(403, trans('messages.login_please'));
        }

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
            'question' => 'required|string|max:255',
            'blocks' => 'required|array|max:10000',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        App::setLocale($this->lang);
        return [
            'question.required' => __('messages.question_required'),
            'question.string' => __('messages.question_string'),
            'question.max' => __('messages.question_max'),
            'blocks.required' => __('messages.blocks_required'),
            'blocks.max' => __('messages.blocks_max'),
            'captcha.required' => __('messages.captcha_required'),
            'captcha.captcha' => __('messages.captcha_captcha'),
        ];
    }
}
