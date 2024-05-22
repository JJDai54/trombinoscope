<!-- Header -->
<{include file='db:trombinoscope_admin_header.tpl' }>

<{if $categories_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_ID}></th>
                <{* pas utilisé pour l'instant
                    <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_PARENT_ID}></th>
                *}>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_NAME}></th>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_WEIGHT}></th>
                <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_DEFAULT}></th>
                <{* pas utilisé pour l'instant
                    <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_THEME}></th>
                *}>
                <th class="center width5"><{$smarty.const._CO_TROMBINOSCOPE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $categories_count|default:''}>
        <tbody>
            <{assign var="fldImg" value="blue"}>
            <{foreach item=cat from=$categories_list name=catItem}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$cat.id}></td>
                <{* pas utilisé pour l'instant
                    <td class='center'><{$cat.parent_id}></td>
                *}>
                <td class='left'>
                    <a href="categories.php?op=edit&amp;cat_id=<{$cat.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>">
                        <{$cat.name}>
                    </a>
                </td>
                
                
                <{* ---------------- Arrows Weight -------------------- *}>
                <td class='center'>
                    <{if $smarty.foreach.catItem.first}>
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/first-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_FIRST}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/up-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_UP}>">
                    <{else}>
                      <a href="categories.php?op=weight&cat_id=<{$cat.id}>&sens=first&cat_id=<{$cat.id}>&cat_weight=<{$cat.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/first-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_FIRST}>">
                      </a>
                    
                      <a href="categories.php?op=weight&cat_id=<{$cat.id}>&sens=up&cat_id=<{$cat.id}>&cat_weight=<{$cat.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/up-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_UP}>">
                      </a>
                    <{/if}>
                 
                    <{* ----------------------------------- *}>
                    <img src="<{$modPathIcon16}>/blank-08.png" title="">
                    <{$cat.weight}>
                    <img src="<{$modPathIcon16}>/blank-08.png" title="">
                    <{* ----------------------------------- *}>
                 
                    <{if $smarty.foreach.catItem.last}>
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/down-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_DOWN}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/last-0.png" title="<{$smarty.const._AM_TROMBINOSCOPE_LAST}>">
                    <{else}>
                    
                    <a href="categories.php?op=weight&cat_id=<{$cat.id}>&sens=down&cat_id=<{$cat.id}>&cat_weight=<{$cat.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/down-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_DOWN}>">
                      </a>
                 
                    <a href="categories.php?op=weight&cat_id=<{$cat.id}>&sens=last&cat_id=<{$cat.id}>&cat_weight=<{$cat.weight}>">
                      <img src="<{$modPathIcon16}>/arrows/<{$fldImg}>/last-1.png" title="<{$smarty.const._AM_TROMBINOSCOPE_LAST}>">
                      </a>
                    <{/if}>
                </td>
                <{* ---------------- /Arrows -------------------- *}>
                
                
                <td class='center'>

                    <a href="categories.php?op=set_default&cat_id=<{$cat.id}>&field=cat_default&value=1" >
                        <img src="<{xoModuleIcons16}><{$cat.default}>.png" alt="category" title='<{$smarty.const._AM_TROMBINOSCOPER_DEFAULT}>' />
                        </a>
                
                </td>
                
                <{* pas utilisé pour l'instant
                  <td class='center'><{$cat.theme}></td>
                *}>
                <td class="center  width5">
                    <a href="categories.php?op=edit&amp;cat_id=<{$cat.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16}>edit.png" alt="" title="<{$smarty.const._EDIT}> categories" ></a>
                    <a href="categories.php?op=clone&amp;cat_id_source=<{$cat.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16}>editcopy.png" alt="" title="<{$smarty.const._CLONE}> categories" ></a>
                    <{if $cat.id == 1}>
                      <img src="<{xoModuleIcons16}>empty.png" alt="" title="" >
                    <{else}>
                      <a href="categories.php?op=delete&amp;cat_id=<{$cat.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16}>delete.png" alt="" title="<{$smarty.const._DELETE}> categories" ></a>
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
