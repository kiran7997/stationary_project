<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Customer([
            'company_name'=>'',
            'customer_firstname'=>trim(preg_replace('/\s*\([^)]*\)/', '', $row['fps_name'])),
            'state_id'=>$row['state_name'],
            'district_id'=>$row['district_name'],
            'sub_district'=>$row['sub_district_name'],
            'fps_id'=>$row['fps_id'],
            'latitude'=>$row['lattitude'],
            'longitude'=>$row['longitude'],
            'accuracy'=>$row['accuracy']
        ]);
    }
}
