<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<div class='panel-heading'>
</div>
<div class='panel-body'>
    <span class='col-sm-9 justify'><{$member.cat_id}></span>
    <span class='col-sm-9 justify'><{$member.uid}></span>
    <span class='col-sm-9 justify'><{$member.firstname}></span>
    <span class='col-sm-9 justify'><{$member.lastname}></span>
    <span class='col-sm-9 justify'><{$member.fonctions}></span>
    <span class='col-sm-3'><img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' photos alt='members' ></span>
    <span class='col-sm-9 justify'><{$member.birthday}></span>
    <span class='col-sm-9 justify'><{$member.email}></span>
    <span class='col-sm-9 justify'><{$member.fixe}></span>
    <span class='col-sm-9 justify'><{$member.mobile}></span>
    <span class='col-sm-9 justify'><{$member.status}></span>
    <span class='col-sm-9 justify'><{$member.comments}></span>
    <span class='col-sm-9 justify'><{$member.actif}></span>
</div>
<div class='panel-foot'>
    <span class='col-sm-12'><a class='btn btn-primary' href='members.php?op=show&amp;mbr_id=<{$member.mbr_id}>' title='<{$smarty.const._MA_TROMBINOSCOPE_DETAILS}>'><{$smarty.const._MA_TROMBINOSCOPE_DETAILS}></a></span>
</div>
