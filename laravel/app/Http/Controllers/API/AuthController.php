<?php namespace freshwax\Http\Controllers\API;

use freshwax\Http\Requests;
use freshwax\Http\Controllers\Controller;
use freshwax\Http\Requests\UserCreateFormRequest;
use freshwax\Http\Requests\UserStoreRoleFormRequest;

use Illuminate\Support\Facades\Request;

use freshwax\Models\User;
use freshwax\Models\Role;
use freshwax\Models\Artist;
use freshwax\Models\ShoppingCart;
use freshwax\Models\Wishlist;
use freshwax\Models\Order;

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
    public function register(UserCreateFormRequest $request)
    {
        $user = User::create(Input::all());


		return $user;
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
