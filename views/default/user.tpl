<h2 class="h4 text-center">Your registration data</h2>
<div id="userData">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 612 612"><path d="M573.75 57.375H38.25C17.136 57.375 0 74.511 0 95.625v420.75c0 21.133 17.136 38.25 38.25 38.25h535.5c21.133 0 38.25-17.117 38.25-38.25V95.625c0-21.114-17.117-38.25-38.25-38.25zM554.625 497.25H57.375V204.657l224.03 187.999c7.134 5.967 15.874 8.97 24.595 8.97 8.74 0 17.461-3.003 24.595-8.97l224.03-187.999V497.25zm0-367.487L306 338.379 57.375 129.763V114.75h497.25v15.013z"/></svg></div>
        </div>
        <input class="form-control" type="text" placeholder="{$arUser['email']}" readonly>
    </div>

    {include file="user-form-shipping.tpl"}

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
        </div>
        <input type="password" name="pwd1" class="form-control" placeholder="New Password">
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
        </div>
        <input type="password" name="pwd2" class="form-control" placeholder="Repeat password">
    </div>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
        </div>
        <input type="password" name="curPwd" class="form-control" placeholder="Current Password">
    </div>

    <div class="text-right">
        <button class="btn btn-primary" id="btnUpdate">Update</button>
    </div>
</div>

{*Orders table*}
{if $rsUserOrders}
    <h2>{$helpers['titleOrders']}</h2>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col"># order</th>
            <th scope="col">Status</th>
            <th scope="col">Date create</th>
            <th scope="col">Date payment</th>
            <th scope="col">Info</th>
        </tr>
        </thead>
        <tbody>
        {foreach $rsUserOrders as $item name=orders}
            <tr>
                <th scope="row">{$smarty.foreach.orders.iteration}</th>
                <td><a id="btnGetCurrentOrder" data-toggle="collapse" href="#collapse_{$smarty.foreach.orders.iteration}" role="button">details</a></td>
                <td>{$item['id']}</td>
                <td><small>{$helpers['status'][$item['status']]}</small></td>
                <td><small>{$item['date_created']}</small></td>
                <td><small>{$item['date_payment']}&nbsp;</small></td>
                <td><small>{$item['comment']}</small></td>
            </tr>
            <tr>
                <td class="p-0" colspan="7">
                    {if $item['children']}
                        <div class="collapse" id="collapse_{$smarty.foreach.orders.iteration}">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">#</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {foreach $item['children'] as $itemChild name=products}
                                        <tr>
                                            <th scope="row">{$smarty.foreach.products.iteration}</th>
                                            <td>{$itemChild['product_id']}</td>
                                            <td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
                                            <td>{$itemChild['price']}</td>
                                            <td>{$itemChild['amount']}</td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                        </div>
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{else}
    <div class="alert alert-secondary" role="alert">
        {$helpers['titleOrders']}
    </div>
{/if}