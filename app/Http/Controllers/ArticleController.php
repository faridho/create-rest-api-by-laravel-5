<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        $result = Article::all();
        return response()->json([
            'Error'   => false,
            'Message' => 'Success',
            'data'    => $result
        ]);
    }

    public function show($id){
        $article = Article::find($id);
        if(!$article){
            return response()->json([
                'Error'   => true,
                "Message" => "Not Found"
            ]);
        }else{
            return response()->json([
                'Error'   => false,
                'Message' => 'Success',
                'data'    => $article
            ]);
        }
    }

}
