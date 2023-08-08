<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::whereNot('id', auth()->user()->id)
                ->applyFilters($request->only(['status']))
                ->orderBy('id','desc')
                ->paginate(5);

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $user->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $user->save();
            return redirect()->route('dashboard.users.index')->with('success','User has been created successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.users.index')->with('error',$error->getMessage());
        }
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
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $testimonial->clearMediaCollection('images');
                $user->addMediaFromRequest('image')->toMediaCollection('images');
            }
            $user->save();
            return redirect()->route('dashboard.users.index')->with('success','User has been Updated successfully.');
        }catch(\Exception $error){
            return redirect()->route('dashboard.users.index')->with('error',$error->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::find($id)->delete();

            return redirect()->route('dashboard.users.index')->with('success','User has been deleted successfully');
        }catch(\Exception $error){
            return redirect()->route('dashboard.users.index')->with('error',$error->getMessage());
        }

    }
}
