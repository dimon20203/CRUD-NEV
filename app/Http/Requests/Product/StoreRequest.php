<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    return [
        'title' => 'required|string',
        'description' => 'required',
        'content' => 'required',
        'preview_image' => 'required',
        'price' => 'required|integer',
        'old_price'=> 'required|integer',
        'count' => 'required',
        'is_published' => 'nullable',
        'category_id' => 'nullable',
        'group_id' => 'nullable',
        'tags' => 'nullable|array',
        'colors' => 'nullable|array',
        'product_images' => 'nullable|array',
    ];
}

    public function messages(): array
    {
        return [
            'title.required' => 'Пожалуйста, укажите заголовок продукта.',
            'title.string' => 'Заголовок продукта должен быть строкой.',

            'description.required' => 'Пожалуйста, укажите описание продукта.',
            'description.string' => 'Описание продукта должно быть строкой.',

            'content.required' => 'Пожалуйста, укажите содержимое продукта.',
            'content.string' => 'Содержимое продукта должно быть строкой.',

            'preview_image.required' => 'Пожалуйста, укажите изображение предпросмотра продукта.',
            'preview_image.string' => 'Изображение предпросмотра продукта должно быть строкой.',

            'price.required' => 'Пожалуйста, укажите цену продукта.',
            'price.integer' => 'Цена продукта должна быть целым числом.',


            'old_price.required' => 'Пожалуйста, укажите цену продукта.',
            'old_price.integer' => 'Цена продукта должна быть целым числом.',

            'count.required' => 'Пожалуйста, укажите количество продукта.',
            'count.integer' => 'Количество продукта должно быть целым числом.',

            'is_published.boolean' => 'Поле "Опубликовано" должно иметь значение true или false.',

            'category_id.nullable' => 'Поле "Категория" должно быть либо пустым, либо содержать существующую категорию.',
            'group_id.nullable' => 'Поле "Групы" должно быть либо пустым, либо содержать существующую групу.',
            'tags.nullable' => 'Пожалуйста, укажите тег продукта.',
            'colors.nullable' => 'Пожалуйста, укажите цвет продукта.',
            'product_images.nullable' => 'Пожалуйста, укажите картинку.',
        ];
    }


}
