<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Product &raquo; Create
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div>
        @if($errors->any())
          <div class="mb-5" role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
              There is Somting wrong!
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3">
              <p>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </p>
            </div>
          </div>
        @endif

        <form action="{{route('dashboard.product.store')}}" class="w-full" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</label>
              <input type="text" value="{{ old('name') }}" name="name" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Product Name">
            </div>
            <div class="w-full px-3 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Description</label>
              <textarea id="description" name="description" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Description Product">{!! old('description') !!}</textarea>

            </div>
            <div class="w-full px-3 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Price</label>
              <input type="number" value="{{ old('price') }}" name="price" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Product Name">
            </div>
            <div class="w-full px-3 mb-6">
             <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow-lg">
              Save Product
             </button>
            </div>
          </div>
        </form>
       </div>
     </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        CKEDITOR.replace('description');
    });
</script>

</x-app-layout>

