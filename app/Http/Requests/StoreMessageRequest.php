<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Check that the user belongs to the thread.
        return $this->user()->threads()->contains($this->get('thread_id'))->count() > 0;

        // In the future other checks can be added into here
        // Things like checking if a user is on another users block list.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thread_id' => 'required|exists:threads,id',
            'user_id'   => 'required|exists:users,id',
            'content'   => 'required',
        ];
    }
}
