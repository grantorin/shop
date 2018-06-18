<aside class="sidebar">

    {if $rsCategories}

        <ul class="list-group">
            {foreach $rsCategories as $item}
                <li class="list-group-item">
                    <a href="/category/{$item['id']}/">{$item['name']}</a>
                    {if isset({$item['children']})}
                        <ul>
                            {foreach $item['children'] as $itemChild}
                                <li><a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a></li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>

    {/if}

    <div class="jumbotron jumbotron-fluid p-3">
        <a href="/cart/" title="Go to cart" class="btn btn-primary">
            Cart
            <span id="cartCntItems" class="badge badge-light ml-1">
            {if $cartCntItems > 0}
                {$cartCntItems}
            {else}
                0
            {/if}
        </span>
        </a>
    </div>

</aside>