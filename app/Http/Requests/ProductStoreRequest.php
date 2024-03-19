<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryIds = $this->getCategoryArray();
        return [
            'name' => 'required|max:255',
            'category' => ['required', Rule::in($categoryIds)],
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'max:255',
        ];
    }
    /**
     * @return array<TKey,mixed>
     */
    private function getCategoryArray()
    {
        return Category::pluck('id')->all();
    }
}
