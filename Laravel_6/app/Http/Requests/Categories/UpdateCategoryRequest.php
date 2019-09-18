<?php
namespace App\Http\Requests\Categories;
use App\Category;
use Illuminate\Foundation\Http\FormRequest;
class UpdateCategoryRequest extends FormRequest
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
      'name' => 'required|string'
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'El nombre es obligatorio'
    ];
  }
  public function updateCategory(Category $category)
  {
    $category->fill([
      'name' => $this->name,
      'description' => $this->description
    ]);
    $category->save();
  }
}
