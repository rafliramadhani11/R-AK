<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return User::where('admin', false)
            ->orderBy('created_at', 'desc');
    }

    // Menentukan data yang akan ditampilkan
    public function map($user): array
    {
        return [
            $user->id_phl,
            $user->name,
            $user->position->name,
            $user->contract->no_contract,
            $user->contract->status,
            $user->job_place,
        ];
    }

    // Menambahkan judul kolom
    public function headings(): array
    {
        return [
            'ID_PHL',
            'NAMA KARYAWAN',
            'JABATAN',
            'NO. KONTRAK',
            'STATUS KONTRAK',
            'LOKASI KERJA',
        ];
    }
}
