{if isset($smarty.session.IS_LOGGED)}
    <div class= "container">
        <form action="addPark" method="POST">
            <div class="row mb-3">
                <label for="park-name" class="col-sm-2 col-form-label">Nombre del parque</label>
                <div class="col-sm-10">
                    <input type="text" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="park-decription" class="col-sm-2 col-form-label">Descripión</label>
                <div class="col-sm-10">
                    <input type="text" name="description">
                </div>
            </div>
                {* <div class="form-group">
                    <input type="text" name="description" placeholder="descripcion">
                </div> *}
            <div class="row mb-3">
                <label for="park-price" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="text" name="price">
                </div>
            </div>    
                {* <div class="form-group">
                    <input type="number" name="price" placeholder="precio">
                </div> *}
            <div class="row mb-3">
                <label for="park-province" class="col-sm-2 col-form-label">Provincia</label>
                <div class="col-sm-10">
                    <select name="province">
                        {foreach from=$provinces item=$province}
                            <option value="{$province->id}">{$province->name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>  
                {* <div class="form-group">
                    <select name="province">
                        {foreach from=$provinces item=$province}
                            <option value="{$province->id}">{$province->name}</option>
                        {/foreach}
                    </select>
                </div> *}
                <button type="submit">Agregar</button>
        </form>
    </div>
{/if}