<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Details') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6  lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 dark:bg-gray-800 p-10 overflow-hidden shadow-sm sm:rounded-lg">

                {{-- @forelse ($products as $product ) --}}

                <div class="item card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        {{-- <img src="#" alt="" class="w-[50px] h-[50px] object-cover"> --}}
                        <div>
                            <p class="text-base text-slate-500">Total Transaksi</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                Rp.18.000.000
                            </h3>
                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Date
                        </p>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            02 Agustus 2025
                        </h3>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-orange-500">
                        <p class="text-white text-sm">PENDING</p>
                    </span>
                </div>
                <hr class="my-3">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                    List of items
                </h3>

                <div class="grid-cols-4 grid gap-x-10 ">
                    <div class="flex flex-col gap-y-5 col-span-3 ">
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="https://placehold.co/50x50" alt=""
                                    class="w-[50px] h-[50px] object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        sanmol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        {{ 'Rp ' . '45000' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">{{ 'Vitamins' }}</p>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="https://placehold.co/50x50" alt=""
                                    class="w-[50px] h-[50px] object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        sanmol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        {{ 'Rp ' . '45000' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">{{ 'Vitamins' }}</p>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="https://placehold.co/50x50" alt=""
                                    class="w-[50px] h-[50px] object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        sanmol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        {{ 'Rp ' . '45000' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">{{ 'Vitamins' }}</p>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="https://placehold.co/50x50" alt=""
                                    class="w-[50px] h-[50px] object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        sanmol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        {{ 'Rp ' . '45000' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">{{ 'Vitamins' }}</p>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="https://placehold.co/50x50" alt=""
                                    class="w-[50px] h-[50px] object-cover">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                        sanmol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        {{ 'Rp ' . '45000' }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">{{ 'Vitamins' }}</p>
                        </div>
                        <hr class="my-3">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Details of Delivery
                        </h3>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            {{-- items of delivery --}}
                            <p class="text-base text-slate-500">
                                {{ 'Address' }}
                            </p>
                            <h3 class="text-xl font-bold text-white">
                                {{ 'Gampong Pusong Lhokseumawe' }}
                            </h3>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            {{-- items of delivery --}}
                            <p class="text-base text-slate-500">
                                {{ 'City' }}
                            </p>
                            <h3 class="text-xl font-bold text-white">
                                {{ 'Kota Lhokseumawe' }}
                            </h3>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            {{-- items of delivery --}}
                            <p class="text-base text-slate-500">
                                {{ 'Post Code' }}
                            </p>
                            <h3 class="text-xl font-bold text-white">
                                {{ '24321' }}
                            </h3>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            {{-- items of delivery --}}
                            <p class="text-base text-slate-500">
                                {{ 'Notes' }}
                            </p>
                            <h3 class="text-xl font-bold text-white">
                                {{ 'Depan Menasah Mesjid Penteut' }}
                            </h3>
                        </div>
                        {{-- item order --}}
                        <div class="item-card flex flex-row justify-between items-center">
                            {{-- items of delivery --}}
                            <p class="text-base text-slate-500">
                                {{ 'Phone Number' }}
                            </p>
                            <h3 class="text-xl font-bold text-white">
                                {{ '08123456789' }}
                            </h3>
                        </div>

                        {{-- <p class="text-base text-slate-500">{{ 'Vitamins' }}</p> --}}
                    </div>
                    {{-- </div> --}}
                    {{-- Side detail order --}}
                    <div class="flex flex-col gap-y-5 col-span-1 items-end">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Proof of Payments
                        </h3>
                        <img src="https://placehold.co/300x400" alt="" class="w-[300px] bg-red-600 h-[400px]">
                    </div>
                </div>
                <hr class="my-3">
                <div class="flex flex-row items-center gap-x-2">
                    @role('owner')
                        <form method="POST" action="{{ route('product_transactions.update',1) }}">
                            @csrf
                            @method('PUT')
                            <button type="button" class="px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">
                                Approve Order
                            </button>
                        </form>
                    @endrole
                    @role('buyer')
                        <a href="#" type="button" class=" w-fit px-5 py-3 rounded-full text-white bg-indigo-500 hover:bg-indigo-600">
                                Contact Admin
                        </a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Produk akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

</x-app-layout>
