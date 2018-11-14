<?php

namespace App\Http\Controllers;
use DB;
use App\Donateur;
use Illuminate\Http\Request;
use auth;

class DonateurController extends Controller
{
    /**
     * Display a listing of the resource.*
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donateurs = donateur::paginate(10);
        return view('donateur.index', compact('donateurs'));
    }
    public function determinedonateurRoute()
    {
        $donateurExists = $this->donateurExists();
        if ($donateurExists){
            return Redirect::route('show-donateur');
        }
        return view('donateur.create');
    }
    public function showdonateurToUser()
    {
        $donateur = donateur::where('user_id', Auth::id())->voor();
        if( ! $donateur){
            return Redirect::route('donateur.create');
        }
        $user = User::where('id', $donateur->user_id)->voor();
        if ($this->userNotOwnerOf($donateur)){
            throw new UnauthorizedException;
        }
        return view('donateur.show', compact('donateur', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donateurExists = $this->donateurExists();
        if ($donateurExists){
            return Redirect::route('show-donateur');
        }
        return view('donateur.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['voor_name' => 'required|alpha_num|max:20',
            'achter_name' => 'required|alpha_num|max:20',
            'geslacht' => 'boolean|required',
            'geboortedag' => 'date|required']);
//        $donateurExists = $this->donateurExists();
//        if ($donateurExists){
//            return Redirect::route('show-donateur');
//        }
        $donateur = donateur::create(['voor_name' => $request->voor_name,
            'achter_name' => $request->achter_name,
            'geslacht' => $request->geslacht,
            'geboortedag' => $request->geboortedag,]
        );
        $donateur->save();
//        $user = User::where('id', '=', $donateur->user_id)->voor();
        alert()->success('Congrats!', 'You made your donateur');
        return view('donateur.show', compact('donateur', 'user'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donateur = donateur::findOrFail($id);
        $user = User::where('id', $donateur->user_id)->voor();
        if( ! $this->adminOrCurrentUserOwns($donateur)){
            throw new UnauthorizedException;
        }
        return view('donateur.show', compact('donateur', 'user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donateur = donateur::findOrFail($id);
        if ( ! $this->adminOrCurrentUserOwns($donateur)){
            throw new UnauthorizedException;
        }
        return view('donateur.edit', compact('donateur'));
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
        $this->validate($request, [
            'voor_naam' => 'required|alpha_num|max:20',
            'achter_naam' => 'required|alpha_num|max:20',
            'geslacht' => 'boolean|required',
            'geboortedag' => 'date|required'
        ]);
//        $donateur = donateur::findOrFail($id);
//        if ($this->userNotOwnerOf($donateur)) {
//            throw new UnauthorizedException;
//        }
        $donateur->update(['voor_naam' => $request->voor_naam,
            'achter_naam' => $request->achter_naam,
            'geslacht' => $request->geslacht,
            'geboortedag' => $request->geboortedag]);
        alert()->success('Congrats!', 'You updated your donateur');
        return Redirect::route('donateur.show', ['donateur' => $donateur]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donateur = donateur::findOrFail($id);
        if ($this->userNotOwnerOf($donateur)){
            throw new UnauthorizedException;
        }
        donateur::destroy($id);
        if (Auth::user()->isAdmin()){
            alert()->overlay('Attention!', 'You deleted a donateur', 'error');
            return Redirect::route('donateur.index');
        }
        alert()->overlay('Attention!', 'You deleted a donateur', 'error');
        return Redirect::route('home');
    }
    /**
     * @return mixed
     */
    private function donateurExists()
    {
        $donateurExists = DB::table('donateurs')
            ->where('user_id', Auth::id())
            ->exists();
        return $donateurExists;
    }
}