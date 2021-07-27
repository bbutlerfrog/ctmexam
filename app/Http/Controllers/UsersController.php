<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {

        $users = $this->user->all();
        return $users;
    }

    public function optedin()
    {

        $optedin = User::where('optin', 1)
            ->get();
        return $optedin;
    }

    public function optedout()
    {

        $optedin = User::where('optin', 0)
        ->get();
        return $optedin;
    }

    public function show($id)
    {

        $user = $this->user->find($id);
        if (empty($user)) {
            return "No data found.";
        }

        return $user;
    }

    /**
     * Create a new user
     */
    public function store(Request $request)
    {

        // Validate if the input for each field is correct 
        $this->validate($request, [
            'email' => 'required|string',
            'optin' => 'required|boolean',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        // Create the user
        $user = $this->user->create([
            'email' => $request->input('email'),
            'optin' =>  $request->input('optin'),
            'firstname' =>  $request->input('firstname'),
            'lastname' =>  $request->input('lastname'),
        ]);

        return $user;
    }

    /**
     * Opt a user out of the email campaign
     */
    public function optout($id)
    {
        // Find the user you want to opt-out
        $user = $this->user->find($id);

        // Return error if not found
        if (empty($user)) {
            return "No data found.";
        }

        // opt-out the user
        $user->update([
            'optin' =>  0
        ]);

        return $user;
    }

    /**
     * Update info for a specific user
     */
    public function update(Request $request, $id)
    {
        // Validate if the input for each field is correct 
        $this->validate($request, [
            'email' => 'required|string',
            'optin' => 'required|boolean',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        // Find the user you want to update
        $user = $this->user->find($id);

        // Return error if not found
        if (empty($user)) {
            return "No data found.";
        }

        // Update the player
        $user->update(['email' => $request->input('email'),
            'optin' =>  $request->input('optin'),
            'firstname' =>  $request->input('firstname'),
            'lastname' =>  $request->input('lastname'),
        ]);

        return $user;
    }

    /**
     * Delete a specific user
     */
    public function destroy($id)
    {

        $user = $this->user->find($id);

        if (empty($user)) {
            return "No data found.";
        }

        $user->delete();

        return;
    }
}
