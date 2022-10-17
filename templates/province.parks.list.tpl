{include file = 'header.tpl'}
    <div class="card w-50 mx-auto text-center">
        <h2 class="card-header bg-light mb-3">{$province->name}</h2>
        <div class="card-body">
            <h2 class="card-title">Capital: {$province->capital}</h2>
            <p class="card-text">{$province->weather}</p>
            <a href="editProvince/{$province->id}" type="button" class="btn btn-primary text-right">Editar</a>
        </div>
    </div>
    <div style="padding: 10px;">
        <h2>Parques en la provincia de {$province->name}</h2>
        {if empty($parks)}
            <p>No existen Parque Nacionales en esta provincia</p>
        {/if}
    </div>
    <div class="row">
        {foreach from=$parks item=$park}
                <div class="card w-50 text-center col-sm-6" {* style=" width: 50rem; text-align: center; margin: auto; padding: 10px;" *}>
                    <div class="card-body">
                        <h2 class="card-title">{$park->name}</h2>
                        <p class="card-text">{$park->description}</p>
                        <h3 class="card-title">${$park->price}(ARS)</h3>
                    </div>
                </div>
        {/foreach}
    </div>
{include file = 'footer.tpl'}