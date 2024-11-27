<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'papiers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['title', "date_debut", "date_fin", "description", "etat", "camion_id"];

    // Relations

    public function Truck()
    {
        return $this->belongsTo(Truck::class, 'camion_id'); // Correct relationship name (singular 'Truck')
    }
}
