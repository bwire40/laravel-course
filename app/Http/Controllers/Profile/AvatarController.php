<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    //update method
    public function update(UpdateAvatarRequest $request)
    {
        // $user = auth()->user();



        $path = Storage::disk("public")->put('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->store('avatar', 'public');

        if ($oldAvatar = $request->user()->avatar) {
            // dd($oldAvatar);
            Storage::disk('public')->delete($oldAvatar);
        }


        auth()->user()->update(['avatar' => $path]);

        return back()->with("message", "Avatar is Updated");
    }
}
