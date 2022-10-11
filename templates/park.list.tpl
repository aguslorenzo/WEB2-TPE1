{include file = "header.tpl"}
{include file = "park.form.tpl"}

<ul class="list-group">
    {foreach from=$parks item=$park}
            <li class="list-group-item">
                <a href="park/{$park->id}">{$park->name}</a>
                {if isset($smarty.session.IS_LOGGED)}
                    <a href="deletePark/{$park->id}" type="button" class="btn btn-danger">Eliminar</a>
                {/if}
            </li>
            
    {/foreach}
</ul>

{include file = "footer.tpl"}