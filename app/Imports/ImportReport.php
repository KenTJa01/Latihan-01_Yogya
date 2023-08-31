<?php

namespace App\Imports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportReport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new user([
            //
        ]);
    }
}
