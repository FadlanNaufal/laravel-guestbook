<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.guest.index',[
            'guest' => Guest::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.guest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Guest();
        $data->guest_name = $request->guest_name;
        $data->guest_type = $request->guest_type;
        $data->guest_need = $request->guest_need;
        $data->guest_phone = $request->guest_phone;
        
        $reqfoto = $request->guest_picture;
        $foto = substr($reqfoto,strpos($reqfoto, ',') + 1);
        $dekod = base64_decode($foto);
        $file_name = "img- " .time().rand(11111,99999). ".png";
        $folder = public_path('upload/');
        $fp = fopen($folder.$file_name,'w');
        fwrite($fp, $dekod);
        fclose($fp);
        $data->guest_picture = $file_name;
        // dd($data);
        $data->save();

        return back()->with('success', 'Data Berhasil Terinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('pages.guest.edit',['guest'=>$guest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Guest::where('id',$id)->update([
            'guest_name'=>$request->guest_name,
            'guest_need'=>$request->guest_need,
            'guest_phone'=>$request->guest_phone,
            ]);
        return redirect()->route('guest.index')->with('success', 'Data Berhasil Terinput');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::where('id',$id)->first();
        \File::delete('upload/'.$guest->guest_picture);
     
        Guest::where('id',$id)->delete();
     
        return back();
    }
}
