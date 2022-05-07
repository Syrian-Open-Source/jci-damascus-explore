<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            '#',
            'role',
            'fill_name_ar',
            'fill_name_en',
            'email',
            'is_approved',
            'birth_date',
            'gender',
            'mobile',
            'whatsapp',
            'quote',
            'hotel',
            'activities',
            'ID Image',
            'Image',
            'created_at',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->role->name,
            $user->fill_name_ar,
            $user->fill_name_en,
            $user->email,
            $user->is_approved ? 'yes' : 'no',
            $user->birth_date,
            $user->gender,
            $user->mobile,
            $user->whatsapp,
            $user->quote,
            $user->hotel->name ?? "non",
            implode(", ", $user->activities->map(fn($activity) => $activity->name)->toArray()),
            asset($user->id_image),
            asset($user->image),
            $user->created_at,
        ];
    }

    public function collection()
    {
        return User::all();
    }
}
