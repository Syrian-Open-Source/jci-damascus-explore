<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping,ShouldAutoSize
{
    /**
     * @return array
     */

    public function headings(): array
    {
        return [
            '#',
            'role',
            'arabic full name',
            'english fill name',
            'email',
            'approved',
            'birth date',
            'gender',
            'mobile',
            'whatsapp',
            'quote',
            'hotel',
            'activities',
            'Total cost',
            'ID Image',
            'Image',
            'created at',
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
            $user->gender == 0 ? 'male' : 'female',
            $user->mobile,
            $user->whatsapp,
            $user->quote,
            $user->hotel->name ?? "non",
            implode(", ", $user->activities->map(fn($activity) => $activity->name)->toArray()),
            $user->total_cost,
            asset($user->id_image),
            asset($user->image),
            $user->created_at,
        ];
    }

    public function collection()
    {
        return User::where('role_id' , 2)->get();
    }
}
