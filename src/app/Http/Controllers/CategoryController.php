<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = DB::table('categories')->get();

        return view('category.index', ["categories" => $categories]);
    }

    public function create() 
    {
        return view('category.create');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name'
        ]);

        DB::table('categories')->insert([
            'name' => $request['name'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/category');
    }

    public function show($id) 
    {   
        $category = Category::find($id);

        return view('category.detail', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name'
        ]);

        DB::table('categories')
            ->where('id', '=', $id)
            ->update(
                ['name'=> $request['name']]
            );

        return redirect('/category');
    }

    public function destroy($id) 
    {  
        DB::table('categories')->where('id', '=', $id)->delete();
        
        return redirect('/category');
    }
}
