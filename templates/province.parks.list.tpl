{include file = 'header.tpl'}
    <h1>{$province->name}</h1>
    <h2>Capital:{$province->capital}</h2>
    <p>{$province->weather}</p>
    <a href="{BASE_URL}editProvince/{$province->id}" type="button" class="btn btn-light">Editar</a>  {* preguntar *}
    <h1>Parques en la provincia de: {$province->name}</h1>
    {if empty($parks)}
        <p>No existen Parque Nacionales en esta provincia</p>
    {/if}  
    {foreach from=$parks item=$park}
        <div class="card" style=" width: 50rem; text-align: center; margin: auto; padding: 10px;">
            <div class="card-body">
                <h2 class="card-title">{$park->name}</h2>
                <p class="card-text">{$park->description}</p>
                <h3 class="card-title">${$park->price}(ARS)</h3>
            </div>
        </div>
    {/foreach}
{include file = 'footer.tpl'}