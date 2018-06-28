        {if $rsProducts}
              <div class="row">
                  {*this loop working on children category*}
                  {foreach $rsProducts as $item name=products}
                      <div class="col-lg-6 col-xl-4">
                          <div class="card mb-4">
                              <img class="card-img-top" src="/img/products/{$item['image']}" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title">{$item['name']}</h5>
                                  <a href="/product/{$item['id']}/" class="btn btn-primary">Go product</a>
                              </div>
                          </div>
                          {if $smarty.foreach.products.iteration mod 3 == 0}
                              <!-- {$smarty.foreach.products.iteration} -->
                          {/if}
                      </div>
                  {/foreach}
              </div>
        {elseif $rsChildCats}

            {*this loop working on parent category*}
            {foreach $rsChildCats as $item name=childCats}
                <h2 class="h4"><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
            {/foreach}

        {else}

            <div class="alert alert-secondary" role="alert">
                {$helpers['message']['empty-content']}
            </div>

        {/if}
