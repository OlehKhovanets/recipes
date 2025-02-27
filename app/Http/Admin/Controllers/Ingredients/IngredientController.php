<?php

namespace App\Http\Admin\Controllers\Ingredients;

use App\Http\Admin\Controllers\Controller;
use App\Http\Requests\Branches\CreateRequest;
use App\Http\Requests\Branches\UpdateRequest;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        return view('admin.ingredients.index')->with([
            'ingredients' => Ingredient::query()->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.ingredients.create')
            ->with(['ingredients' => Ingredient::query()->get()]);
    }

    public function store(CreateRequest $request)
    {
        $branch = Ingredient::query()->create([
            'name' => $request->get('name'),
            'calories_per_gram' => $request->get('calories_per_gram'),
            'slug' => strtolower(str_replace(' ', '-', $request->get('name'))),
        ]);

        notify()->success('Інгредієнт додано успішно', 'Інгредієнт створений!');
        return redirect(route('admin.ingredients'));
    }

    public function edit(int $id)
    {
        return view('admin.ingredients.edit')
            ->with([
                'ingredient' => Ingredient::query()->where('id', $id)->firstOrFail()
            ]);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $branch = Ingredient::query()->where('id', $id)->firstOrFail();

        $branch->name = $request->get('name');
        $branch->calories_per_gram = $request->get('calories_per_gram');
        $branch->slug = strtolower(str_replace(' ', '-', $request->get('name')));
        $branch->save();

        notify()->success('Інгредієнт оновлено успішно', 'Інгредієнт оновлено!');
        return redirect(route('admin.ingredients'));
    }

//    private function uploadIcon($request, $branch)
//    {
//        if ($request->hasFile('icon')) {
//            $file = $request->file('icon');
//            $path = 'web/ingredients-icons';
//            $fileName = $file->getClientOriginalName();
//            $destinationPath = public_path($path);
//            $file->move($destinationPath, $fileName);
//
//            $iconPath = sprintf('/%s/%s', $path, $fileName);
//            $branch->icon_path = $iconPath;
//            $branch->save();
//        }
//    }
}
