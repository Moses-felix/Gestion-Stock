<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandePrix extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'demande_prixes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'demande_achat_id',
        'users_id',
        'company_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function demande_achat()
    {
        return $this->belongsTo(DemandeAchat::class, 'demande_achat_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function company()
    {
        return $this->belongsTo(ContactCompany::class, 'company_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
