{include file = 'header.tpl'}
<form action="saveEdit/{$id}" method="POST">
    <input type="text" name="name" placeholder="nombre del parque">
    <input type="text" name="description" placeholder="descripcion">
    <input type="number" name="price" placeholder="precio">
    <select name="province">
    {foreach from=$provinces item=$province}
        <option value="{$province->id}">{$province->name}</option>
    {/foreach}
        {* <option value="1">Buenos Aires</option>
        <option value="19">Catamarca</option>
        <option value="7">Chaco</option>
        <option value="4">Chubut</option>
        <option value="4">Córdoba</option>
        <option value="22">Corrientes</option>
        <option value="2">Entre Ríos</option>
        <option value="21">Formosa</option>
        <option value="5">Jujuy</option>
        <option value="14">La Pampa</option>
        <option value="10">La Rioja</option>
        <option value="18">Mendoza</option>
        <option value="6">Misiones</option>
        <option value="12">Neuquén</option>
        <option value="13">Río Negro</option>
        <option value="24">Salta</option>
        <option value="9">San Juan</option>
        <option value="11">San Luis</option>
        <option value="15">Santa Cruz</option>
        <option value="8">Santa Fe</option>
        <option value="20">Santiago del Estero</option>
        <option value="22">Tierra del Fuego</option>
        <option value="3">Tucumán</option> *}
    </select>
    <button type="submit">Guardar</button>
</form>

{include file = 'footer.tpl'}