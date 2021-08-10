<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeAchat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const URGENCE_RADIO = [
        'tres'      => 'très urgent',
        'urg'       => 'Urgent',
        'ordinaire' => 'Ordinaire',
    ];

    public $table = 'demande_achats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'objet',
        'urgence',
        'etat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        DemandeAchat::observe(new \App\Observers\DemandeAchatActionObserver());
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function lignedemandes()
    {
        return $this->hasMany(LigneDemande::class, 'demande_id');
    }
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
