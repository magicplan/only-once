<main class="h-full max-w-screen-md mx-auto flex items-center justify-center">
    <div class="w-full">
        <section>
            <div class="p-6">

                <?= $this->Html->image('/img/logo-dark.svg', ['class' => 'w-48 hidden dark:block']) ?>
                <?= $this->Html->image('/img/logo-light.svg', ['class' => 'w-48 block dark:hidden']) ?>

                <?= $this->Flash->render(); ?>

                <?php if ($exists === true && $message !== false): ?>

                   <div class="mt-12 space-y-4">
                        <div>
                            <?= $this->Form->label('message', 'The secret message', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                            <?= $this->Form->control('message', [
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-500 rounded-md',
                                'rows' => 8,
                                'value' => $message,
                            ]); ?>
                            <?= $this->Form->label('message', 'Do not refresh this page. Your message has been already deleted.', ['class' => 'block mt-1 text-xs text-gray-400']); ?>
                        </div>
                        <div>
                            <a href="/" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-white dark:ring-offset-black">
                                Create new link
                            </a>
                        </div>
                    </div>

                <?php elseif ($exists === true): ?>

                    <?= $this->Form->create(null, ['class' => 'mt-12 space-y-4', 'novalidate']); ?>

                        <?= $this->Form->hidden('show', [
                            'value' => 1,
                        ]); ?>
                        
                        <div>
                            <div class="mb-4 text-2xl font-medium text-black dark:text-white">
                                You can access the secret message now
                            </div>
                            <div class="mb-4 text-black dark:text-white">
                                The message will be immediately deleted once you accessed it.
                            </div>
                        </div>

                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-white dark:ring-offset-black">
                            Show Message
                        </button>
                     <?= $this->Form->end(); ?>

                <?php else: ?>
                    <div class="mt-12 space-y-4">
                        <div>
                            <div class="mb-4 text-2xl font-medium text-black dark:text-white">
                                No message was found
                            </div>
                            <div class="mb-4 text-black dark:text-white">
                                Their might not be such a key or someone else<br>
                                already accessed the message.
                            </div>
                        </div>
                        <div>
                            <a href="/" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-white dark:ring-offset-black">
                                Create new link
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </div>
</main>