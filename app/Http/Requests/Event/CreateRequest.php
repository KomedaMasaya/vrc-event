<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event_title' => 'required|max:25' ,
            'event_description' => 'required|max:2000',
            'event_end_date' => 'numeric|max:600',
            'event_start_date' => 'required|date|after:now'
        ];
 
        
    }

    public function userId(): int
    {
        return $this->user()->id;
    }

    public function event_title(): string
    {
        return $this->input('event_title');
    }

    public function event_description(): string
    {
        return $this->input('event_description');
    }

    public function supported_devices(): bool
    {
        return $this->input('supported_devices');
    }

    public function event_end_date(): int
    {
        return $this->input('event_end_date');
    }

    public function event_start_date(): string
    {
        return $this->input('event_start_date');
    }

}
