<?php

namespace App\Services;

use App\Models\Vacation;
use App\NoticeTrait;
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
        $userRole = Session::get('role');
        $userID = Session::get('user_id');

        $vacations = Vacation::where('status', '<>', 'draft');

        if ($userRole === 'hunter') {
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

    /**
     * Store Vacation
     * @param mixed $request
     * @return array{code: mixed}
     */
    public function store($request)
    {
        $data = $request->validated();

        $userRole = Session::get('role');

        if ($userRole !== 'hr' && $userRole !== 'admin') {
            return $this->notice('403', 'Вы не можете создавать вакансию!');
        }

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

        $success = $vacation->update(['status' => 'draft']);

        return $this->notice('200', 'Успешно!');
    }
}