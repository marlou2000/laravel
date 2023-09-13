<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\User;

class UserRoleComposer
{
    public function compose(View $view)
    {
        $userRoleId = session('user_id');

        $user = User::find($userRoleId);

        $userRole = $user ? $user->role : null;

        $view->with('userRole', $userRole);
    }
}
