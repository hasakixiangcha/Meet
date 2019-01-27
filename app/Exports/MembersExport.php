<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class MembersExport implements FromArray,WithStrictNullComparison
{
    use Exportable;
    protected  $data;//我们需要导出的数组数据

    public function __construct($data=[])
    {
        $this->data=$data;
    }

    //: array 代表返回数据必须是array类型
    public function array(): array
    {
        return $this->data;
    }
}
