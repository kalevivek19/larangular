<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get Users List.
     *
     * @return void
     */
    public function index(Request $request)
    {
        return response()->json(User::all());
    }

    /**
     * Saves User Details.
     *
     * @return void
     */
    public function save(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        if ($user->save()) {
            $response = response()->json($user);
        }
        return $response;
    }

    /**
     * Updates User Details.
     *
     * @return void
     */
    public function update(Request $request, $strUserId)
    {
        $user = User::find($strUserId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        if ($user->save()) {
            $response = response()->json($user);
        }
        return $response;
    }

    /**
     * Delete User
     *
     * @return void
     */
    public function delete(Request $request, $strUserId)
    {
        $user = User::find($strUserId);
        $user->forceDelete();
        $response['success'] = true;
        return response($response, 200);
    }
}
