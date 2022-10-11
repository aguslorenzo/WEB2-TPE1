{include file = "header.tpl"}

<div class="card" style="width: 50rem; margin: auto; padding: 10px;">
            <div class="card-body">
                <h1 class="card-title">{$park->name}</h1>
                <h3 class="card-subtitle mb-2 text-muted">{$provinceName}</h3>
                <p class="card-text">{$park->description}</p>
                <h3 class="card-title">${$park->price}(ARS)</h3>
            </div>
            {if isset($smarty.session.IS_LOGGED)}
                <a href="{BASE_URL}editPark/{$park->id}" type="button" class="btn btn-light">Editar</a>{* preguntar *}
            {/if}
</div>
{include file = "footer.tpl"}