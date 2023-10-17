<?php
    
namespace App\Http\Controllers;
    
use App\Models\Article;
use Illuminate\Http\Request;
    
class ArticleController extends Controller
{ 
    function __construct()
    {
        $this->middleware('permission:View Article|Add Article|Edit Article|Delete Article', ['only' => ['index']]);
         $this->middleware('permission:Add Article', ['only' => ['create','store']]);
         $this->middleware('permission:Edit Article', ['only' => ['edit','update']]);
         $this->middleware('permission:Delete Article', ['only' => ['destroy']]);
    }

    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('articles.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Article::create($request->all());
    
        return redirect()->route('articles.index')
                        ->with('success','Article created successfully.');
    }
    
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
    
    public function update(Request $request, Article $article)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $article->update($request->all());
    
        return redirect()->route('articles.index')
                        ->with('success','Article updated successfully');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
    
        return redirect()->route('articles.index')
                        ->with('success','Article deleted successfully');
    }
}