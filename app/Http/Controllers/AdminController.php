<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//Models
use App\User;
use App\Admin;

class AdminController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->role != "admin")
            {
                return redirect('home');
                exit();
            }   
            return $next($request);
        });
    }


    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
         
        if($search != ""){
        
         $users =  User::where('name', 'LIKE',  "%$search%")
                        ->where('role', 'user')->paginate(10);
        }else{

           $users = User::where('role', 'user')->paginate(10);    
         }
        
        $data['users'] = $users;
        $data['page'] = "admin";
       //dd($data);
       return view('admin.list', $data );
    }
    

}
