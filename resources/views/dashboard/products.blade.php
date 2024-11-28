<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="/dashboard/products/add" class="bg-blue-500 text-white font-semibold py-1 inline-block rounded-sm px-3 hover:bg-blue-700 mb-4">Add Product</a>
                    
                    @if (session('success'))
                        <div class="py-2 px-4 rounded-md bg-green-50 text-green-700 my-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="flex md:hidden flex-col gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($products as $product)
                                <div class="bg-white rounded-lg shadow-md p-4">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-w-sm mx-auto mb-4">
                                    <h4 class="text-lg font-semibold mb-2">{{ $product->name }}</h4>
                                    <p class="text-gray-600">{{ $product->category }}</p>
                                    <div class="mt-4">
                                        <a href="/dashboard/products/{{ $product->id }}" class="bg-blue-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-blue-700 mr-2">Detail</a>
                                        <a href="/dashboard/products/{{ $product->id }}/edit" class="bg-green-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-green-700 mr-2">Edit</a>
                                        <form action="/dashboard/products/{{ $product->id }}" method="post" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto hidden md:block">
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Category</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b">
                                        <td align="center" class="px-4 py-2">
                                            <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-contain mx-auto">
                                        </td>
                                        <td class="px-4 py-2">{{ $product->name }}</td>
                                        <td class="px-4 py-2">{{ $product->category }}</td>
                                        <td align="center" class="px-4 py-2">
                                            <div class="flex flex-col md:flex-row justify-center gap-2">
                                                <a href="/dashboard/products/{{ $product->id }}" class="bg-blue-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-blue-700">Detail</a>
                                                <a href="/dashboard/products/{{ $product->id }}/edit" class="bg-green-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-green-700">Edit</a>
                                                <form action="/dashboard/products/{{ $product->id }}" method="post" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white font-semibold py-1 rounded-sm px-3 hover:bg-red-700">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
