</div> 
<!--<script type="text/javascript" src="{$AppJsURL}ckeditor/ckeditor.js"></script>-->
<script type="text/javascript" src="{$AppJsURL}jquery.table.addrow.js"></script>
<script type="text/javascript" src="{$AppJsURL}multiselect_drag/ui.multiselect.js"></script>
<link rel="stylesheet" type="text/css" href="{$AppCssURL}ui.multiselect.css">

<form method="POST" name="formcreate">
    <table>
        <tr>
            <td>Form Name</td>
            <td>{include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.tablenames}</td>
        </tr>
        {if $content_details_array.formelements.tablenames.value neq ''}
            <tr>
                <td>
                    <label> Vertical </label>
                </td>
                <td>
                    {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.layout}

                </td>
            </tr>
            <tr>
                <td>
                    <label> Page Heading </label>
                </td>
                <td>
                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pageheading}
                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.reference_tables}
                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.child_tables}
                    Can use {ldelim}$action{rdelim}and /or {ldelim}$id{rdelim}
                </td>
            </tr>
            <tr>
                <td>
                    <label> Page Title </label>
                </td>
                <td>
                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.pagetitle}
                    Can use {ldelim}$action{rdelim}and /or {ldelim}$id{rdelim}
                </td>
            </tr>
            <tr>
                <td>
                    <label> View All actions</label>
                </td>
                <td>
                    {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.viewallactions}
                    Can use  &lt;a href='"+AppURL+"index.php?file=mcountry&action=view&id="+ oObj.aData[0] +"' &gt;Test&lt;/a&gt;
                </td>
            </tr>
            <tr>
                <td>
                    <label> View actions</label>
                </td>
                <td>
                    {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.viewactions}
                    Can use  &lt;a href="'.AppURL.'index.php?file=mcountry&action=edit&id='.$id.'"&gt;Test&lt;/a&gt;
                </td>
            </tr>
            <tr>
                <td>
                    <label> Before Write</label>
                </td>
                <td>
                    {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.beforewrite}
                    php code executed before add or edit
                </td>
            </tr>
            <tr>
                <td>
                    <label> After Write</label>
                </td>
                <td>
                    {include file="formelements/textarea.tpl" inputDetails=$content_details_array.formelements.afterwrite}
                    php code executed after add or edit
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <table border=1>
                        <tr>
                            <td>Column Name</td>
                            <td>Display Name</td>
                            <td>Add/Edit Type</td>
                            <td>View Type </td>
                            <td>Data</td>
                            <td>Position</td>
                            <td>Column Properities</td>
                            <td>View All Customization</td>
                            <td>Dependent</td>  
                        </tr>   
                        {foreach  from=$content_details_array.formelements.column item=currentvalue key=key}
                            <tr>
                                <td>
                                    <label> {$currentvalue.details.display_name}({$key})</label>
                                </td>
                                <td>
                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.details}
                                </td>
                                <td>
                                    {include file="formelements/select.tpl" inputDetails=$currentvalue.type}
                                </td>
                                <td>
                                    {include file="formelements/select.tpl" inputDetails=$currentvalue.view_type}
                                </td>
                                <td>
                                    <table>
                                        {if $currentvalue.details.reference_details.REFERENCED_TABLE_NAME neq ''}
                                            <tr>
                                                <td>
                                                    <input type="hidden" 
                                                           name="{$currentvalue.details.name}_reference_table" 
                                                           value="{$currentvalue.details.reference_details.REFERENCED_TABLE_NAME}" />
                                                    <label>Columns</label>
                                                </td>
                                                <td>
                                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.reference_column}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Condition</label>
                                                </td>
                                                <td>
                                                    <input name="{$currentvalue.details.name}_reference_column_condition" style="width:50px" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Order by</label>
                                                </td>
                                                <td>
                                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.reference_column_orderby}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Add on Fly</label>
                                                </td>
                                                <td>
                                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.addonfly}
                                                </td>
                                            </tr>
                                        {else}
                                            <tr>
                                                <td>
                                                    <label>Static data</label>
                                                </td>
                                                <td> 
                                                    <p>{include file="formelements/input.tpl" inputDetails=$currentvalue.static_data}</p>
                                                    <p>Ex : "1"=>"India","2"=>US..["key"=>"Value"] </p></td>
                                            </tr>
                                        {/if}
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Order</label> 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.column_order}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Group</label> 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.column_group}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Group Order</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.column_group_order}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Group Span</label>
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.column_group_span}
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                Mandatory
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.mandatory}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Place holder 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.placeholder}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Default Value 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.default_value}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Formatting 
                                            </td>
                                            <td>
                                                {include file="formelements/select.tpl" inputDetails=$currentvalue.formatting_type}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Validations 
                                            </td>
                                            <td>
                                                {include file="formelements/select.tpl" inputDetails=$currentvalue.validations}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Validation Pattern 
                                            </td>
                                            <td>
                                                {include file="formelements/input.tpl" inputDetails=$currentvalue.pattern}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                JavaScript 
                                            </td>
                                            <td>
                                                {include file="formelements/textarea.tpl" inputDetails=$currentvalue.dependentshowhide_condition}
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                                <td>
                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.viewallcolumns}
                                    {include file="formelements/input.tpl" inputDetails=$currentvalue.viewallcolumnformula}

                                </td>

                                <td>
                                    <table id="dependent_table">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Control</th>
                                            <th>Query</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td class="rowNumber">1</td>
                                            <td>{include file="formelements/select.tpl" inputDetails=$currentvalue.dependent}</td>
                                            <td>{include file="formelements/textarea.tpl" inputDetails=$currentvalue.dependent_query}</td>
                                            <td>

                                                <button type="button" class="icon-trash">Del</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <button type="button" class="icon-plus">Add</button> 
                                            </td>
                                        </tr>
                                    </table>




                                </td>
                            </tr>

                        {/foreach}
                    </table>
                    <input name="__columns" value="{$columns}" type="hidden" />

                </td></tr>
            <tr>
                <td colspan="2">
                    {include file="formelements/submit_button.tpl" inputDetails=$content_details_array.formelements.submit}
                </td>
            </tr>

        {/if}


    </table>
    {literal}
        <script>
            $(function() {
                //$.localise('ui-multiselect', {/*language: 'en',*/path: 'js/locale/'});
                //$("#_columns").multiselect();

                $(".icon-plus").btnAddRow({rowNumColumn: "rowNumber"}, function() {

                    return false;
                });
                $(".icon-trash").btnDelRow();

            });
            function updateValidations(current_object, column) {

                var validations = new Array();
                var update_object = '#' + column + '_error';
                if ($(current_object).val() != '') {
                    switch ($(current_object).val()) {
                        case 'text':
                            validations[0] = '{no_validation:No Validation}';
                            validations[1] = '{no_validation:No Validation}';
                            validations[2] = '{no_validation:No Validation}';
                            validations[3] = '{no_validation:No Validation}';
                            break;
                        case 'label':

                            validations[0] = '{"no_validation":"No Validation"}';



                            //validations['no_validation']='No Validation';


                            break;
                        case 'label':
                            break;
                        case 'label':
                            break;
                        case 'label':
                            break;
                        case 'label':
                            break;
                        case 'label':
                            break;
                        case 'label':
                            break;
                    }
                }
                validations = JSON.stringify(validations);
                //geoJs.setSelectOptions(update_object,validations)
                return true;

            }


        </script>
    {/literal}
