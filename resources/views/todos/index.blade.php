
@extends('todos.layout')


@section('content')

<div class="flex justify-between border-b pb-4 px-4">
<h1 class="text-2xl">All your Todos</h1>
	<a href="{{route('todo.create')}}" class="mx-5 py-2 text-blue-400 cursor-pointer rounded text-white"><span class="fa fa-plus-circle px-2 text-green-400"/></a>
</div>
@include('todos.flash')
<ul>

	@if($todos->count()  > 0 )
	@foreach($todos as $todo)

	<li class="flex justify-between p-2">
		
		<div>
		@include('todos.complete-button')
		</div>

		@if($todo->completed)
		<p class="line-through">{{$todo->title}}</p>
		@else
		<a href="{{route('todo.show',$todo->id)}}" class="cursor-pointer">{{$todo->title}}</a>
		@endif
		
		<div>
	    
	    <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400">
	   	<span class="fa fa-edit px-2"/></a>

	   
	   	<span class="fa fa-trash px-2 cursor-pointer" onclick="event.preventDefault();
	   	                     if(confirm('Are you really want to delete?')){
	   	                     document.getElementById('form-delete-{{$todo->id}}')
                             .submit()	
	   	                     }
                             "  />

	   	 <form style="display:none;" method="post" id="{{'form-delete-'.$todo->id}}" action="{{route('todo.destroy',$todo->id)}}" class="py-5">
		@csrf
		@method('delete')
	   </form>
		
		</div>

	</li>
	
	@endforeach

	@else

             <p>No task available, create one.</p>
	@endif 
</ul>

<div class="flex justify-center pb-4 px-4 py-5">
  {{$todos->links() }}
</div>
@endsection()