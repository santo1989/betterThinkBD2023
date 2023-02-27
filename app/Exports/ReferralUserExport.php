<?php

namespace App\Exports;

use App\Models\Hand;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReferralUserExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $result = [];
        $this->getReferrals(Auth::id(), $result);
        return User::select('name', 'email', 'uuid', 'mobile', 'created_at')->whereIn('id', $result)->get();
    }

    public function headings(): array
    {
        return['Name', 'Email', 'UUID', 'Mobile', 'Registered At'];
    }

    public function getReferrals($userId, &$result)
    {
        $referrals = Hand::where('parent_id', $userId)->latest()->get();;
        foreach ($referrals as $referral) {
            $result[] = $referral->child_id;
            $this->getReferrals($referral->child_id, $result);
        }
    }
}
