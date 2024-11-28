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
                    <h1 class="font-bold text-lg mb-4">Detail Transaction</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <div class='mb-2'>
                                <strong>Nama:</strong>
                                <p>{{ $transaction->name }}</p>
                            </div>
                            <div class='mb-2'>
                                <strong>Email:</strong>
                                <p>{{ $transaction->email }}</p>
                            </div>
                            <div class='mb-2'>
                                <strong>Total Price:</strong>
                                <p>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div>
                            <div class='mb-2'>
                                <strong>Status:</strong>
                                <p>{{ $transaction->status }}</p>
                            </div>
                            <div class='mb-2'>
                                <strong>Alamat:</strong>
                                <p>{{ $transaction->address }}</p>
                            </div>
                            <div class='mb-2'>
                                <strong>Kota:</strong>
                                <p>{{ $transaction->city }}</p>
                            </div>
                        </div>
                        <div>
                            <div class='mb-2'>
                                <strong>No. Kontak:</strong>
                                <p>{{ $transaction->contact }}</p>
                            </div>
                            <div class='mb-2'>
                                <strong>Kurir:</strong>
                                <p>{{ $transaction->courier->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                      <h6 class="text-lg font-semibold">List Products</h6>
                        @foreach ($transaction->product as $item)
                            <div class="bg-white rounded-lg py-4 border-gray-100 shadow-sm">
                              <div class="flex flex-row">
                                <div class="w-1/2">
                                  <div class="mb-2">
                                    <strong>Product Name:</strong>
                                    <p>{{ $item->product->name }}</p>
                                  </div>
                                </div>
                                <div class="w-1/2">
                                  <div class="mb-2">
                                    <strong>Quantity:</strong>
                                    <p>{{ $item->quantity }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="flex flex-row">
                                <div class="w-1/2">
                                  <div class="mb-2">
                                    <strong>Price:</strong>
                                    <p>Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                  </div>
                                </div>
                                <div class="w-1/2">
                                  <div class="mb-2">
                                    <strong>Total Price:</strong>
                                    <p>Rp {{ number_format($item->quantity * $item->product->price,0,',','.') }}</p>
                                  </div>
                                </div>
                              </div>
                                
                            </div>
                        @endforeach
                    </div>
                    
                    
                    <table class="table-auto w-full mt-4 hidden md:block">
                        <thead class="bg-gray-100 h-8">
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->product as $item)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td align="right">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                                    <td align="center">{{ $item->quantity }}</td>
                                    <td align="right">Rp {{ number_format($item->quantity * $item->product->price,0,',','.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th class="bg-gray-100" align="right">Total :</th>
                                <td class="bg-gray-100" align="right">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
