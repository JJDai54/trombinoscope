<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{include file='db:trombinoscope_header.tpl' }>

<{if $membersCount|default:0 > 0}>
<div class='table-responsive' style="background:#E1E1E1;">
    <table class='table table-<{$table_type|default:false}>'>
        <thead>
            <tr class='head'>
                <th colspan='<{$divideby|default:false}>'><{$smarty.const._MA_TROMBINOSCOPE_MEMBERS_TITLE}></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <{foreach item=member from=$members name=member}>
                <td width='100px'>
                    <div class='panel panel-<{$panel_type|default:false}>'>
                        <{if $membersCount == 1}>
                            <{include file='db:trombinoscope_members_fiche.tpl' }>
                        <{else}>
                            <{include file='db:trombinoscope_members_item.tpl' }>
                        <{/if}>
                    </div>
                </td>
                <{if $smarty.foreach.member.iteration is div by $divideby}>
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
