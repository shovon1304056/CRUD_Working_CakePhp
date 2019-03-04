<table class="table" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th style="width: 3%;"></th>

        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
        <th scope="col"><?= $this->Paginator->sort('description') ?></th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td style="width: 3%;"><input type="checkbox" value=""></td>

            <td><?= h($post->title) ?></td>
            <td><?= h($post->description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

