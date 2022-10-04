{include file = 'header.tpl'}

<h1> Parques en la provincia de: {$province->name}</h1>
{foreach from=$parks item=$park}
    {$park->name}
    {$park->description}
    {$park->price}
{/foreach}
{include file = 'footer.tpl'}