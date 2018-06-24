<div class="row">
    <div class="col-lg-6">
        <div id="catBox">
            <div class="form-group">
                <label for="cat">New Category:</label>
                <input type="text" name="cat" class="form-control" id="cat" value="">
                <small id="emailHelp" class="form-text text-muted">Add new cat please</small>
            </div>
            <label class="my-1 mr-2" for="catParent">Parent Category</label>
            <select class="custom-select" name="catParent" id="catParent">
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

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">ID</th>
            </tr>
            </thead>
            <tbody>
            {foreach $rsCategories as $item name=cat}
                <tr>
                    <th scope="row">{$smarty.foreach.cat.iteration}</th>
                    <td>{$item['name']}</td>
                    <td>{$item['id']}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
</div>