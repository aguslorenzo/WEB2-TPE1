{include file = "header.tpl"}
{include file = "park.form.tpl"}
    <div class="container">
        <ul class="list-group list-group-horizontal">
        <div class="row">
            {foreach from=$parks item=$park} 
                <div class="w-50 col-sm-6 text-center">
                    <li class="list-group-item list-group-item-action list-group-item-light">
                            <a href="park/{$park->id}" class="text-decoration-none">{$park->name}</a>
                            {if isset($smarty.session.IS_LOGGED)}
                                <a href="deletePark/{$park->id}" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                            {/if}
                    </li>     
                </div>
            {/foreach}
        </div>
        </ul>
    </div>
{include file = "footer.tpl"}