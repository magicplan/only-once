<main class="h-full max-w-screen-md mx-auto flex items-center justify-center">
    <div class="w-full">
        <section>
            <div class="p-6">

                <?= $this->Html->image('/img/logo-dark.svg', ['class' => 'w-48 hidden dark:block']) ?>
                <?= $this->Html->image('/img/logo-light.svg', ['class' => 'w-48 block dark:hidden']) ?>

                <?= $this->Flash->render(); ?>

                <?= $this->Form->create($entity, ['class' => 'mt-12 space-y-4', 'novalidate']); ?>
                    <div>
                        <?= $this->Form->label('secret', 'Your Secret', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                        <?= $this->Form->control('secret', [
                            'type' => 'textarea',
                            'label' => false,
                            'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-500 rounded-md',
                            'rows' => 6,
                        ]); ?>
                    </div>
                    <div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-white dark:ring-offset-black">
                            Create Link
                        </button>
                    </div>

                <?= $this->Form->end(); ?>


                <?php if(!empty($link)): ?>

                    <div class="mt-12 space-y-4">
                        <div>
                            <?= $this->Form->label('link', 'Your Link', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                            <?= $this->Form->control('link', [
                                'label' => false,
                                'id' => 'link-input',
                                'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-500 rounded-md',
                                'value' => $link,
                            ]); ?>
                        </div>
                        <div>
                            <button id="copy-link-btn" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-white dark:ring-offset-black">
                                Copy Link
                            </button>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </section>
    </div>
</main>