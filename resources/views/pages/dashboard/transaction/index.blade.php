<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaction') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="mb-10">
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

