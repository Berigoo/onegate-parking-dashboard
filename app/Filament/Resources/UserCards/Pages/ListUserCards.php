<?php

namespace App\Filament\Resources\UserCards\Pages;

use App\Models\UserCards;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\UserCards\UserCardsResource;
use Filament\Actions\CreateAction;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Pages\ListRecords;

class ListUserCards extends ListRecords
{
    protected static string $resource = UserCardsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Actions\Action::make('importExcel')
            ->label('Import User Cards from Excel')
            ->form([
                Forms\Components\FileUpload::make('file')
                    ->required()
                    ->disk('local')
                    ->directory('imports')
                    ->visibility('private')
                    ->acceptedFileTypes([
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ]),
            ])
            ->action(function (array $data) {
                $path = $data['file']; // e.g. imports/abc123.xlsx

                $fullPath = Storage::disk('local')->path($path);

                $rows = \Maatwebsite\Excel\Facades\Excel::toArray([], $fullPath)[0];

                foreach ($rows as $index => $row) {
                    if ($index === 0) continue;

                    UserCards::create([
                        'uid' => $row[0],
                        'nama' => $row[1],
                    ]);
                }

                // optional: delete after processing
                Storage::disk('local')->delete($path);
            }),
        ];
    }
}
