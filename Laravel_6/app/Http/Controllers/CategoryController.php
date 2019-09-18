<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\{CreateCategoryRequest, UpdateCategoryRequest};
use Illuminate\Http\Request;
class CategoryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all();
    
    return response()->json($categories);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Category  $category
   * @param  App\Http\Requests\Categories\CreateCategoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateCategoryRequest $request, Category $category)
  {
    $request->createCategory($category);

    return response()->json([
        'message' => 'Categoria creada con éxito'], 201);

    // if (Student::where('id', $id)->exists()) {
    //         $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
    //         return response($student, 200);
    //       } else {
    //         return response()->json([
    //           "message" => "Student not found"
    //         ], 404);
    //       }

  }
  /**
   * Display the specified resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    return $category;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Category  $category
   * @param  App\Http\Requests\Categories\UpdateCategoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCategoryRequest $request, Category $category)
  {
    $request->updateCategory($category);

    return response()->json([
        'message' => 'Categoria actualizada con éxito']);
  }
  /**
   * Display a listing trashed of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function trashed()
  {
    $categories = Category::onlyTrashed()->get();

    return $categories;
  }
  /**
   * Delete the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function delete(Category $category)
  {
    $category->delete();

    return response()->json([
        'message' => 'Categoria eliminada con éxito']);
  }
  /**
   * Restore the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function restore(int $id)
  {
    $category = Category::onlyTrashed()->where('id', $id)->first();
    
    $category->restore();
    return response()->json([
        'message' => 'Categoria restaurada con éxito']);

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    $category = Category::onlyTrashed()->where('id',$id)->first();
    $category->forceDelete();

        return response()->json([
        'message' => 'Categoria eliminado con éxito']);
  }
}