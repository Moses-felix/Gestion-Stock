<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'commandes';

    protected $dates = [
        'delai_livraison',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_id',
        'demande_achat_id',
        'quantite',
        'transport',
        'divers',
        'tva_id',
        'prix',
        'delai_livraison',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Commande::observe(new \App\Observers\CommandeActionObserver());
    }

    public function company()
    {
        return $this->belongsTo(ContactCompany::class, 'company_id');
    }

    public function demande_achat()
    {
        return $this->belongsTo(DemandeAchat::class, 'demande_achat_id');
    }

    public function tva()
    {
        return $this->belongsTo(Tva::class, 'tva_id');
    }

    public function getDelaiLivraisonAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDelaiLivraisonAttribute($value)
    {
        $this->attributes['delai_livraison'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
