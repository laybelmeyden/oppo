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
        "Название проекта","Возраст","Пол","Город","Телефон","Почта","Модель продукта","Магазин","Дата покупки","Ссылка на файл"
        ];
      }

      public function collection()
      {
          return Filform::select('name_fill','years','radio','city','numb','email','model','shop','date', 'app')->get();
      }
}
