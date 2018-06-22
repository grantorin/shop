<h2>{$helpers['subtitle']}</h2>
<form action="/cart/saveorder/" method="POST" id="frmOrder">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Cost</th>
            </tr>
        </thead>
        <tbody>
        {foreach $rsProducts as $item name=products}
            <tr>
                <th scope="row">{$smarty.foreach.products.iteration}</th>
                <td><a href="/product/{$item['id']}/" target="_blank">{$item['name']}</a></td>
                <td>
                    <div id="itemCnt_{$item['id']}" class="form-group">
                        <input type="hidden" name="itemCnt_{$item['id']}" class="form-control" value="{$item['cnt']}">
                        {$item['cnt']}
                    </div>
                </td>
                <td>
                    <div id="itemPrice_{$item['id']}" class="form-group">
                        <input type="hidden" name="itemPrice_{$item['id']}" class="form-control" value="{$item['price']}">
                        {$item['price']}
                    </div>
                </td>
                 <td>
                    <div id="itemRealPrice_{$item['id']}" class="form-group">
                        <input type="hidden" name="itemRealPrice_{$item['id']}" class="form-control" value="{$item['realPrice']}">
                        {$item['realPrice']}
                    </div>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>

    {if isset($arUser)}
        <div id="shippingBoxOrder">

            {include file="user-form-shipping.tpl"}

        </div>

    {else}

        <div id="shippingBoxOrder" style="display: none;">
            {include file="user-form-shipping.tpl"}
        </div>

        {include file='user-form-auth.tpl'}

        {include file='user-form-registration.tpl'}

    {/if}

    <div class="btnOrderBox text-right" {if !isset($arUser)}style="display: none;"{/if}>
        <button id="btnOrderCheckout" type="button" class="btn btn-success">Order checkout</button>
    </div>

</form>