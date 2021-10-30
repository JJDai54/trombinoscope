<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<div class='panel-body'>
</div>

<div class='panel-body'>
<span class='col-sm-2'><{$member.cat_id}></span>

<span class='col-sm-2'><{$member.uid}></span>

<span class='col-sm-2'><{$member.firstname}></span>

<span class='col-sm-2'><{$member.lastname}></span>

<span class='col-sm-2'><{$member.fonctions}></span>

<span class='col-sm-3'><img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' alt='members' ></span>

<span class='col-sm-2'><{$member.birthday}></span>

<span class='col-sm-2'><{$member.fixe}></span>

<span class='col-sm-2'><{$member.mobile}></span>

<span class='col-sm-2'><{$member.status}></span>

<span class='col-sm-3 justify'><{$member.comments}></span>

<span class='col-sm-2'><{$member.actif}></span>

</div>


