
<div id="shippingBox" class="my-3">
    <h2 class="h4 text-center">{$helpers['titleCustomer']}</h2>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 512 512"><text transform="translate(168.783 543.81)"><tspan x="0" y="0" fill="#000" font-family="'Verdana-Bold'" font-size="20">simpleicon.com</tspan><tspan x="-159.59" y="24" fill="#FF0" font-family="'Verdana'" font-size="20">Collection Of Flat Icon, Symbols And Glyph Icons</tspan></text><path fill="#020201" d="M454.426 392.582c-5.439-16.32-15.298-32.782-29.839-42.362-27.979-18.572-60.578-28.479-92.099-39.085-7.604-2.664-15.33-5.568-22.279-9.7-6.204-3.686-8.533-11.246-9.974-17.886-.636-3.512-1.026-7.116-1.228-10.661 22.857-31.267 38.019-82.295 38.019-124.136 0-65.298-36.896-83.495-82.402-83.495-45.515 0-82.403 18.17-82.403 83.468 0 43.338 16.255 96.5 40.489 127.383-.221 2.438-.511 4.876-.95 7.303-1.444 6.639-3.77 14.058-9.97 17.743-6.957 4.133-14.682 6.756-22.287 9.42-31.521 10.605-64.119 19.957-92.091 38.529-14.549 9.58-24.403 27.159-29.838 43.479-5.597 16.938-7.886 37.917-7.541 54.917h411.932c.348-16.999-1.946-37.978-7.539-54.917z"/></svg></div>
        </div>
        <input type="text" name="name" class="form-control" value="{$arUser['name']}" placeholder="Name{if !$arUser['name'] && $helpers['isShippingRequired']}*{/if}" {if !$arUser['name'] && $helpers['isShippingRequired']}required{/if}>
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 578 578"><path d="M577.83 456.128c1.225 9.385-1.635 17.545-8.568 24.48l-81.396 80.781c-3.672 4.08-8.465 7.551-14.381 10.404-5.916 2.857-11.729 4.693-17.439 5.508-.408 0-1.635.105-3.676.309-2.037.203-4.689.307-7.953.307-7.754 0-20.301-1.326-37.641-3.979s-38.555-9.182-63.645-19.584c-25.096-10.404-53.553-26.012-85.376-46.818-31.823-20.805-65.688-49.367-101.592-85.68-28.56-28.152-52.224-55.08-70.992-80.783-18.768-25.705-33.864-49.471-45.288-71.299-11.425-21.828-19.993-41.616-25.705-59.364S4.59 177.362 2.55 164.51-.306 141.56.102 134.216c.408-7.344.612-11.424.612-12.24.816-5.712 2.652-11.526 5.508-17.442s6.324-10.71 10.404-14.382L98.022 8.756c5.712-5.712 12.24-8.568 19.584-8.568 5.304 0 9.996 1.53 14.076 4.59s7.548 6.834 10.404 11.322l65.484 124.236c3.672 6.528 4.692 13.668 3.06 21.42-1.632 7.752-5.1 14.28-10.404 19.584l-29.988 29.988c-.816.816-1.53 2.142-2.142 3.978s-.918 3.366-.918 4.59c1.632 8.568 5.304 18.36 11.016 29.376 4.896 9.792 12.444 21.726 22.644 35.802s24.684 30.293 43.452 48.653c18.36 18.77 34.68 33.354 48.96 43.76 14.277 10.4 26.215 18.053 35.803 22.949 9.588 4.896 16.932 7.854 22.031 8.871l7.648 1.531c.816 0 2.145-.307 3.979-.918 1.836-.613 3.162-1.326 3.979-2.143l34.883-35.496c7.348-6.527 15.912-9.791 25.705-9.791 6.938 0 12.443 1.223 16.523 3.672h.611l118.115 69.768c8.571 5.308 13.67 12.038 15.303 20.198z" fill="#010002"/></svg></div>
        </div>
        <input type="tel" name="phone" class="form-control" value="{$arUser['phone']}" placeholder="Phone{if !$arUser['phone'] && $helpers['isShippingRequired']}*{/if}" {if !$arUser['phone'] && $helpers['isShippingRequired']}required{/if}>
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 54 54"><path d="M40.94 5.617A19.052 19.052 0 0 0 27.38 0a19.05 19.05 0 0 0-13.56 5.617c-6.703 6.702-7.536 19.312-1.804 26.952L27.38 54.757 42.721 32.6c5.755-7.671 4.922-20.281-1.781-26.983zM27.557 26c-3.859 0-7-3.141-7-7s3.141-7 7-7 7 3.141 7 7-3.141 7-7 7z"/></svg></div>
        </div>
        <textarea name="address" class="form-control" placeholder="Address{if !$arUser['address'] && $helpers['isShippingRequired']}*{/if}" {if !$arUser['address'] && $helpers['isShippingRequired']}required{/if}>{$arUser['address']}</textarea>
    </div>
</div>
