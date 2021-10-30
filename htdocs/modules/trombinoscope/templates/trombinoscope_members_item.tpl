<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<i id='mbrId_<{$member.mbr_id}>'></i>
<div ><center><img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' alt='Photo' width="150px"></center>
</div>
<center>
    <span class='' style="padding:5px;font-size:0.8em;"><{$member.firstname}>&nbsp;<{$member.lastname}></span><br>
    <span class='col-sm-9 ' style="font-size:0.8em;"><{$member.fonctionsTA}></span>
</center>
<div class='panel-body'>
</div>
