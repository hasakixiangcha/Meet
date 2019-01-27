<?php

namespace App\Imports;

use App\Model\Members;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::extend('Members',function ($value){
    $members=config('excelfields.Members');
    $newvalue=isset($members[$value])?$members[$value]:'lover';
    return $newvalue;
});
HeadingRowFormatter::default('Members');

class MemberImport implements ToModel,WithBatchInserts,WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new Members( $row );
    }
  /* public function array(array $array)
   {
       return $array;
   }*/

    public function batchSize(): int
    {
        return 500;
    }
}
