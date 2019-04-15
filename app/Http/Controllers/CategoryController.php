<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $category = Category::latest()->get();
        return view('category/index',['yangdikirim' =>$category]);
        //return response()->json([
        //    'data' => $category ,
        //    'pesan'=> 'sukses',
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            'category_name' => "required|min:4|Unique:categories",
        ])->validate();
        $category_save =  Category::create([
            'category_name' => $request->category_name,
            'slug'          => str_slug($request->category_name)
        ]);

        return redirect()->
            route('category.index');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id_category)
    {
        $category = Category::findOrFail($id_category);        
        if ($category !==null){
            $posts = Article::where('id_category',$id_category)->get();

            return $posts;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorFail($id);
        return view('Category/edit',['yangdikirim'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $slug = str_slug($request->get('category_name'));
        $category ->category_name = $request->get('category_name');
        $category ->slug = $slug;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('category.index');
        }else {
            $category -> Delete();
            return redirect()->route('category.index');
        }
        
    }
}
