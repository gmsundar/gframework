<script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
<script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
<form method="POST" name="__dbdesign">

{if $content_details_array.page.action eq 'add'||$content_details_array.page.action eq 'edit'}

<table border="0" id="table_details">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Length</th>
            <th>Default</th>
            <th>Default Value</th>
            <th>Not Null</th>
            <th>Index</th>
            <th>Auto Increment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$content_details_array.formelements.add_edit item=currentvalue key=key}
        {if $key eq 'id'}
        <tr>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.COLUMN_NAME}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.DATA_TYPE}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.CHARACTER_MAXIMUM_LENGTH}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.COLUMN_DEFAULT}</td>            
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.COLUMN_DEFAULT}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.IS_NULLABLE}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.INDEX}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.AI}</td>
            
        </tr>
        {else}
        <tr>
            <td>{include file="formelements/input.tpl" inputDetails=$currentvalue.COLUMN_NAME}</td>
            <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.DATA_TYPE}</td>
            <td>{include file="formelements/input.tpl" inputDetails=$currentvalue.CHARACTER_MAXIMUM_LENGTH}</td>
            <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.COLUMN_DEFAULT}</td>
            <td>{include file="formelements/input.tpl" inputDetails=$currentvalue.COLUMN_DEFAULT}</td>
            <td>{include file="formelements/input.tpl" inputDetails=$currentvalue.IS_NULLABLE}</td>
            <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.INDEX}</td>
            <td>{include file="formelements/input.tpl" inputDetails=$currentvalue.AI}</td>
        </tr>
        {/if}
{/foreach}
    </tbody>
</table>
{include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit_button}

{literal}
<script>
        
    $(document).ready(function() {
        geoJs.makeInsertRowTable({"tableid":"table_details","skiprows":"1"}); 
        $('#table_details').dataTable({"bAutoWidth": true,
            "bJQueryUI": true,
            "bSort": false
        });
        
    } );
</script>
{/literal}
{elseif $content_details_array.page.action eq 'view'}


<table border="0" id="table_details">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Length</th>
            <th>Default</th>
            <th>Not Null</th>
            <th>Index</th>
            <th>Auto Increment</th>
           
        </tr>
    </thead>
    <tbody>
        {foreach from=$content_details_array.view item=currentvalue key=key}
        <tr>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.COLUMN_NAME}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.DATA_TYPE}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.CHARACTER_MAXIMUM_LENGTH}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.COLUMN_DEFAULT}</td>            
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.IS_NULLABLE}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.INDEX}</td>
            <td>{include file="formelements/label.tpl" inputDetails=$currentvalue.AI}</td>
            
        </tr>
        {/foreach}
    </tbody>
</table>

{literal}
<script>
        
    $(document).ready(function() {
        
        $('#table_details').dataTable({"bAutoWidth": true,
            "bJQueryUI": true,
            "bSort": false
        });
        
        
    } );
</script>
{/literal}
{else}

{html_table loop=$content_details_array.viewall.data cols=$content_details_array.viewall.columnnames rows=$content_details_array.viewall.rowcount table_attr="id='__dbdesign'"}



{literal}
<script>
        
    $(document).ready(function() {
        
        $('#submit').click(function(event){
            
            
            //$('<div />').attr('title','Add columns').html('').dialog();
            $('#add_table').dialog();
            event.preventDefault();
            
        });
        
        geoTable = $('#__dbdesign').dataTable(
        {
            "bAutoWidth": false,
            "bJQueryUI": true,
              
            "sPaginationType": "full_numbers",
 
            aoColumns: [null,null,null,null,null,
            
                {
                    "bSearchable": false,
                    "bSortable": false,
                    "fnRender": function (oObj) 
                    {
                        return "<a href='"+AppURL+"index.php?file=__dbdesign&type=system&action=delete&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"delete.png'></a>  <a href='"+AppURL+"index.php?file=__dbdesign&type=system&action=edit&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"edit.png'></a>  <a href='"+AppURL+"index.php?file=__dbdesign&type=system&action=view&id=" + oObj.aData[0] + "'><img src='"+AppImgURL+"view.png'></a>";
                    }
                }]



        }
    );
        $("#__dbdesign_length >label").after(" <a href='"+AppURL+"index.php?file=__dbdesign&type=system&action=add'><img src='"+AppImgURL+"/add.png' />Add Table</a>");       
    } );
        

</script>
{/literal}
{/if}
</form>
