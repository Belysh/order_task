<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="/services/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex justify-center items-center mt-10">
                        <p class="mr-5 text-2xl font-bold">Name:</p>
                        <input name="name" type="text">
                    </div>
                    <ul class="flex justify-center flex-wrap mt-10">
                        @foreach ($productsArray as $key => $product)
                        <li class="flex bg-gray-100 flex-col rounded-3xl m-10 p-8 pt-5">
                            <input type="radio" name="product_choice" value="{{$product['id']}}">
                            <div class="text-2xl font-bold text-center p-3 border-black border-b-2">
                                {{$key}}
                            </div>
                            @foreach ($product as $name => $property)
                                @if ($name != 'id')
                                    <div class="text-2xl font-bold text-center p-3 border-black border-b-2">
                                        {{$name}}
                                        {{$property}}
                                    </div>
                                @endif
                            @endforeach
                        </li>   
                        @endforeach
                    </ul>
                    <input value="Submit Order" type="submit"
                    class="block mx-auto px-6 py-4 bg-indigo-700 text-white rounded-full
                    text-lg font-bold cursor-pointer hover:bg-indigo-900">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>