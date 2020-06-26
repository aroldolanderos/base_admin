<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Display a listing of publications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $publications = Publication::orderBy('updated_at', 'DESC')->paginate(4);

        return view('manager.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('manager/publications/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $publication = new Publication();
        $publication->title = $request->input('title');
        $publication->body = $request->input('body');
        $publication->save();

        return redirect()->route('manager.publications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::findOrFail($id);

        return view('manager.publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::findOrFail($id);

        return view('manager.publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('manager/publications/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $publication = Publication::find($id);
        $publication->title = $request->input('title');
        $publication->body = $request->input('body');
        $publication->save();

        return redirect()->route('manager.publications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $publication = Publication::find($id);
        $publication->delete();

        return redirect()->route('manager.publications.index');
    }
}
