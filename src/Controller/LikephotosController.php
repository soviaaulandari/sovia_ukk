<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Likephotos Controller
 *
 * @property \App\Model\Table\LikephotosTable $Likephotos
 */
class LikephotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Likephotos->find()
            ->contain(['Users', 'Photos']);
        $likephotos = $this->paginate($query);

        $this->set(compact('likephotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Likephoto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $likephoto = $this->Likephotos->get($id, contain: ['Users', 'Photos']);
        $this->set(compact('likephoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $likephoto = $this->Likephotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $likephoto = $this->Likephotos->patchEntity($likephoto, $this->request->getData());
            if ($this->Likephotos->save($likephoto)) {
                $this->Flash->success(__('The likephoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likephoto could not be saved. Please, try again.'));
        }
        $users = $this->Likephotos->Users->find('list', limit: 200)->all();
        $photos = $this->Likephotos->Photos->find('list', limit: 200)->all();
        $this->set(compact('likephoto', 'users', 'photos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Likephoto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $likephoto = $this->Likephotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likephoto = $this->Likephotos->patchEntity($likephoto, $this->request->getData());
            if ($this->Likephotos->save($likephoto)) {
                $this->Flash->success(__('The likephoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likephoto could not be saved. Please, try again.'));
        }
        $users = $this->Likephotos->Users->find('list', limit: 200)->all();
        $photos = $this->Likephotos->Photos->find('list', limit: 200)->all();
        $this->set(compact('likephoto', 'users', 'photos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Likephoto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $likephoto = $this->Likephotos->get($id);
        if ($this->Likephotos->delete($likephoto)) {
            $this->Flash->success(__('The likephoto has been deleted.'));
        } else {
            $this->Flash->error(__('The likephoto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
