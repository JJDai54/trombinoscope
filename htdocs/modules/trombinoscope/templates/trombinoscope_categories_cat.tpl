<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{include file='db:trombinoscope_header.tpl' }>

<div class='panel panel-<{$panel_type|default:false}>'>
<div class='panel-heading'>
<{$smarty.const._MA_TROMBINOSCOPE_CATEGORIES_TITLE}></div>

<{foreach item=category from=$categories}>
<div class='panel panel-body'>
<{include file='db:trombinoscope_categories_list.tpl' category=$category}>
<{if $category.count is div by $numb_col}>
<br>
<{/if}>

</div>

<{/foreach}>

</div>

<{include file='db:trombinoscope_footer.tpl' }>
