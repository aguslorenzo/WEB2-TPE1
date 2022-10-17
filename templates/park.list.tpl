{include file = "header.tpl"}
{include file = "park.form.tpl"}
    <div class="row">
        <ul class="list-group w-50 col-sm-6">
            {foreach from=$parks item=$park}
                    <li class="list-group-item col-6 list-group-item-action list-group-item-light">
                        <a href="park/{$park->id}" class="text-decoration-none">{$park->name}</a>
                        {if isset($smarty.session.IS_LOGGED)}
                            <a href="deletePark/{$park->id}" type="button" class="btn btn-danger">Eliminar</a>
                        {/if}
                    </li>
            {/foreach}
        </ul>
    </div>
{include file = "footer.tpl"}