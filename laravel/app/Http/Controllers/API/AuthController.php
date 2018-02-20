<?php namespace freshwax\Http\Controllers\API;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\UserCreateFormRequest;
use freshwax\Http\Requests\UserStoreRoleFormRequest;

use Illuminate\Http\Request;

use freshwax\Models\User;
use freshwax\Models\Role;
use freshwax\Models\Artist;
use freshwax\Models\ShoppingCart;
use freshwax\Models\Wishlist;
use freshwax\Models\Order;

use freshwax\Resources\UserResource;

use Input;
use Redirect;
use Auth;

class AuthController extends Controller {


    public function __construct()
    {

	}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		return [];
	}


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function register(Request $request)
    {
		$user = User::create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
		]);

		//return a token

		return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    public function delete($id)
    {
		//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
		//
	}

}
