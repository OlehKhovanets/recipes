<?php

namespace App\Http\Admin\Controllers\Recipes;

use App\Http\Admin\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Language;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::query()->with('ingredients')
            ->orderBy('id', 'desc')->paginate(10);

        $recipes->appends(['branch' => request()->input('ingredients')]);

        return view('admin.recipes.index')->with([
            'recipes' => $recipes,
            'ingredients' => Ingredient::query()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.recipes.create')->with([
            'ingredients' => Ingredient::query()->get()
        ]);
    }

    public function edit($id)
    {
        $recipe = Recipe::query()
            ->where('id', $id)
            ->firstOrFail();
//        $branches = Ingredient::query()->get();

        return view('admin.recipes.edit')->with([
            'recipe' => $recipe,
            'test' => $recipe->description,
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        $recipe = Recipe::query()
            ->where('id', $id)
            ->firstOrFail();
        $recipe->delete();

        Session::flash('message', 'Рецепт видалено успішно!');

//        notify()->success('Рецепт було видалено і поверненню не підлягає', 'Рецепт видалено!');
        return redirect(route('admin.recipes.index'));
    }

    public function uploadImage(Request $request, $id)
    {
        $recipe = Recipe::query()->where('id', $id)->firstOrFail();

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = 'web/recipes/images';
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $fileName);

            $imagePath = sprintf('/%s/%s', $path, $fileName);
            $recipe->image_path = $imagePath;
            $recipe->save();
        }

        return redirect('/admin/recipe-builder');
    }
}
