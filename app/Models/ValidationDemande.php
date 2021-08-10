<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidationDemande extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'validation_demandes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'demande_id',
        'users_id',
        'status',
        'etat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
