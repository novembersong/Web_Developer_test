<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <ul>
                                    <li> Title : {{$response->Title}}</li>
                                    <li> Rated : {{$response->Rated}}</li>
                                    <li> Released : {{$response->Released}}</li>
                                    <li> Runtime : {{$response->Runtime}}</li>
                                    <li> Genre : {{$response->Genre}}</li>
                                    <li> Director : {{$response->Director}}</li>
                                    <li> Writer : {{$response->Writer}}</li>
                                    <li> Actors : {{$response->Actors}}</li>
                                    <li> Plot : {{$response->Plot}}</li>
                                    <li> Language : {{$response->Language}}</li>
                                    <li> Country : {{$response->Country}}</li>
                                    <li> Awards : {{$response->Awards}}</li>
                                    <li> Poster : <img src="{{$response->Poster}}" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
