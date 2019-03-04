<?php
/**
 * Created by PhpStorm.
 * User: SHUVOJOTY
 * Date: 2/3/2019
 * Time: 1:02 AM
 */


namespace App\Controller;

use App\Controller\AppController;
use phpDocumentor\Reflection\Types\Null_;

class PostsController extends AppController
{



    public function index()
    {
        //$this->autoRender = false;

        $this->set('posts', $this->Posts->find('all'));
    }

    public function add()
    {
        //$this->autoRender = false;

        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success('Post added successfully', ['key' => 'message_add']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('unable to add post'));
        }
        $this->set('post', $post);
    }

    public function view($id = Null)
    {
        $posts = $this->Posts->get($id);
        $this->set('postid', $posts);
    }

    public function edit($id = Null)

    {
        $post = $this->Posts->get($id);

        if ($this->request->is(['post', 'patch', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success('Post updated successfully', ['key' => 'message_edit']);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('unable to edit post'));
        }
        $this->set('post', $post);

    }

    public function delete($id = Null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success('Post Deleted successfully', ['key' => 'message_delete']);
            return $this->redirect(['action' => 'index']);


        }
        $this->set('post', $post);

    }


    public function search()
    {
        $data = $this->request->getQueryParams();
///// search query /////
        $posts = $this->Posts->find()
            ->where([
                'OR' => [
                    'title LIKE' => '%'.$data['array_name_str'].'%',
                    'description LIKE' => '%'.$data['array_name_str'].'%'
                ]
            ]);

        $this->set(compact('posts'));
    }



}


?>
