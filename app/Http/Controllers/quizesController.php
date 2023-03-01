<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\quize;
use Illuminate\Http\Request;

class quizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quizes = quize::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('quiz', 'LIKE', "%$keyword%")
                ->orWhere('opsi1', 'LIKE', "%$keyword%")
                ->orWhere('opsi2', 'LIKE', "%$keyword%")
                ->orWhere('opsi3', 'LIKE', "%$keyword%")
                ->orWhere('opsi4', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizes = quize::latest()->paginate($perPage);
        }

        return view('quizes.index', compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('quizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        quize::create($requestData);

        return redirect('/quizes')->with('flash_message', 'quize added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quize = quize::findOrFail($id);

        return view('quizes.show', compact('quize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quize = quize::findOrFail($id);

        return view('quizes.edit', compact('quize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $quize = quize::findOrFail($id);
        $quize->update($requestData);

        return redirect('/quizes')->with('flash_message', 'quize updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        quize::destroy($id);

        return redirect('/quizes')->with('flash_message', 'quize deleted!');
    }
}
