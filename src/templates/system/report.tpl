
{if $smarty.get.id eq "3"}
    <link href="{$AppCssURL}ui.daterangepicker.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="{$AppJsURL}daterangepicker.jQuery.js" ></script>

    <form method="POST" name="reportfilters">
        <a id="georeportfiltercontroller" style="cursor:pointer">Filters(-)</a>
        <div id="georeportfilters">
            <table>
                <tr>
                    {foreach from=$content_details_array.page.report.filters item=currentselectvalue key=key name=filter}
                        <td>
                            {if $currentselectvalue.controltype eq 'list-box'}
                                {$currentselectvalue.displayname} : {include file="formelements/select.tpl" inputDetails=$currentselectvalue}
                            {else}
                                {$currentselectvalue.displayname} : {include file="formelements/input.tpl" inputDetails=$currentselectvalue}
                            {/if}
                        </td>
                    {/foreach}
                </tr>
            </table>
            <button id="applygeoreportfilter">Apply Filter</button>
            <button id="savegeoreportfilter">Save Filter</button>
            <button id="resetgeoreportfilter">Reset Filter</button>

        </div>
    </form> 
    <br/>
{/if}
<div id="georeporttable">
    {$content_details_array.page.report.data}
</div>
<script src="{$AppJsURL}datatables/jquery.dataTables.min.js"></script>
<script>
        {foreach from=$content_details_array.page.report.variables item=currentselectvalue key=key name=filter}
        var {$key}="{$currentselectvalue}";
    {/foreach}
    {literal}
    
        $(document).ready(function() {
//                   var theaddata=$("#georeport").children('tbody').children('tr');
//                    georeportheaderrows=georeportheaderrows>0?georeportheaderrows:1;
//                    theaddata=$(theaddata).slice(0,georeportheaderrows);
//                    $("#georeport").prepend('<thead></thead>');
//                    $("#georeport > thead").append(theaddata);
                   
 $("select").multiselect().multiselectfilter({'placeholder':'Enter filter values'});
    $('[type=date]').daterangepicker({
                                        dateFormat: 'M d, yy',
                                        rangeSplitter: 'to',
                                        closeOnSelect:true,
                                        datepickerOptions: {
                                                changeMonth: true,
                                                changeYear: true
                                        }
                                 }); 

            $('#georeportfiltercontroller').bind('click',function(){
                if($(this).html()=='Filters(-)'){  
                    $(this).html('Filters(+)');
                }else{
                    $(this).html('Filters(-)');        
                }
                $("#georeportfilters").toggle();
            });
        $('#georeport').dataTable({"bAutoWidth": false,"bJQueryUI": true});

        });
        $('#applygeoreportfilter').bind('click',function(){
            var formdata= $("form").serialize();
    


        });
        $('#resetgeoreportfilter').bind('click',function(){


        });
        $('#savegeoreportfilter').bind('click',function(){


        });
       
    </script>
    <style>

        #georeportfilters{
            background-color: #8db1ff;
        }

    </style>
{/literal}
