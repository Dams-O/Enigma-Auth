<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Enregistrer un nouveau user.
     *
     * C'est ici que l'on va ajouter un nouvel utilisateur grâce à son nom, son email et son mot de passe.
     *
     *
     * @bodyParam  Name  string  Nom de l'utilisateur
     * @bodyParam  Email  email  L'email de l'utilisateur
     * @bodyParam  Password  string  Mot de passe entré par l'utilisateur
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }

    /**
     * Récupérer un token JWT via les informations utilisateurs.
     *
     * Lorsqu'un utilisateur réussit à ce connecter, nous allons lui retourner un token avec différentes informations.
     *
     * @bodyParam  Email  String  L'email entré par l'utilisateur
     * @bodyParam  Password  String  Mot de passe entré par l'utilisateur
     *
     *
     * @response {
     *  "token": "token",
     *  "token_type": "bearer",
     *  "expire_in": "14400"
     * }
     * @return Response
     */
    public function login(Request $request)
    {
        //Element nécessaire dans la requête
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Si tout est bon on génère le token
        return $this->respondWithToken($token);
    }

}
