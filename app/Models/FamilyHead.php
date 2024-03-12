<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHead extends Model
{
    protected $fillable = [
        'name', 'surname', 'birthdate', 'mobile_no', 'address', 'state', 'city', 'pincode', 'marital_status', 'wedding_date', 'hobbies', 'photo'
    ];

    public function familyMembers()
    {
       return $this->hasMany(FamilyMember::class, 'head_id');
    }
}

