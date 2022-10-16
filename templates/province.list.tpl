{include file = 'header.tpl'}
{include file = 'province.form.tpl'}

<ul class="list-group">
    {foreach from=$provinces item=$province}
        <li class="list-group-item">
            <a href="province/{$province->id}">{$province->name}</a>
            {if isset($smarty.session.IS_LOGGED)}
                <a href="deleteProvince/{$province->id}" type="button" class="btn btn-danger">Eliminar</a>
            {/if}    
        </li>
    {/foreach}
</ul>
{include file = 'footer.tpl'}
