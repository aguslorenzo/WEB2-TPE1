{include file = "header.tpl"}
    {if isset($error)}
        <h1>{$error}</h1>
        {else}
            <div class="card w-50 mx-auto text-center">
                <div class="card-body">
                    <h2 class="card-title">{$park->name}</h2>
                    <h3 class="card-subtitle mb-2 text-muted">{$provinceName}</h3>
                    <p class="card-text">{$park->description}</p>
                    <h3 class="card-title">${$park->price}(ARS)</h3>
                </div>
                {if isset($smarty.session.IS_LOGGED)}
                    <a href="editPark/{$park->id}" type="button" class="btn btn-light">Editar</a>
                {/if}
            </div>
    {/if}
{include file = "footer.tpl"}