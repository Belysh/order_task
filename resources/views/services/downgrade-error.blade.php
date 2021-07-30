<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Error') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-5xl text-red-500 mb-10">
                    To downgrade this service kindly contact our support department. 
                </div>
                <a href="/services" class="border-dashed border-b-2 border-green-400 mt-20 text-3xl text-green-400">Go back</a>
            </div>
        </div>
    </div>
</x-app-layout>