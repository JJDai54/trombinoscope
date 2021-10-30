<table class='table table-<{$table_type|default:false}>'>
    <thead>
        <tr class='head'>
            <th>&nbsp;</th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_CAT_PARENT_ID}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_CAT_NAME}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_CAT_WEIGHT}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_CAT_THEME}></th>
        </tr>
    </thead>
    <{if count($block)}>
    <tbody>
        <{foreach item=category from=$block}>
        <tr class='<{cycle values="odd, even"}>'>
            <td class='center'><{$category.id}></td>
            <td class='center'><{$category.parent_id}></td>
            <td class='center'><{$category.name}></td>
            <td class='center'><{$category.weight}></td>
            <td class='center'><{$category.theme}></td>
            <td class='center'><a href='categories.php?op=show&amp;cat_id=<{$category.id}>' title='<{$smarty.const._MB_TROMBINOSCOPE_CATEGORY_GOTO}>'><{$smarty.const._MB_TROMBINOSCOPE_CATEGORY_GOTO}></a></td>
        </tr>
        <{/foreach}>
    </tbody>
    <{/if}>
    <tfoot><tr><td>&nbsp;</td></tr></tfoot>
</table>
