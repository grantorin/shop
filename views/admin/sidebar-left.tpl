<aside class="sidebar">
    <div class="list-group">
        <a href="/admin/"
           class="list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['index']}
                active
            {else}
                bg-dark
            {/if}">
            Home
        </a>
        <a href="/admin/category/"
           class="list-group-item list-group-item-action text-light
            {if $helpers['activeMenu']['categories']}
                active
            {else}
                bg-dark
            {/if}">
            Categories
        </a>
        <a href="/admin/products/"
           class="list-group-item list-group-item-action text-light
            {if $helpers['activeMenu']['products']}
                active
            {else}
                bg-dark
            {/if}">
            Products
        </a>
        <a href="/admin/orders/"
           class="list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['orders']}
                active
            {else}
                bg-dark
            {/if}">
            Orders
        </a>
    </div>
</aside>