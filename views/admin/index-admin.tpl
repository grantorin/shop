<div class="row">

    <div class="col-lg-6">
        <div id="catBox">
            <div class="form-group">
                <label for="cat">New Category:</label>
                <input type="text" name="cat" class="form-control" id="cat" value="" placeholder="Category name*" required>
                <small id="emailHelp" class="form-text text-muted">Add new cat please</small>
            </div>
            <div class="form-group">
                <input type="text" name="slug" id="slug" class="form-control" placeholder="slug">
            </div>
            <label class="my-1 mr-2" for="catParent">Parent Category</label>
            <select class="custom-select mb-3" name="catParent" id="catParent">
                <option value="0" selected>Primary Category</option>
                {foreach $rsCategories as $item}
                    <option value="{$item['id']}">{$item['name']}</option>
                {/foreach}
            </select>
            <div class="text-right">
                <button id="btnNewCat" type="button" class="btn btn-primary mb-2">Add</button>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <table id="tableCats" class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">ID</th>
            </tr>
            </thead>
            <tbody>
            {foreach $rsCategories as $item name=cat}
                <tr>
                    <th scope="row">{$smarty.foreach.cat.iteration}</th>
                    <td>{$item['name']}</td>
                    <td><small>{$item['slug']}</small></td>
                    <td>{$item['id']}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

</div>