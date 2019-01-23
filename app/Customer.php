<?php

namespace App;

use Couchbase\Document;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
    protected $fillable = ['firstname','lastname','middlename','mobile','city','email', 'address'];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function companyInfo()
    {
        return $this->hasMany(Company::class);
    }

}
