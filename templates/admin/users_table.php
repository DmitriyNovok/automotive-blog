<thead>
<tr>
    <th>ID</th>
    <th>Имя пользователя</th>
    <th>Email пользователя</th>
    <th>Количество статей</th>
    <th scope="row"></th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $user) { ?>
    <tr>
        <td><a href="admin.php?dispatch=user_read&id=<?= $user->id ?>"><?= $user->id ?></a></td>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->get_count_articles() ?></td>
        <td>
            <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=user_update&id=<?= $user->id ?>">Редактировать</a>
            <a class="btn btn-outline-success my-2 my-sm-0" href="admin.php?dispatch=user_delete&id=<?= $user->id ?>">Удалить</a>
        </td>
    </tr>
<?php } ?>
</tbody>