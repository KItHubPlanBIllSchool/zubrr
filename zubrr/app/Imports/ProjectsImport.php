<?php

namespace App\Imports;

use App\Models\Projects;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ProjectsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Projects([
            'projectname' => $row['projectnames'],
            'start' => Date::excelToDateTimeObject($row['start'])->format('Y-m-d H:i:s'),
            'end' => Date::excelToDateTimeObject($row['end'])->format('Y-m-d H:i:s'),
            'desc' => $row['desc'],
            'user_id' => $row['user_id'],
            'state' => $row['state'],
            'kv1' => $row['kv1'],
            'kv2' => $row['kv2'],
            'kv3' => $row['kv3'],
            'kv4' => $row['kv4'],
        


        ]);
    }
}
