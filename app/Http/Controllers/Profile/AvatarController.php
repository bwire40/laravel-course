<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //update method
    public function update(UpdateAvatarRequest $request)
    {
        // $user = auth()->user();



        $path = $request->file('avatar')->store('avatar', 'public');
        // dd($path);
        auth()->user()->update(['avatar' => $path]);

        return back()->with("message", "Avatar is Updated");
    }
}
