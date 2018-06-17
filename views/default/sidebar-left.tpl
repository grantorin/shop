<aside class="sidebar">

    {if $rsCategories}

        <ul class="list-group">
            {foreach $rsCategories as $item}
                <li class="list-group-item">
                    <a href="/?controller=category&id={$item['id']}">{$item['name']}</a>
                    {if isset({$item['children']})}
                        <ul>
                            {foreach $item['children'] as $itemChild}
                                <li><a href="/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a></li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>
            {/foreach}
        </ul>

    {/if}

</aside>