<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\{JsonResponse, Request};

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request): JsonResponse
    {
        $taskCreated = Task::create($request->all());
        return response()->json($taskCreated);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy(int $id): JsonResponse
    {
        $isDeleted = Task::destroy($id);
        $responseData = ['is_deleted' => (bool) $isDeleted];
        return response()->json($responseData);
    }

    public function finish(int $id): JsonResponse
    {
        $task = Task::find($id);
        $task->update(['status' => 'done']);
        return response()->json($task);
    }
}
