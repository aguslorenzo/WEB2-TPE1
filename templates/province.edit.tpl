{include file = "header.tpl"}
    <form action="saveProvince/{$id}" method="POST">
        <input type="text" name="name" placeholder="nombre de la provincia">
        <input type="text" name="capital" placeholder="capital ">
        <input type="text" name="weather" placeholder="clima">
        <button type="submit">Guardar</button>
    </form>
{include file = "footer.tpl"}