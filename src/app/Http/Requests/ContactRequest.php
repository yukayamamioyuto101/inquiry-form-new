<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'first_name'  => 'required',
            'last_name'   => 'required',
            'gender'      => 'required|in:male,female,other',
            'email'       => 'required|email',
            'tel'         => 'required',
            'address'     => 'required',
            'building'    => 'nullable',
            'detail'      => 'required|max:120', //
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'お問い合わせの種類を選んでください',
            'first_name.required'  => '苗字を入力してください',
            'last_name.required'   => '名前を入力してください',
            'gender.required'      => '性別を選んでください',
            'email.required'       => 'メールアドレスを入力してください',
            'email.email'       => 'メールアドレスをメール形式で入力してください',
            'tel.required'         => '電話番号を入力してください',
            'address.required'     => '住所を入力してください',
            'detail.required'      => 'お問い合わせ内容を入力してください',
            'detail.max' =>'お問い合わせ内容を120文字以内で入力してください',
        ];
    }


}