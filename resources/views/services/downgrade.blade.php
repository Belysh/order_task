<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (count($productsArray) > 0)
                <form name="/services/downgrade/{{$id}}/" action="/services/downgrade/{{$id}}/" method="POST" enctype="multipart/form-data" id="upgrade-form">
                    @csrf
                    <ul class="flex justify-center flex-wrap mt-10">
                        @foreach ($productsArray as $key => $product)
                        <li class="flex bg-gray-100 flex-col rounded-3xl m-10 p-8 pt-5">
                            <input type="radio" name="product_choice" value="{{$product['id']}}" required onchange="
                                document.getElementById('upgrade-form').setAttribute('action', document.getElementById('upgrade-form').getAttribute('name') + this.value)
                            ">
                            <input type="hidden" name="id" value="{{$id}}">
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
                    <input value="Submit" type="submit"
                    class="block mx-auto px-6 py-4 bg-indigo-700 text-white rounded-full
                    text-lg font-bold cursor-pointer hover:bg-indigo-900">
                </form>
                @else
                    <div>No tariffs to downgrade</div>
                    <a href="/services" class="border-dashed border-b-2 border-black">Go back</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>