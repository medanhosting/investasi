<?php

namespace App\Excel;

use App\Models\Subscribe;
use App\Models\WalletStatement;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{

    protected $type;

    public function __construct($type)
    {
        //
        $this->type = $type;
    }

    public function collection()
    {
        //get all data
        if($this->type == 'subs')
        {
            return Subscribe::all();
        }
        else if($this->type == 'wallet'){
            return WalletStatement::all();
        }
    }
}
