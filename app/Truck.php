<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @method static sortable()
 */
class Truck extends Model
{
    use Sortable;

    protected $table = "trucks";

    protected $fillable = [
        'model',
    ];

    public $sortable = ['model', 'manufactor_year',
      'owner_name_surname', 'owners_amount'];
}