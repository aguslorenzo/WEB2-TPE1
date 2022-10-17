{include file = "header.tpl"}
    <div class="mt-5 d-flex justify-content-evenly">
        <div class="container bg-light border rounded-2">
            <form action="savePark/{$id}" method="POST" class="my-4">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="park-name">Nombre del parque</label>
                            <input type="text" name="name">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="park-price">Precio</label>
                            <input type="number" name="price">
                        </div>
                    </div>
                    
                    <div class="col-2">
                        <div class="form-group">
                            <label for="park-province">Provincia</label>
                            <select name="province">
                                {foreach from=$provinces item=$province}
                                    <option value="{$province->id}">{$province->name}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>  
                </div>
        
                <div class="form-group">
                    <label for="park-decription">Descripión</label>
                    <input type="text" class="form-control" rows="3" name="description">
                </div>
                    <button type="submit" class="btn btn-outline-info text-dark" >Guardar</button>
            </form>
        </div>
    </div>
{include file = "footer.tpl"}