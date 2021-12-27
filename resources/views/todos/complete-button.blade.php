@if($todo->completed)
		<span onclick="event.preventDefault();
                             document.getElementById('form-incomplete-{{$todo->id}}')
                             .submit()" 
                             class="fa fa-check px-2 cursor-pointer text-green-400"/>

         <form style="display:none;" method="post" id="{{'form-incomplete-'.$todo->id}}" action="{{route('todo.incomplete',$todo->id)}}" class="py-5">
		@csrf
		@method('delete')
	   </form>

		@else
         <span onclick="event.preventDefault();
                             document.getElementById('form-complete-{{$todo->id}}')
                             .submit()" 
                             class="fa fa-check px-2 text-gray-300 cursor-pointer px-2"/>

         <form style="display:none;" method="post" id="{{'form-complete-'.$todo->id}}" action="{{route('todo.complete',$todo->id)}}" class="py-5">
		@csrf
		@method('put')
	   </form>

		@endif