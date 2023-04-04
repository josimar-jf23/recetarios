<x-layout>
    <div class="container bg-blue-200 ">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4  gap-4 text-white text-sm text-center">
            
            <div class="col-span-1 md:col-span-2 lg:col-span-3 xl:col-span-4 p-3 rounded-lg shadow-lg">
                
                <form method="GET" action="{{ route('web.index') }}" autocomplete="false">   
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>

            </div>
            
                @forelse ($recetas as $receta)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-auto">
                    <figure class="relative max-w-sm">
                        <a href="#">
                            @if($receta->image)
                            <img class="rounded-t-lg h-80 w-full object-fill" src="{{ Storage::url($receta->image->url) }}" alt="" />
                            @else
                            <img class="rounded-t-lg h-80 w-full object-fill" src="{{ Storage::url('foto_vacio.jpg') }}" alt="" />
                            @endif
                        </a>
                        <figcaption class="absolute w-full px-4 text-lg text-white text-center bottom-0 bg-gray-800 bg-opacity-60">
                            <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ ucwords($receta->nombre) }}
                            </p>
                        </figcaption>
                    </figure>
                   
                    <div class="p-3 h-52">
                        <div class="h-32">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ substr($receta->descripcion,0,250) }}{{ (strlen($receta->descripcion)>250)? "...":"" }}</p>               
                        </div>
                        <div class="h-12">
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Leer mas
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                        
                    </div>
                </div>
                @empty

                @endforelse
            
        </div>
        <div class="p-2">
            {{ $recetas->links('pagination::simple-tailwind') }}
        </div>
        
    </div>
</x-layout>