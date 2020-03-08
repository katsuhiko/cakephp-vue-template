<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Exception\ApplicationException;
use Cake\Datasource\ConnectionManager;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{
    /** */
    public function search(): void
    {
        $tasks = $this->Tasks->find()->all();

        $this->set([
            'tasks' => $tasks,
            '_serialize' => ['tasks']
        ]);
    }

    /**
     * @param string $id
     */
    public function detail(string $id): void
    {
        $task = $this->Tasks->get($id);

        $this->set([
            'task' => $task,
            '_serialize' => ['task']
        ]);
    }

    /** */
    public function create(): void
    {
        $data = $this->request->input('json_decode', true);

        $task = $this->Tasks->newEntity($data);
        if ($task->hasErrors()) {
            $this->set([
                'errors' => $task->getErrors(),
                '_serialize' => ['errors']
            ]);
            return;
        }

        ConnectionManager::get('default')->transactional(function () use ($task) {
            if (!$this->Tasks->save($task)) {
                throw new ApplicationException(__('登録できませんでした。'));
            }
        });

        $this->set([
            'task' => $task,
            '_serialize' => ['task']
        ]);
    }

    /**
     * @param string $id
     */
    public function update(string $id): void
    {
        $data = $this->request->input('json_decode', true);
        $task = $this->Tasks->get($id);

        $task = $this->Tasks->patchEntity($task, $data);
        if ($task->hasErrors()) {
            $this->set([
                'errors' => $task->getErrors(),
                '_serialize' => ['errors']
            ]);
            return;
        }

        ConnectionManager::get('default')->transactional(function () use ($task) {
            if (!$this->Tasks->save($task)) {
                throw new ApplicationException(__('更新できませんでした。'));
            }
        });

        $this->set([
            'task' => $task,
            '_serialize' => ['task']
        ]);
    }

    /**
     * @param string $id
     */
    public function delete(string $id): void
    {
        $task = $this->Tasks->get($id);

        ConnectionManager::get('default')->transactional(function () use ($task) {
            if (!$this->Tasks->delete($task)) {
                throw new ApplicationException(__('削除できませんでした。'));
            }
        });

        $this->response = $this->response->withStatus(204);
        $this->set(['_serialize' => '']);
    }
}
