<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'product_images' => 'nullable|array',

            'title' => 'required|string',
            'description' => 'required',
            'content' => 'required',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
            'old_price'=> 'required|integer',
            'count' => 'required|integer',
            'is_published' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories,id',
            'group_id' => 'nullable|exists:groups,id',
            'tags' => 'nullable|array|exists:tags,id',
            'colors' => 'nullable|array|exists:colors,id',
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

            'preview_image.image' => 'Изображение предпросмотра продукта должно быть изображением.',
            'preview_image.mimes' => 'Формат изображения должен быть jpeg, png, jpg, gif или svg.',
            'preview_image.max' => 'Размер изображения не должен превышать 2048 КБ.',

            'product_images.image' => 'Изображение предпросмотра продукта должно быть изображением.',
            'product_images.mimes' => 'Формат изображения должен быть jpeg, png, jpg, gif или svg.',
            'product_images.max' => 'Размер изображения не должен превышать 2048 КБ.',


            'price.required' => 'Пожалуйста, укажите цену продукта.',
            'price.integer' => 'Цена продукта должна быть целым числом.',

            'old_price.required' => 'Пожалуйста, укажите цену продукта.',
            'old_price.integer' => 'Цена продукта должна быть целым числом.',

            'count.required' => 'Пожалуйста, укажите количество продукта.',
            'count.integer' => 'Количество продукта должно быть целым числом.',

            'is_published.boolean' => 'Поле "Опубликовано" должно иметь значение true или false.',

            'group_id.nullable' => 'Поле "Категория" должно быть либо пустым, либо содержать существующую категорию.',
            'group_id.exists' => 'Выбранная категория не существует.',

            'category_id.nullable' => 'Поле "Категория" должно быть либо пустым, либо содержать существующую категорию.',
            'category_id.exists' => 'Выбранная категория не существует.',


            'tags.exists' => 'Указанный тег не существует.',
            'colors.exists' => 'Указанный цвет не существует.',

        ];
    }
}
