<?php

namespace App\Services;

use App\NoticeTrait;
use App\Models\Skill;
use App\Models\Resume;
use App\Models\Vacation;

class WebhookService
{
    use NoticeTrait;

    public function setVacationTags($id, $request)
    {
        $data = $request->validate([
            'tags' => 'required|array',
        ]);

        $tags = $data['tags'];

        $vacation = Vacation::where('id', $id)
            ->first();

        // if (!$vacation) {
        //     $this->notice('404', 'Вакансия не найдена!');
        // }

        if ($vacation) {
            $this->setTags($vacation, $tags);
        }

        return $this->notice(200, 'Успешно!');
    }

    public function setResumeTags($id, $request)
    {
        $data = $request->validate([
            'tags' => 'required|array',
        ]);

        $tags = $data['tags'];

        $resume = Resume::where('id', $id)
            ->first();

        // if (!$resume) {
        //     $this->notice('404', 'Резюме не найдено!');
        // }

        if ($resume) {
            $this->setTags($resume, $tags);
        }

        return $this->notice(200, 'Успешно!');
    }

    private function setTags($model, $tags)
    {
        $skillIds = [];

        foreach ($tags as $tag) {
            $skill = Skill::firstOrCreate(
                ['title' => $tag]
            );

            $skillIds[] = $skill->id;
        }

        $model->skills()->syncWithoutDetaching($skillIds);
    }
}