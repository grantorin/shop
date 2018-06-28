{if !$rsOrders}
    <div class="alert alert-secondary" role="alert">
        {$helpers['message']['empty-content']}
    </div>
{else}
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Order ID</th>
            <th scope="col">Status</th>
            <th scope="col">Date Create</th>
            <th scope="col">Date Payment</th>
            <th scope="col">Info</th>
            <th scope="col">Date Change</th>
        </tr>
        </thead>
        <tbody>
        {foreach $rsOrders as $item name=order}
            <tr>
                <th scope="row">{$smarty.foreach.order.iteration}</th>
                <td><a href="#collapse_{$smarty.foreach.order.iteration}" data-toggle="collapse">{$helpers['message']['details-order']}</a></td>
                <td>{$item['id']}</td>
                <td><small>{$helpers['status'][$item['status']]}</small></td>
                <td><small>{$item['date_created']}</small></td>
                <td id="date_{$item['id']}">
                    <small class="date-payment">{$item['date_payment']}</small>
                    <input type="date" name="date" value="">
                    <input type="hidden" name="id" value="{$item['id']}">
                    <button class="btnSetStatusDate btn btn-primary btn-block mt-2" data-id="{$item['id']}">set</button>
                </td>
                <td><small>{$item['comment']}</small></td>
                <td><small>{$item['date_modification']}</small></td>
            </tr>
            <tr>
                <td class="p-0" colspan="8">
                    {if $item['children']}
                        <div class="collapse" id="collapse_{$smarty.foreach.order.iteration}">
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
                                        <th scope="row">{$smarty.foreach.order.iteration}</th>
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
{/if}