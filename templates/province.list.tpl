{include file = 'header.tpl'}
{include file = 'province.form.tpl'}
    <div class="container">
        <ul class="list-group">
        <div class="row">
            {foreach from=$provinces item=$province}
                <div class="w-50 col-sm-6 text-center">
                    <li class="list-group-item">
                        <a href="province/{$province->id}" class="text-decoration-none">{$province->name}</a>
                        {if isset($smarty.session.IS_LOGGED)}
                            <a href="deleteProvince/{$province->id}" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                        {/if}    
                    </li>
                </div>
            {/foreach}
        </div>
        </ul>
    </div>
{include file = 'footer.tpl'}
