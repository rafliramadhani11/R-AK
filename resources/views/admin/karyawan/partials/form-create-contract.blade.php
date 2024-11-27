<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Kontrak') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui data kontrak karyawan dengan data yang benar') }}
        </p>
    </header>

    <form method="post" action="#" class="mt-6 space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf
        @method('patch')



    </form>
</section>
