<?php

namespace Koraycicekciogullari\HydroSocial\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaStoreRequest extends FormRequest
{

    /**
     * @return false
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'icon'      =>  ['required'],
            'address'   =>  ['required'],
        ];
    }
}
