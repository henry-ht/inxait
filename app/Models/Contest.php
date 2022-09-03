<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'identification_number',
        'email',
        'phone',
        'winner',
        'department_id',
        'city_id',
        'habeas_data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthday'          => 'date:Y-m-d',
    ];


    public function department(){
        return $this->belongsTo(Department::class);
    }
}
