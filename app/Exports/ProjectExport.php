<?php

namespace App\Exports;

use App\Filform;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProjectExport implements FromCollection,WithHeadings,ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
      public function headings(): array {
        return [
        "Название проекта","ФИО руководителя","app"
        ];
      }

      public function collection()
      {
          return Filform::select('name_fill','years', 'app')->get();
      }
}
