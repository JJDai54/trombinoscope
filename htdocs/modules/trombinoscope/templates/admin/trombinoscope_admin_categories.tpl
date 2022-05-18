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
                <{* pas utilisé pour l'instant
                    <th class="center"><{$smarty.const._AM_TROMBINOSCOPE_CATEGORY_THEME}></th>
                *}>
                <th class="center width5"><{$smarty.const._CO_TROMBINOSCOPE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $categories_count|default:''}>
        <tbody>
            <{foreach item=category from=$categories_list name=catItem}}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$category.id}></td>
                <{* pas utilisé pour l'instant
                    <td class='center'><{$category.parent_id}></td>
                *}>
                <td class='center'>
                    <a href="categories.php?op=edit&amp;cat_id=<{$category.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>">
                        <{$category.name}>
                    </a>
                </td>
                <td class='center'><{$category.weight}></td>
                <{* pas utilisé pour l'instant
                  <td class='center'><{$category.theme}></td>
                *}>
                <td class="center  width5">
                    <a href="categories.php?op=edit&amp;cat_id=<{$category.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="" title="<{$smarty.const._EDIT}> categories" ></a>
                    <a href="categories.php?op=clone&amp;cat_id_source=<{$category.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 editcopy.png}>" alt="" title="<{$smarty.const._CLONE}> categories" ></a>
                    <{if $category.id == 1}>
                      <img src="<{xoModuleIcons16 empty.png}>" alt="" title="" >
                    <{else}>
                      <a href="categories.php?op=delete&amp;cat_id=<{$category.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="" title="<{$smarty.const._DELETE}> categories" ></a>
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
