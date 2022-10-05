{include file = "header.tpl"}

<div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{$park->name}</h1>
                <h3 class="card-subtitle mb-2 text-muted">{$provinceName}</h3>
                <p class="card-text">{$park->description}</p>
                <h1 class="card-title">{$park->price}</h1>
            </div>
            <a href="{BASE_URL}editPark/{$park->id}" type="button" class="btn btn-light">Editar</a>{* preguntar *}
</div>
{include file = "footer.tpl"}