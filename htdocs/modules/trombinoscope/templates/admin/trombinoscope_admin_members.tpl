<!-- Header -->
<{include file='db:trombinoscope_admin_header.tpl' }>


<form name='trombinoscope_filter' id='trombinoscope_filter' action='members.php' method='post' onsubmit='return xoopsFormValidate_form();' enctype=''>
<input type="hidden" name="op" value="list" />
  <{foreach item=filter from=$filters}>
      <{$filter.caption}> : <{$filter.input}>&nbsp;
  <{/foreach}>            
</form>

<{* -------------------------------------------------------------- *}>
<{if $members_list|default:''}>
    <table id='trombinoscope_members' name='trombinoscope_members' class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_ID}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_CAT_ID}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_UID}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_CIVILITE}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_FIRSTNAME}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_LASTNAME}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_QUALITY}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_PHOTO}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_FONCTION}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_BIRTHDAY}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_EMAIL}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_TEL}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_STATUS}></th>
                <{* <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_COMMENTS}></th> *}>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_ACTIF}></th>
                <th class="center"><{$smarty.const._CO_TROMBINOSCOPE_MEMBER_CREATION}></th>
                <th class="center width5"><{$smarty.const._CO_TROMBINOSCOPE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $members_count|default:''}>
        <tbody>
            <{foreach item=member from=$members_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$member.id}></td>
                <td class='center'><{$member.cat_id}></td>
                <td class='center'><{$member.pseudo}></td>
                <td class='left'><{$member.civilite}></td>
                <td class='left'>
                    <a href="members.php?op=edit&amp;mbr_id=<{$member.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>">
                        <{$member.firstname}>
                    </a>
                </td>
                <td class='left'>
                    <a href="members.php?op=edit&amp;mbr_id=<{$member.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>">
                        <{$member.lastname}>
                    </a>
                                    
                
                </td>
                <td class='left'>
                    <{$member.quality}>
                </td>
                <td class='center'>
                  <div style='visibility:hidden;'><{$member.lastname}></div>
                  <{if $member.photo == ''}>
                    <img src="<{$smarty.const.TROMBINOSCOPE_IMAGE_URL}>/<{$smarty.const.TROMBINOSCOPE_NO_PICTURE}>" alt="members" style="max-width:100px" >
                  <{else}>
                    <img src="<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>" alt="members" style="max-width:100px" >
                  <{/if}>
                </td>
                <td class='left'><{$member.fonctionsTA}></td>
                <td class='center'><{$member.birthday}></td>
                <td class='left'><{$member.email}></td>
                <td class='center'><{$member.fixe}><br><{$member.mobile}></td>
                <td class='left'><{$member.status}></td>
                <{* <td class='left'><{$member.comments_short}></td> *}>
                <td class='center'>
                    <div style='visibility:hidden;'><{$member.mbr_actif}></div>
                    <a href="members.php?op=change_etat&cat_id=<{$member.cat_id}>&mbr_id=<{$member.id}>&field=mbr_actif" >
                        <img src="<{xoModuleIcons16}><{$member.mbr_actif}>.png" alt="member" title='<{$smarty.const._AM_TROMBINOSCOPER_IS_ACTIF}>' />
                        </a>
                
                </td>
                <td class='center'><{$member.creation}><br><{$member.update}></td>
                <td class="center  width5">
                    <a href="members.php?op=edit&amp;mbr_id=<{$member.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16}>/edit.png" alt="<{$smarty.const._EDIT}> members" ></a>
                    <a href="members.php?op=clone&amp;mbr_id_source=<{$member.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16}>/editcopy.png" alt="<{$smarty.const._CLONE}> members" ></a>
                    <a href="members.php?op=delete&amp;mbr_id=<{$member.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16}>/delete.png" alt="<{$smarty.const._DELETE}> members" ></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<script>
tth_set_value('last_asc', true);
tth_trierTableau('trombinoscope_members', 2);  
</script>

<!-- Footer -->
<{include file='db:trombinoscope_admin_footer.tpl' }><br>


