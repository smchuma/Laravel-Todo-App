<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Todo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class=" bg-[#303038]">
       <div class="lg:w-2/4 mt-10 mx-auto py-8 px-6 bg-[#30303A] text-white rounded-xl">
    <h1 class="font-bold text-5xl text-[#1DA1F2] text-center mb-8 ">Laravel Todo</h1>

 
    <div class="mb-8 pb-10 shadow-md">

    <form action="/" method="POST" class="flex flex-col space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Enter Title" class="py-3 px-4 bg-[#3b3b46] rounded-xl">
        <textarea type="text" name="description" placeholder="Enter Description" class="py-5 px-4 bg-[#3b3b46] rounded-xl"></textarea>
        <button class="w-28 bg-[#1763A6] py-3 px-10 rounded-xl " >Add</button>
    </form>
    </div>

   
    
    <div class="mt-2">
        @foreach ($todos as $todo )

        <div @class([
            'flex items-center py-4  border border-[#3b3b46] rounded-xl px-3 ',
            $todo->isDone ? 'bg-[#1f6d4a] ' : ''
        ])>
            <div class="flex-1 pr-8 ">
                <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                <p class="text-gray-400 ">{{$todo->description}}</p>
            </div>
            <div class="flex space-x-3  ">
                <form action="/{{$todo->id}}" method="POST">
                @csrf
                @method('PATCH')
                <button class="p-2 bg-[#1763A6] rounded-xl hover:bg-[#1f6d4a]  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      
                </button>
                 </form>

                 <form action="/{{$todo->id}}" method="POST">
                    @csrf
                    @method('DELETE')

                <button class="p-2 bg-red-500 rounded-xl hover:bg-red-600 transition ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg> 
                </button>

                 </form>
       
            </div>
        </div>
            
        @endforeach
       
    </div>
    </div>
    </body>
</html>
