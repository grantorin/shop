<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">ID</th>
        <th scope="col">Parent</th>
        <th scope="col">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    {foreach $rsCategories as $item name=cat}
        <tr id="catBox_{$item['id']}">
            <th scope="row">{$smarty.foreach.cat.iteration}</th>
            <td>
                <input class="form-control" type="text" name="cat" value="{$item['name']}">
            </td>
            <td>{$item['id']}</td>
            <td>
                <select name="catParent" class="custom-select">
                    <option value="0">Primary Category</option>
                    {foreach $rsCategoriesPrimary as $itemParent}
                        <option value="{$itemParent['id']}" {if $item['parent_id'] == $itemParent['id']}selected{/if}>{$itemParent['name']}</option>
                    {/foreach}
                </select>
            </td>
            <td>
                <button class="btnUpdateCat btn btn-primary" data-item="{$item['id']}" type="button">Update</button>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>