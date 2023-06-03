<?php

namespace App\Traits;

use Exception;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

trait DataExtractor
{
    public function dataFromFile($fileName, $col = 0)
    {
        $extension = pathinfo(Storage::path($fileName), PATHINFO_EXTENSION);
        $filePath = Storage::path($fileName);
        $pattern = "/^\+?1?[-.\s]?\(?[2-9]\d{2}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/";
        try {
            if ($extension === 'csv') {
                // Parse the CSV file using league/csv library
                $csv = Reader::createFromPath($filePath, 'r');

                $csv->setHeaderOffset(0); // Skip the header row

                if (!preg_match($pattern, array_values($csv->first())[$col])) {
                  return false;
                }

                foreach ($csv as $record) {

                    $values = $this->formateNumber(array_values($record)[$col]); 

                    $data[] = [
                        'number' => $values,
                    ];
                }
                return $data;
            } else if ($extension === 'xls' || $extension === 'xlsx') {
                // Parse the XLS file using phpspreadsheet library
                $spreadsheet = IOFactory::load($filePath);
                $worksheet = $spreadsheet->getActiveSheet();
                $rows = $worksheet->toArray();
                array_shift($rows);
                if (!preg_match($pattern, $rows[0][$col])) {
                    return false;
                }
                foreach ($rows as $record) {
                    $data[] = [
                        'number' => $this->formateNumber($record[$col]),
                    ];
                }
                return $data;
            }
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
    public function formateNumber($number)
    {
        $number = preg_replace('/\D/', '', $number);
        if (strlen($number) > 10) {
            $number = substr($number, -10);
        }
        if (strlen($number) < 10) {
            $number = str_pad($number, 10, '0', STR_PAD_LEFT);
        }
        return $number;
    }
}
