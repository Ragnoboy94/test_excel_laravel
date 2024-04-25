<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessExcelFile;
use Illuminate\Http\Request;

class ExcelUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls'
        ]);

        $file = $request->file('excel_file')->store('uploads');

        ProcessExcelFile::dispatch($file);

        return back()->with('success', 'Файл успешно загружен и обрабатывается.');
    }

}
