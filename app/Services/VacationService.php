<?php

namespace App\Services;

use App\Models\Hit;
use App\NoticeTrait;
use App\Models\Resume;
use App\Models\Vacation;
use Illuminate\Support\Facades\Session;

class VacationService
{
    use NoticeTrait;

    private $paginate = 6;

    /**
     * Get paginated vacations
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate()
    {
        $page = request('page') ?? 1;
        $isAuth = Session::has('token');
        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        $vacations = Vacation::where('status', '<>', 'draft');

        if ($userRole === 'hunter' || !$isAuth) {
            $vacations = $vacations->where('status', 'published');
        }

        if ($userRole === 'hr') {
            $vacations = $vacations->where('user_id', $userID);
        }

        return $vacations->paginate($this->paginate, ['*'], 'page', $page);
    }

    /**
     * Get Vacation by ID
     * @param mixed $id
     * @return Vacation
     */
    public function getByID($id)
    {
        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        $vacation = Vacation::where('id', $id)
            ->where('status', '<>', 'draft');

        if ($userRole === 'hunter') {
            $vacation = $vacation->where('status', 'published');
        }

        if ($userRole === 'hr') {
            $vacation = $vacation->where('user_id', $userID);
        }

        if (!$vacation) {
            abort(404);
        }

        return $vacation;
    }

    public function hunterApply($request)
    {
        $data = $request->validate([
            'vacation_id' => 'required|integer',
            'resume_id' => 'required|integer',
        ]);

        $vacationID = $data['vacation_id'];
        $resumeID = $data['resume_id'];
        $userID = Session::get('user_id');

        $resume = Resume::where('id', $resumeID)
            ->where('status', 'published')
            ->first();

        if (!$resume || ($resume->user_id !== $userID)) {
            return $this->notice('404', 'Ваше резюме не найдено!');
        }

        $vacation = Vacation::where('id', $vacationID)
            ->where('status', 'published')
            ->first();

        if (!$vacation) {
            return $this->notice('404', 'Вакансия не найдена!');
        }

        $hit = Hit::where('vacation_id', $vacationID)
            ->where('resume_id', $resumeID)
            ->where('status', '<>', 'draft')
            ->first();

        if (!$hit) {
            $hit = Hit::create([
                'vacation_id' => $vacationID,
                'resume_id' => $resumeID,
                'status' => 'new',
            ]);
        }

        $hit->update(['hunter_status' => 'approved']);

        return $this->notice(200, 'Успешно!');
    }

    /**
     * Store Vacation
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function store($request)
    {
        $data = $request->validated();

        $userID = Session::get('user_id');
        $userRole = Session::get('role');

        if ($userRole !== 'hr' && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете создавать вакансию!');
        }

        $data['user_id'] = $userID;
        $data['status'] = 'published';

        $vacation = Vacation::create($data);

        return $this->notice('200', 'Успешно!', ['vacation' => $vacation]);
    }

    /**
     * Update Vacation
     * @param mixed $id
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function update($id, $request)
    {
        $data = $request->validated();

        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        if ($userRole !== 'hr' && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете редактировать вакансии!');
        }

        $vacation = Vacation::where('id', $id)
            ->where('status', '<>', 'draft');

        if (!$vacation) {
            return $this->notice('404', 'Вакансия не найдена!');
        }

        if ($userID !== $vacation->user_id && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете редактировать эту вакансию!');
        }

        $vacation->update($data);

        return $this->notice('200', 'Успешно!', ['vacation' => $vacation]);
    }

    /**
     * Destroy Vacation
     * @param mixed $id
     * @return array{code: mixed}
     */
    public function destroy($id)
    {
        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        if ($userRole !== 'hr' && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете удалять вакансии!');
        }

        $vacation = Vacation::where('id', $id)
            ->where('status', '<>', 'draft');

        if (!$vacation) {
            return $this->notice('404', 'Вакансия не найдена!');
        }

        if ($userID !== $vacation->user_id && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете удалить эту вакансию!');
        }

        $vacation->update(['status' => 'draft']);

        return $this->notice('200', 'Успешно!');
    }
}