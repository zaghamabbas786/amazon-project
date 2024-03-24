<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Poste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $link =null;
        if (\request()->has('search')){

            $post=[
                'post'=> DB::table('postes')->where('product_name', 'like', '%'.\request()->search.'%')
                    ->get()];
        }
        else{
            $link= 1;
            $post=[
                'post'=>Poste::paginate(10),
                'link' =>$link

            ];

        }

//        dd(asset('images/'.));

        return view('dashbord')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validate([
            'img'=>'required'
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

        }

//        $img=$request->img
//        dd($img);

       $success= Poste::create(array_merge($request->validated(),[
           'img'=>$name ?? null
       ]));
       if ($success){
           return redirect()->route('admin.post.index');       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
//    public function show(Poste $post)
//    {
//        dd($post);
//        return view('Add_products')->with('post',$post);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(Poste $post)
    {
        return view('Add_products')->with('post',$post);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Poste $post)
    {
        $post->update(array_merge($request->validated(),[
            'img'=>$request->img
        ]));
        return redirect()->route('admin.post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poste $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
    public function showProductsForUsers()
    {
        $link =null;
        if (\request()->has('search')){

            $post=[
                'post'=> DB::table('postes')->where('product_name', 'like', '%'.\request()->search.'%')
                    ->get()];
        }
        else{
            $link= 1;
            $post=[
                'post'=>Poste::paginate(10),
                'link' =>$link
            ];

        }
        return view('layouts.public.Dashboard')->with('post',$post);

    }
}
