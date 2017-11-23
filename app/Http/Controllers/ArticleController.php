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
	
	public function store(Request $request){
		$article = Article::create([
			'title' => $request->input('title'),
			'body'  => $request->input('body')
		]);
		
		if(!$article){
			return response()->json([
				'Error'   => false,
				'Message' => 'Failed' 
			]);
		}else{
			return response()->json([
				'Error'   => false,
				'Message' => 'Success' 
			]);
		}
	}
	
	public function update(Request $request, $id){
		$cek     = Article::find($id);
		if(!$cek){
			return response()->json([
                'Error'   => true,
                "Message" => "Not Found"
            ]);
		}else{
			$article = Article::find($id)->update([
				'title' => $request->input('title'),
				'body'  => $request->input('body')
			]);
			
			if(!$article){
				return response()->json([
					'Error'   => false,
					'Message' => 'Failed' 
				]);
			}else{
				return response()->json([
					'Error'   => false,
					'Message' => 'Success' 
				]);
			}
		}
	}
	
	public function destroy($id){
		$cek = Article::find($id);
		if(!$cek){
			return response()->json([
                'Error'   => true,
                "Message" => "Not Found"
            ]);
		}else{
			Article::find($id)->delete();
			return response()->json([
				'Error'   => false,
				'Message' => 'Success' 
			]);
		}
	}
}
