<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Todo;
use App\User;

class TodoController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
       /* $this->middleware(function ($request, $next) {
            if(Auth::user()->role != "Admin")
            {
                return redirect('todo');
                exit();
            }   
            return $next($request);
        });*/
    }     

    public function index(){
    //$todos = auth()->user()->todos->paginate(1)->sortBy('completed');
     $todos = Todo::where('user_id',auth()->user()->id )->paginate(10);
    //$todos = Todo::orderBy('completed')->get();
    return view('todos.index',compact('todos'));

    }

     public function create(){

     return view('todos.create');

    }

    public function show(Todo $todo){

     // dd($todo->steps);
     return view('todos.show', compact('todo'));

    }



     public function edit($id){
       
     $todo = Todo::find($id);
     return view('todos.edit', compact('todo'));

    }

    public function update(TodoCreateRequest $request, Todo $todo){

      //dd($request->all());
      $todo->update(['title' => $request->title,
                    'description' => $request->description ]);

      return redirect(route('todo.index'))->with('message','Todo Updated Successfully');
    }


     public function store(TodoCreateRequest $request){
    
       /*$user_id = auth()->user()->id;
       $request['user_id'] = $user_id;
       */
        $todo = auth()->user()->todos()->create($request->all());
        
    if($request->steps){
        foreach($request->steps as $step){
             $todo->steps()->create( ['name' => $step] );
        }
       }
        

       //Todo::create($request->all());
       return redirect(route('todo.index'))->with('message','Todo Create Successfully');
    

    }


     public function complete(Todo $todo){
    
       $todo->update(['completed' => true ]);
       return redirect()->back()->with('message','Task Marked as completed!');
    

    }

     public function incomplete(Todo $todo){
    
       $todo->update(['completed' => false ]);
       return redirect()->back()->with('message','Task Marked as incompleted!');
    

    }


    public function destroy(Todo $todo){
   
       $todo->steps->each->delete();  
       $todo->delete();
       return redirect()->back()->with('message','Task Deleted!');
    

    }
}
