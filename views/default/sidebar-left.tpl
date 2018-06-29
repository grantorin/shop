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

    <!-- User login --> {*TODO fix admin login name in frontend*}
    <div id="userBox" class="border p-3 my-3" {if !$arUser}style="display: none;"{/if}>
        <h6>Привет <a id="userNameLink" href="/user/"><span id="userName" class="badge badge-primary">{$arUser['displayName']}</span></a></h6>
        <a href="/user/logout/" class="btn btn-primary mb-2">Logout</a>
    </div>

    {if !{$helpers['hideLoginBox']}}
        {include file='user-form-auth.tpl'}

        {include file='user-form-registration.tpl'}
    {/if}

    <!-- Cart -->
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