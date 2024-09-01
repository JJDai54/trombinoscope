<{if $smarty.const.TROMBINOSCOPE_SHOW_TPL_NAME==1}>
<div style="text-align: center; background-color: black;"><span style="color: yellow;">Template : <{$smarty.template}></span></div>
<{/if}>

<{include file='db:trombinoscope_header.tpl' }>

<!-- Start index list -->
<table>
    <thead>
        <tr class='center'>
            <th><{$smarty.const._MA_TROMBINOSCOPE_TITLE}>  -  <{$smarty.const._MA_TROMBINOSCOPE_DESC}></th>
        </tr>
    </thead>
    <tbody>
        <tr class='center'>
            <td class='bold pad5'>
                <ul class='menu text-center'>
                    <li><a href='<{$trombinoscope_url}>'><{$smarty.const._MA_TROMBINOSCOPE_INDEX}></a></li>
                    <li><a href='<{$trombinoscope_url}>/categories.php'><{$smarty.const._MA_TROMBINOSCOPE_CATEGORIES}></a></li>
                    <li><a href='<{$trombinoscope_url}>/members.php'><{$smarty.const._MA_TROMBINOSCOPE_MEMBERS}></a></li>
                </ul>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr class='center'>
            <td class='bold pad5'>
                <{if $adv|default:''}><{$adv|default:false}><{/if}>
            </td>
        </tr>
    </tfoot>
</table>
<!-- End index list -->

<div class='trombinoscope-linetitle'><{$smarty.const._MA_TROMBINOSCOPE_INDEX_LATEST_LIST}></div>
<{if $categoriesCount|default:0 > 0}>
    <!-- Start show new categories in index -->
    <table class='table table-<{$table_type}>'>
                    </tr><tr>
        <tr>
            <!-- Start new link loop -->
            <{foreach item=category from=$categories name=category}>
                <td class='col_width<{$numb_col}> top center'>
                    <{include file='db:trombinoscope_categories_list.tpl' category=$category}>
                </td>
                <{if $smarty.foreach.category.iteration is div by $numb_col}>
                    </tr><tr>
                <{/if}>
            <{/foreach}>
            <!-- End new link loop -->
        </tr>
    </table>
<{/if}>
<div class='trombinoscope-linetitle'><{$smarty.const._MA_TROMBINOSCOPE_INDEX_LATEST_LIST}></div>
<{if $membersCount|default:0 > 0}>
    <!-- Start show new members in index -->
    <table class='table table-<{$table_type}>'>
                    </tr><tr>
        <tr>
            <!-- Start new link loop -->
            <{foreach item=member from=$members name=member}>
                <td class='col_width<{$numb_col}> top center'>
                    <{include file='db:trombinoscope_members_list.tpl' member=$member}>
                </td>
                <{if $smarty.foreach.member.iteration is div by $numb_col}>
                    </tr><tr>
                <{/if}>
            <{/foreach}>
            <!-- End new link loop -->
        </tr>
    </table>
<{/if}>

<{include file='db:trombinoscope_footer.tpl' }>
