<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Utility\Security;
use Throwable;

class PagesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Secrets');
    }

    public function index()
    {
        $entity = $this->Secrets->newEmptyEntity();
        $link = null;

        if ($this->request->is('get') && !empty($this->request->getQuery('key'))) {
            $query = $this->request->getQuery('key');

            $key = substr($query, 0, 32);
            $cipher = substr($query, 32, 32);

            $secret = $this->Secrets->find()
                ->where(['key' => $key])
                ->firstOrFail();
            $this->Secrets->delete($secret);

            $entity->secret = Security::decrypt(base64_decode($secret->data), $cipher);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            $key = Security::randomString(32);
            $cipher = Security::randomString(32);

            $secret = $this->request->getData('secret');
            if (!empty($secret)) {
                $entity = $this->Secrets->patchEntity($entity, [
                    'key' => $key,
                    'data' => base64_encode(Security::encrypt($secret, $cipher)),
                ], [
                    'accessibleFields' => [
                        'key' => true,
                        'data' => true,
                    ],
                ]);

                if ($this->Secrets->save($entity)) {
                    $link = env('MAIN_DOAMIN') . '?key=' . $key . $cipher;
                } else {
                    $this->Flash->error('Something went wrong');
                }
            }
        }

        $this->set(compact('entity', 'link'));
    }
}
