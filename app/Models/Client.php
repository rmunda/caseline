<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\Gender;

class Client extends Model
{
    protected $guarded = ['is_super_admin'];

     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender', 
        'dob',
        'address_line_1',
        'address_line_2',
        'city_town',
        'district',
        'state',
        'pin'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gender' => Gender::class, //
            'created_at' => 'datetime', //
        ];
    }
}
