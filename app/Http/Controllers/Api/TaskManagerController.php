<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Api\TaskManager\TaskManagerInterface;


class TaskManagerController extends Controller
{
    protected $taskmanager;

    public function __construct(TaskManagerInterface $taskmanager)
    {
        $this->taskmanager = $taskmanager;
    }

    public function index()
    {
        return $this->taskmanager->index();
    }

    public function store(Request $request)
    {
        return $this->taskmanager->store($request);
    }
    public function update(Request $request)
    {
        return $this->taskmanager->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->taskmanager->destroy($request);
    }
}
