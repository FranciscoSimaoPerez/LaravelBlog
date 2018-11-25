<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Articles";
        
        // dados do pedido get
        $search = \Request::get('search');
        $sort = \Request::get('sort');
        
        //Ordenação default
        if($sort == null){
            $sort = 'desc';
        }

        if($search == null){
            $articles = Article::orderBy('created_at', $sort)->paginate(5);
        } else {
            $articles = Article::orderBy('created_at', $sort)
                            ->where('title', 'like', '%'.$search.'%')
                            ->orWhere('content', 'like', '%'.$search.'%')
                            ->paginate(5);
        }
       
        return view('pages.articles.index')->with('articles', $articles)
                                           ->with('title', $title);
    }

    /**
     * Display a search listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        $title = "Featured Articles";

        $articles = Article::orderBy('created_at','desc')
                            ->where('featured', '=', 1)
                            ->paginate(5);
        return view('pages.articles.index')->with('articles', $articles)
                                           ->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Articles";
        return view('pages.articles.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'nullable',
            'image' => 'image|nullable|max:2000'
        ]);

        // File Upload
        if($request->hasfile('img-upload')){
            // Recebe o nome do ficheiro e extensão
            $fileNameWithExt = $request->file('img-upload')->getClientOriginalName();
            // obtem o nome do ficheiro
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // obtem a extensão
            $extension = $request->file('img-upload')->getClientOriginalExtension();
            // criado o nome do ficheiro a ser guardado
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // caminho onde o ficheiro será guardado
            $path = $request->file('img-upload')->storeAs('public/cover_images',$fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Article
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->img = $fileNameToStore;
        if(request('featured') == 'on'){
            $article->featured=1;
        } else {
            $article->featured=0;
        }
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $title = $article->title;
        return view('pages.articles.show')->with('article', $article)
                                          ->with('title', $title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $title = "Edit - " . $article->title;
        return view('pages.articles.edit')->with('article', $article)
                                          ->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' =>'required|min:3',
            'content' =>'nullable'
        ]);

        if($request->hasfile('img-upload')){
            // Recebe o nome do ficheiro e extensão
            $fileNameWithExt = $request->file('img-upload')->getClientOriginalName();
            // obtem o nome do ficheiro
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // obtem a extensão
            $extension = $request->file('img-upload')->getClientOriginalExtension();
            // criado o nome do ficheiro a ser guardado
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // caminho onde o ficheiro será guardado
            $path = $request->file('img-upload')->storeAs('public/cover_images',$fileNameToStore);
        }

        //Update Article
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if(request('featured') == 'on'){
            $article->featured=1;
        } else {
            $article->featured=0;
        }
        if($request->hasFile('img-upload')){
            $article->img = $fileNameToStore;
        }
        $article->save();
        return redirect()->route('articles.show',[$article->id])->with('success', 'Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->img != 'noimage.jpg'){
            //Eliminar imagem 
            Storage::delete('public/cover_images/'.$article->img);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article Deleted');
    }
}
