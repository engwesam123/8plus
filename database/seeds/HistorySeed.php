<?php

use App\History;
use App\HistoryDate;
use App\HistoryTranslation;
use Illuminate\Database\Seeder;

class HistorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'image' => 'backend/img/default.jpg'
        ];
        $history = History::create($data);

        $dataTrans = [
            [
                'history_id' => $history->id,
                'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'locale' => 'en'
            ],
            [
                'history_id' => $history->id,
                'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'locale' => 'ar'
            ]
        ];

        HistoryTranslation::insert($dataTrans);


        HistoryDate::create([
            'history_id' => $history->id,
            'history_date' => now()->format('Y'),
            'content_ar' => "تشييد",
            'content_en' => "Tasheed"
        ]);
    }
}
