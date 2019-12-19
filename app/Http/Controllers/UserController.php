<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Récupérer le ou les utilisateur(s) connecté(s)
     *
     * Cette fonction retourne le nom de l'utilisateur uniquement s'il est connecté.
     * @response {
     *  "user" : "Name de l'utilisateur"
     * }
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Récupère tous les utilisateurs en base.
     *
     * Récupère toutes les informations des utilisateurs présent dans la base de donnée.
     *
     * @response {
     *  "Id" : "1",
     *  "Name" : "Test1",
     *  "Email" : "test@test.fr",
     *  "Password" : "ergerh98egerkjgnerjgne74grjegeirg3"
     * }
     * @response {
     *  "Id" : "2",
     *  "Name" : "Test2",
     *  "Email" : "test2@test.fr",
     *  "Password" : "ergereiufhzeufh2zdozf7ienf5h98egerkjgnerjgne74grjegeirg3"
     * }
     * @return Response
     */
    public function allUsers()
    {
        return response()->json(['users' => User::all()], 200);
    }

    /**
     * Récupère les informations d'un seul utilisateur.
     *
     * Cette fonction récupère les informations d'un utilisateur grâce à son id.
     *
     * @response {
     *  "Id" : "1",
     *  "Name" : "Olive",
     *  "Email" : "Olivier@gmail.fr",
     *  "Password" : "ergerh98egerkjgnerjgne74grjegeirg3"
     * }
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

}
