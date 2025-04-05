<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Transaction &raquo; #{{ $transaction->id }} {{ $transaction->name }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
              <div class="p-6">
                  <table class="table-auto w-full border-collapse">
                      <tbody>
                          <tr>
                              <th class="border px-4 py-2 text-left">Name</th>
                              <td class="border px-4 py-2">{{ $transaction->name }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Email</th>
                              <td class="border px-4 py-2">{{ $transaction->email }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Address</th>
                              <td class="border px-4 py-2">{{ $transaction->address }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Phone</th>
                              <td class="border px-4 py-2">{{ $transaction->phone }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Courier</th>
                              <td class="border px-4 py-2">{{ $transaction->courier }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Payment</th>
                              <td class="border px-4 py-2">{{ $transaction->payment }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Payment URL</th>
                              <td class="border px-4 py-2">
                                  <a href="{{ $transaction->payment_url }}" class="text-blue-600">
                                      {{ $transaction->payment_url }}
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Total Price</th>
                              <td class="border px-4 py-2">{{ number_format($transaction->total_price) }}</td>
                          </tr>
                          <tr>
                              <th class="border px-4 py-2 text-left">Status</th>
                              <td class="border px-4 py-2">{{ $transaction->status }}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>

          <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
              <div class="p-6">
                  <h3 class="text-lg font-medium text-gray-900 mb-4">Transaction Items</h3>
                  <table class="table-auto w-full">
                      <thead>
                          <tr>
                              <th class="border px-4 py-2">Product</th>
                              <th class="border px-4 py-2">Price</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($transaction->items as $item)
                              <tr>
                                  <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                  <td class="border px-4 py-2">{{ number_format($item->product->price) }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>