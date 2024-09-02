<!-- Header -->
<{include file='db:trombinoscope_admin_header.tpl' }>

<{if $qualities_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_ID}></th>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_NAME}></th>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_WEIGHT}></th>

                <th class="center width5"><{$smarty.const._CO_TROMBINOSCOPE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $qualities_count|default:''}>
        <tbody>
            <{assign var="fldImg" value="blue"}>
            <{foreach item=quality from=$qualities_list name=qualityItem}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$quality.id}></td>
                <td class='left'>
                    <a href="qualities.php?op=edit&amp;quality_id=<{$quality.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>">
                        <{$quality.name}>
                    </a>
                </td>
                
                
                <{* ---------------- Arrows Weight -------------------- *}>
                <td class='center'>
                    <{if $smarty.foreach.qualityItem.first}>
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/first-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_FIRST}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/up-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_UP}>">
                    <{else}>
                      <a href="qualities.php?op=weight&quality_id=<{$quality.id}>&sens=first&quality_id=<{$quality.id}>&quality_weight=<{$quality.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/first-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_FIRST}>">
                      </a>
                    
                      <a href="qualities.php?op=weight&quality_id=<{$quality.id}>&sens=up&quality_id=<{$quality.id}>&quality_weight=<{$quality.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/up-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_UP}>">
                      </a>
                    <{/if}>
                 
                    <{* ----------------------------------- *}>
                    <img src="<{$modPathIcon16}>/blank-08.png" title="">
                    <{$quality.weight}>
                    <img src="<{$modPathIcon16}>/blank-08.png" title="">
                    <{* ----------------------------------- *}>
                 
                    <{if $smarty.foreach.qualityItem.last}>
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/down-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_DOWN}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/last-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_LAST}>">
                    <{else}>
                    
                    <a href="qualities.php?op=weight&quality_id=<{$quality.id}>&sens=down&quality_id=<{$quality.id}>&quality_weight=<{$quality.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/down-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_DOWN}>">
                      </a>
                 
                    <a href="qualities.php?op=weight&quality_id=<{$quality.id}>&sens=last&quality_id=<{$quality.id}>&quality_weight=<{$quality.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/last-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_LAST}>">
                      </a>
                    <{/if}>
                </td>
                <{* ---------------- /Arrows -------------------- *}>
                
                
                <td class="center  width5">
                    <a href="qualities.php?op=edit&amp;quality_id=<{$quality.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16}>edit.png" alt="" title="<{$smarty.const._EDIT}> qualities" ></a>
<{*                     <a href="qualities.php?op=clone&amp;quality_id_source=<{$quality.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16}>editcopy.png" alt="" title="<{$smarty.const._CLONE}> qualities" ></a> *}>
                    <{if $quality.id < 4}>
                      <img src="<{xoModuleIcons16}>empty.png" alt="" title="" >
                    <{else}>
                      <a href="qualities.php?op=delete&amp;quality_id=<{$quality.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16}>delete.png" alt="" title="<{$smarty.const._DELETE}> qualities" ></a>
                    <{/if}>

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

<!-- Footer -->
<{include file='db:trombinoscope_admin_footer.tpl' }>
