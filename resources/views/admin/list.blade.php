
@extends('todos.layout')


@section('content')

<div class="flex justify-between border-b pb-4 px-4">
<h1 class="text-2xl">All Users</h1>
</div>
<div class="flex justify-center">
  <form method="get" action="">
  <div class="mb-3 xl:w-96">
    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
        
      <input type="search" name="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search user" aria-label="Search" aria-describedby="button-addon2">
      <button  type="submit" class="btn px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">

        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
        </svg>
      </button>
   
    </div>
  </div>
    <a class="btn px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" href="{{url('/admin')}}">Reset</a> 
  </form>

</div>
@include('todos.flash')
<div class="container flex justify-center mx-auto px-6 py-2">
    <div class="flex flex-col">
        <div class="w-full">
            @if($users->count()  > 0 )
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <tr>
                            
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Number
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Email
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created_at
                            </th>
                            
                        </tr>
                    </thead>    
             <tbody class="bg-white">
                   
                    @foreach($users as $keys => $user)

                  <tr class="whitespace-nowrap">
                       <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$keys+1}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$user->name}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">{{$user->email}}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{$user->created_at}}
                            </td>
                         
                        </tr>
                
              @endforeach
          </tbody>
         </table>

            <div class="flex justify-center pb-4 px-4 py-5">
             {{$users->links() }}
            </div>

            </div>

            @else

             <p>No user found.</p>
           @endif 


        </div>
    </div>
</div>
 

@endsection()