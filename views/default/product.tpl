    <h3>{$rsProduct['name']}</h3>
    <div>
        <div class="float-lg-left mr-lg-3 mb-lg-2">
            <img src="/img/products/{$rsProduct['image']}" alt="{$rsProduct['name']}" class="img-fluid d-block mx-auto">
        </div>
        <h4>Стоимость: <span class="badge badge-secondary">{$rsProduct['price']}</span></h4>
        <p>Описание:<br>{$rsProduct['description']}</p>
        <a href="#" class="btn btn-danger">Add to Cart</a>
    </div>
