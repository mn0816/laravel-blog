<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $all_users = $this->user->latest()->get();
        return view ('post.index')
            ->with('all_users',$all_users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('profile.show');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('profile.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id);

        return view('profile.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
{
    $user = $this->user->findOrFail($id);

    if ($request->hasFile('image')) {
        // Save the image to the storage disk
        $path = $request->file('image')->store('profile_images', 'public');
        auth()->user()->update(['image' => $path]);

        // You can optionally store the path in the user model if needed
        // $user->image_path = $path;
    }

    // Update other user attributes based on the form data
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    // ... other attributes

    $user->save();

    return redirect()->route('profile.show', ['id' => $user->id]);
}

    

}