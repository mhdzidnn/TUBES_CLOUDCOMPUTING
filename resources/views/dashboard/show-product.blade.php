<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-secondary-button onclick="history.back()">Back</x-secondary-button>
            <div class="flex flex-col lg:flex-row gap-8 py-6">
                <div class="w-full lg:w-1/2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <h6 class="text-xl font-semibold mb-3">Product Information</h6>
                    <div class='mb-2'>
                        <strong>Name:</strong>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class='mb-2'>
                        <strong>Category:</strong>
                        <p>{{ $product->category }}</p>
                    </div>
                    <div class='mb-2'>
                        <strong>Description:</strong>
                        <ul class="list-disc pl-5">
                            @foreach (json_decode($product->description) as $description)
                                <li>{{ $description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class='mb-2'>
                        <strong>Image:</strong>
                        <p><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-w-sm mx-auto"></p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <h6 class="text-xl font-semibold mb-3">Product Specification</h6>
                    @foreach(json_decode($product->specs) as $key => $spec)
                    <div class="mb-2">
                        <p class="font-semibold">{{$key}}</p>
                        <p>{{ $spec }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
