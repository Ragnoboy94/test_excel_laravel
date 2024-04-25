<?php

namespace App\Imports;

use App\Events\RowCreated;
use App\Models\Row;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class RowsImport implements ToModel,WithChunkReading,WithProgressBar, WithHeadingRow
{
    use Importable;

    private $rowsProcessed = 0;

    /**
     * @param array $row
     *
     * @return Row|null
     */
    public function model(array $row)
    {
        if (!empty($row['id'])) {
            $newRow = new Row([
                'name' => $row['name'],
                'date' => Carbon::createFromFormat('d.m.Y', $row['date'])->format('Y-m-d')
            ]);
            $newRow->save();
            event(new RowCreated($newRow));

            return $newRow;
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
