<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    public $timestamps = false;
    
    public function __construct()
    {
        $this->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $this->updated_at = Carbon::now()->format('Y-m-d H:i:s');
    }
}
