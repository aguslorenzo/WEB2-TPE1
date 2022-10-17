{if isset($smarty.session.IS_LOGGED)}
{*      <form action="addProvince" method="POST"> 
        <input type="text" name="name" placeholder="nombre de la provincia">
        <input type="text" name="capital" placeholder="capital ">
        <input type="text" name="weather" placeholder="clima">
        
    </form> *}
    <div class="mt-5 d-flex justify-content-evenly">
        <div class="container bg-light border rounded-2">
            <form action="addProvince" method="POST" class="my-4">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="province-name">Provincia</label>
                            <input type="text" name="name">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="province-capital">Capital</label>
                            <input type="text" name="capital">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="province-weather">Clima</label>
                            <input type="text" name="weather">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-info text-dark">Agregar</button>    
            </form>
        </div>
    </div>
{/if}