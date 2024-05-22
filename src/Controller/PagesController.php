<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\BadRequestException;
use Cake\Utility\Security;
use Throwable;

/**
 * @property \Cake\ORM\Table|\App\Model\Table\SecretsTable $Secrets
 */
class PagesController extends AppController
{
    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->Secrets = $this->getTableLocator()->get('Secrets');
    }

    /**
     * @return void
     */
    public function index(): void
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

    /**
     * @return void
     */
    public function message(): void
    {
        $exists = false;
        $message = false;

        try {
            $query = $this->request->getQuery('key');
            if (empty($query) || \is_array($query)) {
                throw new BadRequestException();
            }
            $key = substr($query, 0, 32);
            $cipher = substr($query, 32, 32);

            /** @var \App\Model\Entity\Secret $secretEntity */
            $secretEntity = $this->Secrets->find()
                ->where(['key' => $key])
                ->firstOrFail();

            $exists = true;

            if ($this->request->is('post') && $this->request->getData('show') && $exists === true) {
                $this->Secrets->delete($secretEntity);
                $message = Security::decrypt(base64_decode($secretEntity->data), $cipher);
            }
        } catch (Throwable $t) {
            // Do nothing
        }

        $this->set(compact('exists', 'message'));
    }
}
