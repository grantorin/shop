<aside class="sidebar">

    {if $rsCategories}

        <ul class="list-group">
            {foreach $rsCategories as $item}
                <li class="list-group-item"><a href="">{$item['name']}</a></li>
            {/foreach}
        </ul>

    {/if}

</aside>