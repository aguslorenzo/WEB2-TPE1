{include file = 'header.tpl'}
    <h1>{$province->name}</h1>
    <h2>Capital:{$province->capital}</h2>
    <p>{$province->weather}</p>
    <a href="{BASE_URL}editProvince/{$province->id}" type="button" class="btn btn-light">Editar</a>  {* preguntar *}
    <h1>Parques en la provincia de: {$province->name}</h1>
    {if empty($parks)}
        <p>No existen Parque Nacionales en esta provincia</p>;
    {/if}  
    {foreach from=$parks item=$park}
        {$park->name}
        {$park->description}
        {$park->price}
    {/foreach}
{include file = 'footer.tpl'}