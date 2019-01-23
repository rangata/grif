<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Good extends Model
{

    use HasRoles;

    protected $guard_name = 'web';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goods';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'model','serial','color','customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
