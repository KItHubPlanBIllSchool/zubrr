<?php

namespace App\Imports;

use App\Models\Projects;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProjectsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Projects([
            'id' => $row[0],
            'projectname' => $row[1],
            'start' => Date::excelToDateTimeObject($row[2])->format('Y-m-d H:i:s'),
            'end' => Date::excelToDateTimeObject($row[3])->format('Y-m-d H:i:s'),
            'desc' => $row[4],
            'user_id' => $row[5],
        ]);
    }
}
