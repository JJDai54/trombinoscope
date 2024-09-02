<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<i id='mbrId_<{$member.mbr_id}>'></i>
<div photos><center>
    <{if $permEdit|default:''}>
        <a href='members.php?op=show&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TROMBINOSCOPE_DETAILS}>'>
            <img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' photos alt='Photo' width="150px">
        </a>
            
    <{else}>
        <img src='<{$trombinoscope_upload_url|default:false}>/images/members/<{$member.photo}>' photos alt='Photo' width="150px">
    <{/if}>


<center>
    <span class='' style="padding:5px;font-size:0.8em;"><{$member.firstname}>&nbsp;<{$member.lastname}></span><br>
    <span class='' style="font-size:0.8em;"><{$member.fonctionsTA}></span>




<{if $permEdit|default:''}>

    <div >
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='members.php?op=list&amp;start=<{$start}>&amp;limit=<{$limit}>#mbrId_<{$member.mbr_id}>' title=''><{$smarty.const._CO_TROMBINOSCOPE_MEMBERS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='members.php?op=show&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title=''><{$smarty.const._MA_TROMBINOSCOPE_DETAILS}></a>
        <{/if}>
<{*
            <a class='btn btn-primary right' href='members.php?op=edit&amp;mbr_id=<{$member.mbr_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title=''><{$smarty.const._EDIT}></a>
            <a class='btn btn-primary right' href='members.php?op=clone&amp;mbr_id_source=<{$member.mbr_id}>' title=''><{$smarty.const._CLONE}></a>
            <a class='btn btn-danger right' href='members.php?op=changeEtat&field=mbr_actif&mbr_id=<{$member.mbr_id}>' title=''><{$smarty.const._ACTIF}></a>
            <a class='btn btn-danger right' href='members.php?op=delete&amp;mbr_id=<{$member.mbr_id}>' title=''><{$smarty.const._DELETE}></a>
*}>        
    </div></center>
</div>
<{/if}>

