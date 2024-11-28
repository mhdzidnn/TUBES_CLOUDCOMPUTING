<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="py-2 px-4 rounded-md bg-green-50 text-green-700 my-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:hidden">
                        @foreach ($transactions as $transaction)
                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                <div class="mb-2">
                                    <strong>Name:</strong>
                                    <p>{{ $transaction->name }}</p>
                                </div>
                                <div class="mb-2">
                                    <strong>Email:</strong>
                                    <p>{{ $transaction->email }}</p>
                                </div>
                                <div class="mb-2">
                                    <strong>Total Price:</strong>
                                    <p>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                                </div>
                                <div class="mb-2">
                                    <strong>Status:</strong>
                                    <p>{{ $transaction->status }}</p>
                                </div>
                                <div class="flex justify-end">
                                    <a href="/dashboard/transactions/{{ $transaction->id }}" class="bg-blue-500 text-white font-semibold py-1 px-2 inline-block rounded-sm hover:bg-blue-700">Detail</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="overflow-x-auto hidden md:block">
                        <table class="table-auto w-full mt-4">
                            <thead class="bg-gray-100 h-8">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="hidden md:table-cell px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Total Price</th>
                                    <th class="hidden md:table-cell px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="border-b">
                                        <td align="center" class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $transaction->name }}</td>
                                        <td class="hidden md:table-cell px-4 py-2">{{ $transaction->email }}</td>
                                        <td class="px-4 py-2">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                        <td class="hidden md:table-cell px-4 py-2">{{ $transaction->status }}</td>
                                        <td align="center" class="px-4 py-2">
                                            <a href="/dashboard/transactions/{{ $transaction->id }}" class="bg-blue-500 text-white font-semibold py-1 px-2 inline-block rounded-sm hover:bg-blue-700">Detail</a>
                                            <button form="delete-{{ $transaction->id }}" class="bg-red-500 text-white font-semibold py-1 px-2 inline-block rounded-sm hover:bg-red-700">Delete</button>
                                            <form id="delete-{{ $transaction->id }}" action="/dashboard/transactions/{{ $transaction->id }}" method="post" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
