     {if isset($rsProducts)}

         <div class="row">

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

         <nav aria-label="Page navigation">
             <ul class="pagination">
                 {if $paginator['cur_page'] != 1}
                     <li class="page-item"><a class="page-link" href="{$paginator['link']}{$paginator['cur_page'] - 1}">&laquo;</a></li>
                 {/if}

                 {for $i=1 to $paginator['page_count'] }
                     {if $i == $paginator['cur_page']}
                         <li class="page-item active"><span class="page-link">{$paginator['cur_page']}<span class="sr-only">(current)</span></span></li>
                     {else}
                         <li class="page-item"><a class="page-link" href="{$paginator['link']}{$i}">{$i}</a></li>
                     {/if}
                 {/for}

                 {if $paginator['cur_page'] < $paginator['page_count']}
                     <li class="page-item"><a class="page-link" href="{$paginator['link']}{$paginator['cur_page'] + 1}">&raquo;</a></li>
                 {/if}
             </ul>
         </nav>

     {/if}