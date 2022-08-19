<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class StudentsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
// WithBatchInserts => when have too much data in file
// WithChunkReading => when you have very large data in file that can affect the memory
{

    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([


            // اذا كنا بدنا نرفع ملف يحتوي على صف العناوين يجب استدعاء مكتبتها في الاعلى واستخدام هذه الطريقة بدلا من الارقام

            // key of array ==> are the DB Columns
            // value of key ==> are the Excel file Columns (notes that they written in -lowercase- )

            'name' => $row['name'],
            'idNumber' => $row['idnumber'],
            // 'birthday' => Date::now(),
            'birthday' => $this->transformDate($row['birthday']),
            'stage' => $row['stage'],
            'fastTest' => $row['fasttest'],
            'gender' => $row['gender'],
            'room_id' => $row['room_id'],
            'location' => $row['location'],
            'phone' => $row['phone'],
            'fatherIdNumber' => $row['fatheridnumber'],
            'description' => $row['description'],
            'year_id' => $row['year_id'],


            // 'name' => $row[0],
            // 'idNumber' => $row[1],
            // 'birthday' => Date::now(),
            // 'stage' => $row[3],
            // 'fastTest' => $row[4],
            // 'gender' => $row[5],
            // 'room_id' => $row[6],
            // 'location' => $row[7],
            // 'phone' => $row[8],
            // 'fatherIdNumber' => $row[9],
            // 'description' => $row[10],
            // 'year_id' => $row[9],
        ]);
    }

    public function onError(Throwable $error)
    {
    }

    public function rules(): array
    {
        return [
            '*.idnumber' => ['unique:students'],
        ];
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    // public function rules(): array {
    //     return [
    //         '*.0' => ['string', 'max:100'],
    //         '*.1' => ['unique:students,idNumber', 'max:9', 'min:9'],
    //     ];
    // }


    // this method connected with WithBatchInserts class to improve the store when the file is too large
    // public function batchSize(): int
    // {
    //     return 1000;
    // }
}
