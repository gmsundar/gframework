	
{literal}
    <style>
        .column { float: left; width: 50%}
        .portlet { background: white;
                   position: relative;
                   border-radius: 4px;
                   -moz-border-radius: 4px;
                   -webkit-border-radius: 4px;
                   border: 1px solid #CCC;
                   margin: 15px;
                   z-index: 5; 
                   min-height: 250px;

        }
        .portlet-header { border-radius: 4px 4px 0 0;
                          -moz-border-radius: 4px 4px 0 0;
                          -webkit-border-radius: 4px 4px 0 0;
                          border-bottom: 1px solid #CCC;
                          font-size: 14px;

                          padding: 0;
                          margin: 0;

                          padding: 6px 12px;
                          cursor: move;
                          color: #555;

        }

        .portlet-header .ui-icon { float: right;cursor: pointer }
        .portlet-content { padding: 0.4em;overflow: auto; }
        .ui-sortable-placeholder { border: 5px dotted black; visibility: visible !important; height: 100% !important; }
        .ui-sortable-placeholder * { visibility: hidden; }

    </style>
    <script>
        $(function() {
            $( ".column" ).sortable({
                connectWith: ".column",
                placeholder: 'ui-state-highlight',
                opacity: 0.6 ,
                helper: 'clone',
                forcePlaceholderSize: true
            });

            $( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
            .find( ".portlet-header" )
            .addClass( "ui-widget-header ui-corner-all" )
            .prepend( "<span class='ui-icon ui-icon-triangle-1-n'></span>")
            .end()
            .find( ".portlet-content" );

            $( ".portlet-header .ui-icon" ).click(function() {
                $( this ).toggleClass( "ui-icon-triangle-1-n" ).toggleClass( "ui-icon-triangle-1-s" );
                $( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
            });

            $( ".column" ).disableSelection();
        
        
        
            //Load Widget data using Ajax
        
        
        $('.portlet > .content_hash').each(function(index,element){
        
        
            


            loadWidgetData($(element).val(),$(this).prev());
            
        
        
        
        });
        
        
        });
    
        function loadWidgetData(params,parentObj){
            
            var paramsObj=$.parseJSON(params);
            var id=geoJs.getQueryStringVal('pid');
                
            $.ajax({
                url: AppURL+'index.php?file='+paramsObj.widget+'&dataType=ajax&type=widget&id='+id,            
                crossDomain: true,
                success: function(data){
                    $(parentObj).html(data);
                }
            });
            }
    </script>
{/literal}



{foreach item=column from=$content_details_array.dashboard.data.widgets}

    <div class="column">

        {foreach  item=widget from=$column}
            {include file="formelements/widget.tpl" inputDetails=$widget}
        {foreachelse}
            This column  has no widgets
        {/foreach}
    </div>
{foreachelse}
    Dashboard has no widgets 
{/foreach}











