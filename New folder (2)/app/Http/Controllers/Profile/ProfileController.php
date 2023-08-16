<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $user;
    public function __construct(User $user = null) {
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->find(Auth::id());
        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $param = $request->all('email', 'first_name', 'last_name', 'phone');
        $user = $this->user->where('id', Auth::id())->update($param);
        if ($user) {
            return redirect()->back();
        }
    }
}
