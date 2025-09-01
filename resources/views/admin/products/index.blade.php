<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">Add Product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6  lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 dark:bg-gray-800 p-10 overflow-hidden shadow-sm sm:rounded-lg">

                @forelse ($products as $product )
                <div class="item card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                    <img src="{{ Storage::url($product->photo) }}" alt="" class="w-[50px] h-[50px] object-cover">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $product->name }}
                        </h3>
                        <p class="text-base text-slate-500">{{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>

                    </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-2">

                        <a href="{{ route('admin.products.edit', $product) }}" class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-5 py-3 rounded-full text-white bg-red-500 hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>

                @empty

                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
