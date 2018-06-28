<aside class="sidebar">
    <div class="list-group">
        <a href="/admin/home/"
           class="d-flex align-items-center list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['index']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">home</i>
            Home
        </a>
        <a href="/admin/media/"
           class="d-flex align-items-center list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['media']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">perm_media</i>
            Media
        </a>
        <a href="/admin/category/"
           class="d-flex align-items-center list-group-item list-group-item-action text-light
            {if $helpers['activeMenu']['category']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">book</i>
            Categories
        </a>
        <a href="/admin/products/"
           class="d-flex align-items-center list-group-item list-group-item-action text-light
            {if $helpers['activeMenu']['products']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">label</i>
            Products
        </a>
        <a href="/admin/orders/"
           class="d-flex align-items-center list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['orders']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">shopping_cart</i>
            Orders
        </a>
        <a href="/admin/options/"
           class="d-flex align-items-center list-group-item list-group-item-action rounded-0 text-light
            {if $helpers['activeMenu']['options']}
                active
            {else}
                bg-dark
            {/if}">
            <i class="material-icons mr-2">settings</i>
            Options
        </a>
    </div>
</aside>