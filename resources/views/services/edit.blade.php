<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="/services/update/{{$service->id}}" method="POST" enctype="multipart/form-data"
                    class="flex bg-gray-100 m-2 min-w-min flex-col rounded-3xl p-8 pt-5 w-1/2 mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="text-2xl font-bold text-center p-3 border-black border-b-2">
                        {{ $product_name }}
                    </div>
                    <div class="text-2xl font-bold text-center p-3 border-black border-b-2">
                        <input name="name" class="text-2xl font-bold text-center" value="{{ $service->name }}" type="text">
                    </div>
                    <div class="text-2xl font-bold text-center p-3">
                        ID: #{{ $service->id }}
                    </div>
                    <button type="submit"
                        class="rounded-full bg-green-500 text-white py-3 px-5 block mx-auto font-bold mb-3 hover:bg-green-600">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
