{if isset($smarty.session.IS_LOGGED)}
    <form action="addProvince" method="POST">
        <input type="text" name="name" placeholder="nombre de la provincia">
        <input type="text" name="capital" placeholder="capital ">
        <input type="text" name="weather" placeholder="clima">
        <button type="submit">Agregar</button>
    </form>
{/if}