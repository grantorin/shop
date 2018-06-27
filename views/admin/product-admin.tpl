<form id="newProductBox" method="post" enctype="multipart/form-data">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td><label for="newProdName">Name</label></td>
                <td><input type="text" name="newProdName" id="newProdName" class="form-control"></td>
            </tr>
            <tr>
                <td><label for="newProdPrice">Price</label></td>
                <td><input type="number" name="newProdPrice" id="newProdPrice" class="form-control" min="0"></td>
            </tr>
            <tr>
                <td><label for="newProdCatList">Category</label></td>
                <td>
                    <select name="newProdCatList" id="newProdCatList" class="custom-select">
                        <option value="0">Primary Category</option>
                        {foreach $rsCategories as $item}
                            <option value="{$item['id']}">{$item['name']}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="newProdDescription">Description</label></td>
                <td><textarea name="newProdDescription" id="newProdDescription" class="form-control" rows="6">{$item['description']}</textarea></td>
            </tr>
            <tr>
                <td>
                    Image <small class="form-text text-muted d-inline">(max size 4 Mb)</small>
                </td>
                <td>
                    <div class="custom-file">
                        <input type="file" name="fileimg" class="custom-file-input js-uploadFile" id="newProdChoseImage">
                        <label id="newProdImageLable" class="custom-file-label" for="newProdChoseImage">Choose file</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-right" colspan="2"><button id="btnAddProduct" class="btn btn-primary">Save</button></td>
            </tr>
        </tbody>
    </table>
</form>

<table class="table bg-light">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Name/Price/Category</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach $rsProducts as $item name=prod}
        <tr id="prodBox_{$item['id']}">
            <th scope="row" width="5%" rowspan="2">{$smarty.foreach.prod.iteration}</th>
            <td width="5%" rowspan="2">{$item['id']}</td>
            <td rowspan="2">
                <input type="text" name="name" class="form-control mb-2" value="{$item['name']}">
                <input type="number" name="price" class="form-control mb-2" value="{$item['price']}">

                <select name="catParent" class="custom-select">
                    <option value="0">Primary Category</option>
                    {foreach $rsCategories as $itemCat}
                        <option value="{$itemCat['id']}" {if $item['category_id'] == $itemCat['id']}selected{/if}>{$itemCat['name']}</option>
                    {/foreach}
                </select>
            </td>
            <td width="35%" rowspan="2">
                <textarea class="form-control fs-sm" name="description" rows="10">{$item['description']}</textarea>
            </td>
            <td width="15%">
                {if $item['image']}
                    <img src="/img/products/{$item['image']}" alt="{$item['name']}" class="img-fluid">
                {else}
                    No image
                {/if}
            </td>
            <td width="10%">
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" name="del" class="custom-control-input" id="del_{$item['id']}" value="1">
                    <label class="custom-control-label" for="del_{$item['id']}"><small>Delete</small></label>
                </div>
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" name="status" class="custom-control-input" id="hide_{$item['id']}" value="0" {if !$item['status']}checked{/if}>
                    <label class="custom-control-label" for="hide_{$item['id']}"><small>Hide</small></label>
                </div>
                <button class="btnUpdateProduct btn btn-primary" data-id="{$item['id']}">Save</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <form action="/admin/upload/" method="POST" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="fileimg" class="custom-file-input js-uploadFile" id="uploadfile_{$item['id']}">
                        <label id="uploadLable_{$item['id']}" class="custom-file-label" for="uploadfile_{$item['id']}">Choose file</label>
                    </div>
                    <input type="hidden" name="itemID" value="{$item['id']}">
                    <input type="submit" class="btn btn-info btn-block mt-2" value="Upload">
                </form>
            </td>
        </tr>
    {/foreach}
</table>