
    <main class="main">
        <h1>{$pageTitle}</h1>
        <div class="row">

            {*Sidebar*}
            <div class="col-lg-4">
                {include file='sidebar-left.tpl'}
            </div>

            {*Main Content*}
            <div class="col-lg-8">

                {if $rsProducts}

                    <div class="row">

                        {foreach $rsProducts as $item name=products}
                            <div class="col-lg-6 col-xl-4">
                                <div class="card mb-4">
                                    <img class="card-img-top" src="./img/products/{$item['image']}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{$item['name']}</h5>
                                        {*<p class="card-text">{$item['description']}</p>*}
                                        <a href="/product/{$item['id']}" class="btn btn-primary">Go product</a>
                                    </div>
                                </div>
                                {if $smarty.foreach.products.iteration mod 3 == 0}
                                    <!-- {$smarty.foreach.products.iteration} -->
                                {/if}
                            </div>
                        {/foreach}

                    </div>

                {/if}

            </div>

        </div>
    </main>