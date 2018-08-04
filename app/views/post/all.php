<p>Список всех сообщений</p>

<ul>
    <?php foreach($posts as $post): ?>
        <li>
            Тема: <?= $post->theme->title ?><br>
            Сообщение: <?= $post->content ?><br>
            Автор: <?= $post->user->name ?><br>
        </li>
    <?php endforeach ?>
</ul>

