@extends('todos.layout')


@section('content')

  	<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2xl pb-4">{{$todo->title}}</h1>

	<a href="{{route('todo.index')}}" class="mx-5 py-2 text-gray-400 cursor-pointer">

	<span class="fas fa-arrow-left" />

	</a>	
	</div>

	@include('todos.flash')
	
	<div>
		<div>
			 <h2 class="text-lg"> Description </h2>
			<p>{{$todo->description}}</p>
		</div>

	   @if($todo->steps->count() > 0 )
        <div class="my-2">
        	<h2 class="text-lg"> Step for this Todo </h2>
         @foreach($todo->steps as $step)
         
         <p>{{$step->name}}</p>
         @endforeach
        
        </div>
       
       @endif 
	</div>	

@endsection