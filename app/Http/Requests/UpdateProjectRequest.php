<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
        $id = $this->route('project');

        return [
            'title' => ['required', 'string', Rule::unique('projects')->ignore($id)],
            'slug' => 'string',
            'description' => 'string|required',
            'project_url' => 'url:http,https|required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'tags' => 'string',
            'is_published' => 'string|required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'description.required' => 'Il campo decsrizione è obbligatorio',
            'project_url.required' => 'Il campo url progetto è obbligatorio',
            'image.image' => 'il file inserito non è un\'immagine',
        ];
    }
}
