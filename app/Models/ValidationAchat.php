<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidationAchat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ETAT_RADIO = [
        'Accepter' => 'Accepter',
        'Refuser'  => 'Refuser',
    ];

    public $table = 'validation_achats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'demande_achat_id',
        'commentaire',
        'etat',
        'statut',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function demande_achat()
    {
        return $this->belongsTo(DemandeAchat::class, 'demande_achat_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
