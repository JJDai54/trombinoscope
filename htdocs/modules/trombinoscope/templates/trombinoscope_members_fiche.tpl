<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>
<style>
span.title{
    color:rgb(0,153,255);
}
</style>

<i id='mbrId_<{$member.mbr_id}>'></i>
<div class='panel-heading'>
</div>

<table>
    <tr>
        <td>
            <img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' alt='members' width="150px">
        </td>
        <td>
<div class='panel-body'>
    <span class='col-sm-9 justify'><b>
        <{$member.fullname}>
        <{if $member.pseudo}> <span class="title">(<{$member.pseudo}>)</span><{/if}>
    </b></span>
    <{* <span class='col-sm-9 justify'><{$member.cat_name}></span> *}>
    <{* <span class='col-sm-9 justify'><{$member.uid}></span> *}>
<{if $member.fonctions}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_FONCTIONS}></span> : <{$member.cat_name}>  - <{$member.fonctions}></span>
<{/if}>
<{if $member.birthday}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_BIRTHDAY}></span> : <{$member.birthday}></span>
<{/if}>
<{if $member.fixe}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_FIXE}></span> : <{$member.fixe}></span>
<{/if}>
<{if $member.mobile}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_MOBILE}></span> : <{$member.mobile}></span>
<{/if}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_EMAIL}></span> : <{$member.email}></span>
    <{* <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_STATUS}></span> : <{$member.status}></span> *}>
<{if $member.comments}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_COMMENTS}></span> : <{$member.comments}></span>
<{/if}>
    <span class='col-sm-9 justify'><span class="title"><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_ACTIF}></span> : <{$member.actif}></span>
    

    
</div>
        </td>
    </tr>
</table>

<div class='panel-foot'>
    <{* <span class='block-pie justify'><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_EMAIL}>: <{$member.email}></span> *}>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='members.php?op=list&amp;start=<{$start}>&amp;limit=<{$limit}>#mbrId_<{$member.mbr_id}>' title='<{$smarty.const._MA_TROMBINOSCOPE_MEMBERS_LIST}>'><{$smarty.const._MA_TROMBINOSCOPE_MEMBERS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='members.php?op=show&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TROMBINOSCOPE_DETAILS}>'><{$smarty.const._MA_TROMBINOSCOPE_DETAILS}></a>
        <{/if}>
        <{if $permEdit|default:''}>
            <a class='btn btn-primary right' href='members.php?op=edit&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._EDIT}>'><{$smarty.const._EDIT}></a>
            <{* on ne clone pas encore les humains :-)
            <a class='btn btn-primary right' href='members.php?op=clone&amp;mbr_id_source=<{$member.mbr_id}>' title='<{$smarty.const._CLONE}>'><{$smarty.const._CLONE}></a>
            *}>
            <a class='btn btn-danger right' href='members.php?op=delete&amp;mbr_id=<{$member.mbr_id}>' title='<{$smarty.const._DELETE}>'><{$smarty.const._DELETE}></a>
        <{/if}>
    </div>
</div>
