@extends('todos.layout')

@section('content')


	<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2xl pb-4">Update this todo</h1>

	<a href="{{route('todo.index')}}" class="mx-5 py-2 text-gray-400 cursor-pointer">

	<span class="fas fa-arrow-left" />

	</a>	
	</div>
	@include('todos.flash')
	<form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
		@csrf
		@method('patch')
		
		<div class="py-1">
		<input type="text" name="title" value="{{$todo->title}}" placeholder="Title" class="py-2 px-2 border rounded">
		</div>
		<div class="py-1">
		<textarea name="description" placeholder="Description" class="p-2 border rounded">{{$todo->description}}</textarea>
		</div>
		<div class="py-1">
		<input type="submit" name="" value="Update" class="py-2 p-4  border rounded">
		</div>
		
	</form>

 
@endsection 