<form action="saveEdit/{$id}" method="POST">
    <input type="text" name="name" placeholder="nombre del parque">
    <input type="text" name="description" placeholder="descripcion">
    <input type="number" name="price" placeholder="precio">
    <select name="province">
        {foreach from=$provinces item=$province}
            <option value="{$province->id}">{$province->name}</option>
        {/foreach}
    </select>
    <button type="submit">Guardar</button>
</form>