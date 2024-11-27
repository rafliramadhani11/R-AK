<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('admin.jabatan.index') }}" wire:navigate
                class="hover:underline hover:underline-offset-8 hover:decoration-2">
                {{ __('Jabatan') }}
            </a>
            <span class="mx-2">/</span>
            {{ $position->name }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        ID PHL
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        Nama Karyawan
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        Jabatan
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        No. Kontrak
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        Status Kontrak
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                        Lokasi Kerja
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $u)
                                <tr>
                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-semibold leading-normal text-gray-900">
                                            {{ $u->id_phl }}
                                        </p>
                                    </td>

                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $u->name }}
                                        </p>
                                    </td>

                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $u->position->name }}
                                        </p>
                                    </td>

                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $u->contract->no_contract ?? '-' }}
                                        </p>
                                    </td>

                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $u->contract->status ?? '-' }}
                                        </p>
                                    </td>

                                    <td class="p-4 border-t border-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $u->job_place }}
                                        </p>
                                    </td>
                                </tr>
                            @empty
                                <td class="p-4 border-t border-blue-gray-50" colspan="6">
                                    <p
                                        class="block font-sans text-sm antialiased font-semibold leading-normal text-center text-gray-900">
                                        Data tidak ditemukan
                                    </p>
                                </td>
                            @endforelse

                        </tbody>
                    </table>





                </div>
            </div>
        </div>

    </div>
</x-app-layout>
