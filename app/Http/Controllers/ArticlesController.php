<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

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

        // o tipo de ordenação é guardado na sessão
        $order = $request->session()->get('order', 'desc');
        
        // dados do pedido get
        $search = \Request::get('search');

        if($search == null){
            $articles = Article::orderBy('created_at', $order)->paginate(5);
        } else {
            $articles = Article::orderBy('created_at', $order)
                            ->where('title', 'like', '% '.$search.' %')
                            ->orWhere('content', 'like', '% '.$search.' %')
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
            'title' =>'required|min:3',
            'content' =>'nullable'
        ]);

        //Create Article
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
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

        //Update Article
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if(request('featured') == 'on'){
            $article->featured=1;
        } else {
            $article->featured=0;
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
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article Deleted');
    }
}
