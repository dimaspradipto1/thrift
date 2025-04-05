<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Product &raquo; {{ $product->name }} &raquo; Edit
    </h2>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="mb-10">
        <a href="{{ route('dashboard.product.gallery.create', $product->id ) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow-lg">
        + Upload Photos
        </a>
      </div>
      <div class="shadow overflow-hidden sm-rounded-md mt-10">
        <div class="px-4 py-5 bg-white sm:p-6">
          {{ $dataTable->table(['class' => "table table-striped"]) }}

        </div>
      </div>
     </div>
  </div>
  @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
</x-app-layout>

