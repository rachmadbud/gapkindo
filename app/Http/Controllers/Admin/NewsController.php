<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->modelNews = new \App\Models\News();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataNews = $this->modelNews->getData();

        return view('admin.content.news.index', [
            'dataNews' => $dataNews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('guest/assets/img/news'), $imageName);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'source'  => !empty($request->source) ? $request->source : 'unknown',
            'created_at' => now(),
        ];

        $this->modelNews->insertData($data);

        // return redirect()->route('admin.news')->with('success', 'News created successfully.');
        return 'berhasil';
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
