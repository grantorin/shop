{if !$rsProducts}
    В корзине пусто.
{else}
    <h2 class="text-center">Данные заказа</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {foreach $rsProducts as $item name=products}
            <tr id="rowProduct_{$item['id']}">
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                <td><input type="number" data-price="{$item['price']}" data-prodid="{$item['id']}" class="form-control js-conversionPrice" name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" value="1"></td>
                <td><span id="itemPrice_{$item['id']}">{$item['price']}</span></td>
                <td>
                    <button id="removeCart_{$item['id']}"
                            data-product="{$item['id']}"
                            class="btnRemoveCart btn badge badge-pill badge-danger p-1 fs-0"
                            title="Delete"><svg width="8" height="8" xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 191.414 191.414"><path d="M107.888 96.142l80.916-80.916c3.48-3.48 3.48-8.701 0-12.181s-8.701-3.48-12.181 0L95.707 83.961 14.791 3.045c-3.48-3.48-8.701-3.48-12.181 0s-3.48 8.701 0 12.181l80.915 80.916L2.61 177.057c-3.48 3.48-3.48 8.701 0 12.181 1.74 1.74 5.22 1.74 6.96 1.74s5.22 0 5.22-1.74l80.916-80.916 80.916 80.916c1.74 1.74 5.22 1.74 6.96 1.74 1.74 0 5.22 0 5.22-1.74 3.48-3.48 3.48-8.701 0-12.181l-80.914-80.915z"/></svg>
                    </button>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}