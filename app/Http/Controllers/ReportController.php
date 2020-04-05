<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reportbydate(Request $request){
    
        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);
        
        $guest =  Guest::whereBetween('created_at', [$from, $to])->get();

        return view('pages.report.reportbydate',compact('guest'));
    }

    public function reportbytype(Request $request){
    
        $guest_type = $request->guest_type;        
        
        $guest =  Guest::where('guest_type', $guest_type)->get();

        return view('pages.report.reportbytype',compact('guest'));
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
