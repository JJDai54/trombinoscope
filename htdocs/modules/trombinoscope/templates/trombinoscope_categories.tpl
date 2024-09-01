<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{include file='db:trombinoscope_header.tpl' }>

<{if $categoriesCount|default:0 > 0}>
<div class='table-responsive'>
    <table class='table table-<{$table_type|default:false}>'>
        <thead>
            <tr class='head'>
                <th colspan='<{$numb_col|default:false}>'><{$smarty.const._MA_TROMBINOSCOPE_CATEGORIES_TITLE}></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <{foreach item=category from=$categories name=category}>
                <td>
                    <div class='panel panel-<{$panel_type|default:false}>'>
                        <{include file='db:trombinoscope_categories_item.tpl' }>
                    </div>
                </td>
                <{if $smarty.foreach.category.iteration is div by $numb_col}>
                    </tr><tr>
                <{/if}>
                <{/foreach}>
            </tr>
        </tbody>
        <tfoot><tr><td>&nbsp;</td></tr></tfoot>
    </table>
</div>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <{$error|default:false}>
<{/if}>

<{include file='db:trombinoscope_footer.tpl' }>
