<?php

namespace App\Repositories\Api\TaskManager;

interface TaskManagerInterface
{

    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);

}
