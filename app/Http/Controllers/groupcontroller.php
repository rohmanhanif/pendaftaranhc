<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use App\Models\Group;
use App\Models\Presence;
use App\Models\Schedule;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     *
     */
    public function attendances($id)
    {
        $group = Group::findOrFail($id);
        return view('group.attendances', compact('group'));
    }
    public function attendances_store(Request $request)
    {
        $start_at = Carbon::now();
        $end_at = $start_at->add(3, 'hour');
        $request->request->add([
            'user_id' => Auth::id(),
            'start_at' => $start_at, 
            'end_at' => $end_at,             
        ]); 
        $requestData = $request->all();

        $schedule = Schedule::create($requestData);

        foreach($requestData['items'] as $key => $item){
            $presence = new Presence();
            $presence->schedule_id = $schedule->id;
            $presence->student_id = $item['student_id'];
            $presence->note = $item['absensi'] . ' ' . $item['note'];
            $presence->start_at = $start_at;
            $presence->end_at = $end_at;
            $presence->save();
        }

        return redirect()->route('schedules.show', $schedule->id)
                ->with('flash_message', 'Data absensi berhasil disimpan!');
    }
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $group = Group::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $group = Group::latest()->paginate($perPage);
        }

        return view('group.index', compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('group.create');
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
        
        Group::create($requestData);

        return redirect('/group')->with('flash_message', 'Group added!');
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
        $group = Group::findOrFail($id);

        return view('group.show', compact('group'));
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
        $group = Group::findOrFail($id);

        return view('group.edit', compact('group'));
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
        
        $group = Group::findOrFail($id);
        $group->update($requestData);

        return redirect('/group')->with('flash_message', 'Group updated!');
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
        Group::destroy($id);

        return redirect('/group')->with('flash_message', 'Group deleted!');
    }
}
