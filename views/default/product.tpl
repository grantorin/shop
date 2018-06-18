    <h3>{$rsProduct['name']}</h3>
    <div>
        <div class="float-lg-left mr-lg-3 mb-lg-2">
            <img src="/img/products/{$rsProduct['image']}" alt="{$rsProduct['name']}" class="img-fluid d-block mx-auto">
        </div>
        <h4>Стоимость: <span class="badge badge-secondary">{$rsProduct['price']}</span></h4>
        <p>Описание:<br>{$rsProduct['description']}</p>
        <button id="btnAddCart_{$rsProduct['id']}"
                type="button" data-product="{$rsProduct['id']}"
                class="btnAddCart btn btn-danger"
                title="Add to Cart"
                {if $itemInCart}
                    style="display: none;"
                {/if}
                >Add to Cart
        </button>
        <button id="removeCart_{$rsProduct['id']}"
                type="button" data-product="{$rsProduct['id']}"
                class="btnRemoveCart btn btn-secondary"
                title="Remove Cart"
                {if !$itemInCart}
                    style="display: none;"
                {/if}
                >Remove Cart
        </button>
    </div>
