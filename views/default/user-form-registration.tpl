<!-- User reg -->
<div id="registerBox" class="border p-3 my-3" style="display: none;">
    <h6>Регистрация</h6>
    <label class="sr-only" for="useremailReg">E-mail</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 612 612"><path d="M573.75 57.375H38.25C17.136 57.375 0 74.511 0 95.625v420.75c0 21.133 17.136 38.25 38.25 38.25h535.5c21.133 0 38.25-17.117 38.25-38.25V95.625c0-21.114-17.117-38.25-38.25-38.25zM554.625 497.25H57.375V204.657l224.03 187.999c7.134 5.967 15.874 8.97 24.595 8.97 8.74 0 17.461-3.003 24.595-8.97l224.03-187.999V497.25zm0-367.487L306 338.379 57.375 129.763V114.75h497.25v15.013z"/></svg></div>
        </div>
        <input type="email" name="email" class="form-control" id="useremailReg" placeholder="E-mail*" required>
    </div>
    <label class="sr-only" for="pwd1">Password</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
        </div>
        <input type="password" name="pwd1" class="form-control" id="pwd1" placeholder="Password*" required>
    </div>
    <label class="sr-only" for="pwd2">Repeat password</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 516 516"><path d="M353.812 0C263.925 0 191.25 72.675 191.25 162.562c0 19.125 3.825 38.25 9.562 57.375L0 420.75v95.625h95.625V459H153v-57.375h57.375l86.062-86.062c17.213 5.737 36.338 9.562 57.375 9.562 89.888 0 162.562-72.675 162.562-162.562S443.7 0 353.812 0zm47.813 172.125c-32.513 0-57.375-24.862-57.375-57.375s24.862-57.375 57.375-57.375S459 82.237 459 114.75s-24.862 57.375-57.375 57.375z"/></svg></div>
        </div>
        <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Repeat password*" required>
    </div>

    {if {$helpers['hideLoginBox']}}
        {include file="user-form-shipping.tpl"}
    {/if}

    <div class="text-right">
        <button id="btnRegisterNewUser" type="submit" class="btn btn-primary mb-2">Register</button>
    </div>
</div>