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
                    $link = env('MAIN_DOAMIN') . 'message/?key=' . $key . $cipher;
                } else {
                    $this->Flash->error('Something went wrong');
                }
            }
        }

        $this->set(compact('entity', 'link'));
    }

    public function message()
    {
        $exists = false;
        $message = false;

        try {
            $query = $this->request->getQuery('key');
            $key = substr($query, 0, 32);
            $cipher = substr($query, 32, 32);

            $secretEntity = $this->Secrets->find()
                ->where(['key' => $key])
                ->firstOrFail();

            $exists = true;
        } catch (Throwable $t) {
            // Do nothing
        }

        if ($this->request->is('post') && $this->request->getData('show') && $exists === true) {
            $this->Secrets->delete($secretEntity);
            $message = Security::decrypt(base64_decode($secretEntity->data), $cipher);
        }

        $this->set(compact('exists', 'message'));
    }
}
