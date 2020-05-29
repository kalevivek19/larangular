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
        $user = User::all();
        return $user;
    }

    /**
     * Get Users List.
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
            $response = response()->json(
                [
                    'response' => [
                        'created' => true,
                        'userId' => $user->id
                    ]
                ], 201
            );
        }
        return $response;
    }
}
