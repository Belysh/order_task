<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="/services/add" class="p-3 rounded-full bg-green-500 text-white">Order new service</a>
                <ul class="flex justify-center items-start flex-wrap mt-10">
                    @forelse ($services as $property)
                        <li class="flex bg-gray-100 m-2 min-w-min flex-col rounded-3xl p-8 pt-5">
                            <div class="text-2xl font-bold text-center p-3 border-black border-b-2">
                                {{$ProductNames[$property->product_id]}}
                            </div>
                            <div class="text-2xl font-bold text-center w-64 p-3 border-black border-b-2">
                                {{$property->name}}
                            </div>
                            <div class="text-2xl font-bold text-center w-64 p-3 border-black">
                                ID: #{{$property->id}}
                            </div>
                            <a class="rounded-full bg-indigo-600 text-white py-3 px-5 block mx-auto font-bold mb-3 hover:bg-indigo-800"
                            href="/services/upgrade/{{$property->id}}">
                            Upgrade</a>
                            <a class="rounded-full bg-indigo-600 text-white py-3 px-5 block mx-auto font-bold mb-3 hover:bg-indigo-800"
                            href="/services/downgrade/{{$property->id}}">
                            Downgrade</a>
                            <a class="rounded-full bg-blue-500 text-white py-3 px-5 block mx-auto font-bold mb-3 hover:bg-blue-600"
                            href="/services/edit/{{$property->id}}">
                            Edit service</a>
                            <a class="rounded-full bg-red-600 text-white py-3 px-5 block mx-auto font-bold mb-3 hover:bg-red-700"
                            href="/services/delete/{{$property->id}}">
                            Delete Service</a>
                        </li>                        
                    @empty
                        <div>
                            No services ordered yet
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>