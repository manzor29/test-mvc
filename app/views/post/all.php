<p>Список всех сообщений</p>

<ul>
    <?php foreach($posts as $post): ?>
        <li>
            <?= $post['user'] ?>: <?= $post['message'] ?>
        </li>
    <?php endforeach ?>
</ul>

