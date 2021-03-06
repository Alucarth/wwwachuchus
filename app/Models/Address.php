<?php

namespace Muserpol\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    // use SoftDeletes;

    protected $table = "addresses";

    public function affiliate()
    {
    	return $this->belongsToMany(Affiliate::class);
    }

    public function quota_aid_beneficiaries() 
    {
        return $this->belongToMany('Muserpol\Models\QuotaAidMortuary\QuotaAidBeneficiary', 'address_quota_aid_beneficiary', 'quota_aid_beneficiary_id', 'address_id');
    }
}
