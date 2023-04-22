<x-layout>
    <div class="container bg-blue-200 ">
        <div class="mx-auto max-w-screen-lg px-3 py-1 flex justify-end">
            <a type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('web.index') }}">Volver</a>
        </div>
        <div class="mx-auto max-w-screen-lg px-3 py-1">
            
            <div class="flex flex-col md:flex-row md:justify-between  md:gap-x-24">
                <div>
                    <div class="flex flex-row items-center gap-y-2 ">
                        <div class="rounded-md px-2 py-1 text-xs font-semibold bg-fuchsia-400 text-fuchsia-900">
                            {{ $receta->receta_tipo->nombre }}</div>
                    </div>                    
                    <h1 class="text-3xl font-bold">{{ $receta->nombre }}</h1>
                    <p class="mt-6 text-xl leading-9">{{ $receta->descripcion }}</p>
                    {{--  <h2 class="my-6 text-2xl font-bold underline underline-offset-4">Indicaciones:</h2>
                    <p class="mt-6 text-xl leading-9">{{ $receta->indicaciones }}</p>  --}}
                </div>
                <div class="shrink-0 flex justify-center">
                    @if ($receta->image)
                        <img class="rounded-t-lg h-80 w-72 object-fill" src="{{ Storage::url($receta->image->url) }}"
                            alt="Imagen - {{ $receta->nombre }}" loading="lazy" />
                    @else
                        <img class="rounded-t-lg h-80 w-72 object-fill" src="{{ Storage::url('foto_vacio.jpg') }}"
                            alt="Imagen - {{ $receta->nombre }}" loading="lazy" />
                    @endif
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-screen-lg px-3 py-3">
            <h2 class="my-2 text-2xl font-bold ">Indicaciones:</h2>
            {{--  <p class="mt-2 text-xl leading-9">{!! $receta->indicaciones !!}</p>  --}}
            <div class="mt-2">
                {!! $receta->indicaciones !!}
            </div>
        </div>
        @if(!$receta->receta_detalle->isEmpty())        
        <div class="mx-auto max-w-screen-lg px-3 py-2 drop-shadow-lg">
            <div class="mb-2 text-2xl font-bold">Ingredientes</div>
            @foreach($receta->receta_detalle as $detalle)
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-x-8 rounded-md bg-blue-300 p-3 md:flex-row">
                    <div class="shrink-0 flex justify-center">
                        @if ($detalle->ingrediente->image)
                            <img class="rounded-lg h-36 w-36 object-fill" src="{{ Storage::url($detalle->ingrediente->image->url) }}"
                                alt="Imagen" loading="lazy" />
                        @else
                            <img class="rounded-lg h-36 w-36 object-fill" src="{{ Storage::url('foto_vacio.jpg') }}"
                                alt="Imagen" loading="lazy" />
                        @endif
                    </div>
                    <div class="text-center md:text-left">
                        <p class="text-xl font-bold">{{$detalle->ingrediente->nombre}}</p>
                        <p class="text-xl font-semibold">{{$detalle->cantidad }} {{$detalle->unidad_medida->abreviatura }}</p>
                        <p class="mt-3" > {{$detalle->ingrediente->descripcion}} </p>
                        <p class="text-xl font-semibold text-fuchsia-900"> Adicional:</p>
                        <p class="mt-1 text-fuchsia-800"> {{$detalle->adicional}}</p>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
        @endif
        @if(!$receta->receta_utensilio->isEmpty())        
        <div class="mx-auto max-w-screen-lg px-3 py-3 drop-shadow-lg">
            <div class="mb-2 text-2xl font-bold">Utensilios</div>
            @foreach($receta->receta_utensilio as $utensilio)
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-x-8 rounded-md bg-blue-300 p-3 md:flex-row">
                    <div class="shrink-0 flex justify-center">
                        @if ($utensilio->utensilio->image)
                            <img class="rounded-lg h-36 w-36 object-fill" src="{{ Storage::url($utensilio->utensilio->image->url) }}"
                                alt="Imagen" loading="lazy" />
                        @else
                            <img class="rounded-lg h-36 w-36 object-fill" src="{{ Storage::url('foto_vacio.jpg') }}"
                                alt="Imagen " loading="lazy" />
                        @endif
                    </div>
                    <div class="text-center md:text-left">
                        <p class="text-xl font-bold">{{$utensilio->utensilio->nombre}}</p>
                        <p class="mt-3" > {{$utensilio->descripcion}} </p>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
        @endif
    </div>
</x-layout>
