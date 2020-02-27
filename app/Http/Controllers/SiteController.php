<?php

namespace App\Http\Controllers;
use App\User;
use App\Customer;
use App\Products;
use App\Orders;
use App\logActivity;
use Toastr;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Bouncer;
use Illuminate\Database\Seeder;
class SiteController extends Controller
{
	public function getIndex()
	{
		return view('dashboard');
	}

	public function indexUsers()
	{
		$users = User::all();
		return view('viewUsers')->with('users', $users);

	}
	public function customers()
	{
		return view('customers');

	}
	public function orders()
	{
		return view('orders');

	}
	public function products()
	{
		return view('products');

	}

    public function orderData(){
        return Datatables::of(Orders::query())->addColumn('action', function ($data) {
			return '<a href="viewOrder/'.$data->id.'" class="btn btn-xs btn-primary viewBtn" data-target="#ajax" data-toggle="modal"><i class="glyphicon glyphicon-eye-open"></i> View</a>';
		})
		->editColumn('id', 'ID: {{$id}}')
		->removeColumn('password')->make(true);
	}
	public function viewLogs(){
        $logs = LogActivity::join('users', 'log_activities.user_id', '=', 'users.id')
            ->select(['log_activities.id', 'users.name', 'log_activities.created_at', 'log_activities.subject', 'log_activities.updated_at']);

        return Datatables::of($logs)->make(true);
	}
	public function anyData($tableName)
    {
		$data = DB::table($tableName)->select('*');
		return Datatables::of($data)->editColumn('created_at', function ($data) {
			return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
		})->make(true);
	}
	public function addUser(){
		return view('addUser');
	}
	public function viewOrder($id){
		$order = DB::table('orders')
		->leftjoin('order_items', 'orders.id', '=', 'order_items.order_id')
		->leftjoin('products','order_items.product_id', '=', 'products.id')
        ->where('orders.id','=', $id)->select('orders.*','order_items.*', 'products.*')
		->get()->toArray();
		$this->logCreateActivity($id);
		return view('viewOrder')->with("order", $order);
	}
	public function createUser(Request $request)	{
		$this->validate($request, [
			'email' 		=> 'required|email|unique:users',
			'name'		=> 'required|max:120',
			'password'		=> 'required|min:4'
			]);
		$email 		= 	$request['email'];
		$password 	= 	bcrypt($request['password']);
		$name 		= 	$request['name'];
		$userType  	= 	1;
		$username	= explode(' ', $name);
		$username   = $username[0];
		$user = new User();
		$user->email 		= $email;
		$user->password 	= $password;
		$user->name 		= $name;
		$user->user_type 	= $userType;
		$user->username     = $username;


		$user->save();
		return redirect()->route('dashboard');

	}
	public function doLogin(Request $request)
	{
 		$email = $request->email; //the input field has name='username' in form
		
		// Creating Rules for Email and Password
 		
		$rules = array(
			'email' => 'required|email', // make sure the email is an actual email
			'password' => 'required|min:4');
 
		// password has to be greater than 3 characters and can only be alphanumeric and);
		// checking all field

		$validator = Validator::make(Input::all() , $rules);

		// if the validator fails, redirect back to the form

		if ($validator->fails())
		{	
			return Redirect::to('/Login')->withErrors($validator) // send back all errors to the login form
			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
	    else
		{

			// create our user data for the authentication
			$remember = $request->has('remember') ? true : false;

			$userdata = array(
				'email' => Input::get('email') ,
				'password' => Input::get('password'),
			);

	
			if (Auth::attempt($userdata,$remember))
			{

				// validation successful
				return redirect()->route('dashboard');
				// do whatever you want on success
			}
			else
			{
				// validation not successful, send back to form
				return Redirect::to('/Login')->with('fails', 'Username or password is incorrect!') // send back all errors to the login form
				->withInput(Input::except('password')); 
			}
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Toastr::error('Logout Successful!', 'Good Bye', ["positionClass" => "toast-top-right"]);
		return redirect()->route('login');
	}

	function array_flatten($array) { 
	  if (!is_array($array)) { 
	    return FALSE; 
	  } 
	  $result = array(); 
	  foreach ($array as $key => $value) { 
	    if (is_array($value)) { 
	      $result = array_merge($result, array_flatten($value)); 
	    } 
	    else { 
	      $result[$key] = $value; 
	    } 
	  } 
	  return $result; 
	} 
	private function logCreateActivity($order_id){
		$subject = "viewed Order Number = ".$order_id;   
		\LogActivity::addToLog($subject);
		   return true;
	   }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
		return view('logActivity');
	}
	public function addRole(){
		$user = Auth::User();
	
		//Bouncer::assign('admin')->to($user);
		if ($user->isAn('admin')){
			echo "Hello Admin";
		}
		if ($user->isAn('shop-manager')){
			echo "Hello Shop Manager";
		}
		if ($user->isAn('user-manager')){
			echo "Hello User Manager";
		}
	}
}
