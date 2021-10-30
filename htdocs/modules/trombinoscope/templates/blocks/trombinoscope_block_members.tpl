<table class='table table-<{$table_type|default:false}>'>
    <thead>
        <tr class='head'>
            <th>&nbsp;</th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_MBR_CAT_ID}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_MBR_UID}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_MBR_FIRSTNAME}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_MBR_LASTNAME}></th>
            <th class='center'><{$smarty.const._MB_TROMBINOSCOPE_MBR_FONCTION}></th>
        </tr>
    </thead>
    <{if count($block)}>
    <tbody>
        <{foreach item=member from=$block}>
        <tr class='<{cycle values="odd, even"}>'>
            <td class='center'><{$member.id}></td>
            <td class='center'><{$member.cat_id}></td>
            <td class='center'><{$member.uid}></td>
            <td class='center'><{$member.firstname}></td>
            <td class='center'><{$member.lastname}></td>
            <td class='center'><{$member.fonctions}></td>
            <td class='center'><a href='members.php?op=show&amp;mbr_id=<{$member.id}>' title='<{$smarty.const._MB_TROMBINOSCOPE_MEMBER_GOTO}>'><{$smarty.const._MB_TROMBINOSCOPE_MEMBER_GOTO}></a></td>
        </tr>
        <{/foreach}>
    </tbody>
    <{/if}>
    <tfoot><tr><td>&nbsp;</td></tr></tfoot>
</table>
