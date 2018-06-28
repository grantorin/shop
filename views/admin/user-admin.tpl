{if !$rsUsers}
    <div class="alert alert-secondary" role="alert">
        {$helpers['message']['empty-content']}
    </div>
{else}
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        {foreach $rsUsers as $item name=user}
            <tr>
                <th scope="row">{$smarty.foreach.user.iteration}</th>
                <td>{$item['id']}</td>
                <td>{$item['email']}</td>
                <td>{$item['name']}</td>
                <td><small>{$item['phone']}</small></td>
                <td><small>{$item['address']}</small></td>
                <td><small>{$helpers['status'][$item['role']]}</small></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}