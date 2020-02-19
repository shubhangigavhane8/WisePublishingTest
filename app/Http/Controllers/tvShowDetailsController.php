<?php

namespace App\Http\Controllers;

use App\tvShowDetails;
use Illuminate\Http\Request;

class tvShowDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvShowDetails = tvShowDetails::all();
        return view('tvShowDetails.index',compact('tvShowDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tvShowDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'season' => 'required',
            'episode' => 'required',
            'quote' => 'required',
        ]);

        tvShowDetails::create($request->all());
        return redirect()->route('tvShowDetails.index')
                        ->with('success','Quote added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tvShowDetails  $tvShowDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showDetail = tvShowDetails::where('id',  '=', $id)->first();
        return view('tvShowDetails.show',compact('showDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tvShowDetails  $tvShowDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showDetail = tvShowDetails::find($id);
        return view('tvShowDetails.edit',compact('showDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tvShowDetails  $tvShowDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'season' => 'required',
            'episode' => 'required',
            'quote' => 'required',
        ]);
  
        $showDetails = tvShowDetails::find($id);

        $showDetails->update($request->all());
  
        return redirect()->route('tvShowDetails.index')
                        ->with('success','Quote updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tvShowDetails  $tvShowDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $showDetails = tvShowDetails::find($id);
        $showDetails->delete();
  
        return redirect()->route('tvShowDetails.index')
                        ->with('success','Quote deleted successfully');
    }
}
