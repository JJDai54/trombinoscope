<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<i id='mbrId_<{$member.mbr_id}>'></i>
<div class='panel-heading'>
</div>
<div class='panel-body'>
    <span class='col-sm-9 justify'><{$member.cat_id}></span>
    <span class='col-sm-9 justify'><{$member.uid}></span>
    <span class='col-sm-9 justify'><{$member.firstname}></span>
    <span class='col-sm-9 justify'><{$member.lastname}></span>
    <span class='col-sm-9 justify'><{$member.fonctions}></span>
    <span class='col-sm-3'><img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' alt='members' ></span>
    <span class='col-sm-9 justify'><{$member.birthday}></span>
    <span class='col-sm-9 justify'><{$member.fixe}></span>
    <span class='col-sm-9 justify'><{$member.mobile}></span>
    <span class='col-sm-9 justify'><{$member.status}></span>
    <span class='col-sm-9 justify'><{$member.comments}></span>
    <span class='col-sm-9 justify'><{$member.actif}></span>
</div>
<div class='panel-foot'>
    <span class='block-pie justify'><{$smarty.const._MA_TROMBINOSCOPE_MEMBER_EMAIL}>: <{$member.email}></span>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='members.php?op=list&amp;start=<{$start}>&amp;limit=<{$limit}>#mbrId_<{$member.mbr_id}>' title='<{$smarty.const._CO_TROMBINOSCOPE_MEMBERS_LIST}>'><{$smarty.const._CO_TROMBINOSCOPE_MEMBERS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='members.php?op=show&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TROMBINOSCOPE_DETAILS}>'><{$smarty.const._MA_TROMBINOSCOPE_DETAILS}></a>
        <{/if}>
        <{if $permEdit|default:''}>
            <a class='btn btn-primary right' href='members.php?op=edit&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._EDIT}>'><{$smarty.const._EDIT}></a>
            <a class='btn btn-primary right' href='members.php?op=clone&amp;mbr_id_source=<{$member.mbr_id}>' title='<{$smarty.const._CLONE}>'><{$smarty.const._CLONE}></a>
            <a class='btn btn-danger right' href='members.php?op=delete&amp;mbr_id=<{$member.mbr_id}>' title='<{$smarty.const._DELETE}>'><{$smarty.const._DELETE}></a>
        <{/if}>
    </div>
</div>
