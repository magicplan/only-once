<main class="h-full max-w-screen-md mx-auto flex items-center justify-center">
    <div class="w-full">
        <section>
            <div class="p-6">

                <?= $this->Flash->render(); ?>

                <?php if(!empty($entity->secret)): ?>

                    <div class="mt-8 space-y-4">
                        <div>
                            <?= $this->Form->label('secret', 'Your Message', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                            <?= $this->Form->control('secret', [
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-500 rounded-md',
                                'rows' => 6,
                                'value' => $entity->secret,
                            ]); ?>
                            <?= $this->Form->label('secret', 'Do not refresh this page. Your message was already deleted.', ['class' => 'block mt-1 text-xs text-gray-400']); ?>
                        </div>
                        <div>
                            <a href="/" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 ring-offset-white dark:ring-offset-black">
                                Cretae new link
                            </a>
                        </div>
                    </div>

                <?php else: ?>

                    <?= $this->Form->create($entity, ['class' => 'mt-8 space-y-4', 'novalidate']); ?>
                        <div>
                            <?= $this->Form->label('secret', 'Your Secret', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                            <?= $this->Form->control('secret', [
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-500 rounded-md',
                                'rows' => 6,
                            ]); ?>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 ring-offset-white dark:ring-offset-black">
                                Create Link
                            </button>
                        </div>

                    <?= $this->Form->end(); ?>

                <?php endif; ?>

                <?php if(!empty($link)): ?>

                    <div class="mt-12 space-y-4">
                        <div>
                            <?= $this->Form->label('link', 'Your Link', ['class' => 'mb-2 block text-xl font-medium text-black dark:text-white']); ?>
                            <?= $this->Form->control('link', [
                                'label' => false,
                                'id' => 'link-input',
                                'class' => 'bg-white dark:bg-black text-black dark:text-white focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-500 rounded-md',
                                'value' => $link,
                            ]); ?>
                        </div>
                        <div>
                            <button id="copy-link-btn" class="inline-flex justify-center py-2 px-4 border border-transparent text-md font-medium rounded-md text-white dark:text-black bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 ring-offset-white dark:ring-offset-black">
                                Copy Link
                            </button>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </section>
    </div>
</main>