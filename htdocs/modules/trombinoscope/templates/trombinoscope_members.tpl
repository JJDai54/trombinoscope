<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{include file='db:trombinoscope_header.tpl' }>


<div class='table-responsive' style="background:#E1E1E1;">
    <table class='table table-<{$table_type|default:false}>'>
        <thead>
            <tr class='head'>
                <th colspan='<{$numb_col|default:false}>'>
                  <{if !$is_fiche}>
                  <form name='trombinoscope_filter' id='trombinoscope_filter' action='members.php' method='post' onsubmit='return xoopsFormValidate_form();' enctype=''>
                    <input type="hidden" name="op" value="list" />

                  <table style="border:0px;">
                      <tr>  
                        <{foreach item=filter from=$filters}>
                          <td style='text-align:right;width:80px;border:0px;'><{$filter.caption}> :  </td><td style="border:0px;"><{$filter.input}></td>
                        <{/foreach}> 

                        <{if $permEdit|default:''}>
                          <td style='text-align:right;width:200px;border:0px;'>
                          <a class='btn btn-danger right' href='members.php?op=new&mbr_id=<{$member.mbr_id}>&start=<{$start}>&limit=<{$limit}>' title=''><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_ADD}></a>       
                      </tr>
                      <{/if}>            
                  </table>
                          
                  </form>
                  <{else}>
                        <{* bin rien pour l'instant *}>
                  <{/if}>
                </th>
            </tr>
        </thead>
<{if $membersCount|default:0 > 0}>
        <tbody>
            <tr>
                <{foreach item=member from=$members_list name=memberName}>
                <td width='100px'>

                        <{if $membersCount == 1}>
                            <{include file='db:trombinoscope_members_fiche.tpl' }>
                        <{else}>
                            <{include file='db:trombinoscope_members_item.tpl' }>
                        <{/if}>

                </td>
                <{if $smarty.foreach.memberName.iteration is div by $numb_col}>
                    </tr><tr>
                <{/if}>
                <{/foreach}>
            </tr>
        </tbody>
<{/if}>
        <tfoot><tr><td>&nbsp;</td></tr></tfoot>
    </table>
</div>





<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <{$error|default:false}>
<{/if}>

<{include file='db:trombinoscope_footer.tpl' }>
