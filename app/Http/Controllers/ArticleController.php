<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function category($id)
    {
        // Handle category logic here
        return view('article.category', compact('id'));
    }

    public function single($id)
    {
        // Handle single article logic here
        return view('article.single', compact('id'));
    }

    public function single1($id)
    {
        // Handle single article logic here
        return view('article.single1', compact('id'));
    }

    public function single2($id)
    {
        // Handle single article logic here
        return view('article.single2', compact('id'));
    }

    public function single3($id)
    {
        // Handle single article logic here
        return view('article.single3', compact('id'));
    }

    public function single4($id)
    {
        // Handle single article logic here
        return view('article.single4', compact('id'));
    }

    public function single5($id)
    {
        // Handle single article logic here
        return view('article.single5', compact('id'));
    }

    public function single6($id)
    {
        // Handle single article logic here
        return view('article.single6', compact('id'));
    }

    public function author($id)
    {
        // Handle author logic here
        return view('article.author', compact('id'));
    }

}
