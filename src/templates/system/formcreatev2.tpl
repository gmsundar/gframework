
<link href="{$AppCssURL}bootstrap-editable.css" rel="stylesheet" type="text/css" media="screen" />
<link href="{$AppCssURL}jasny-bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
<script src="{$AppJsURL}bootstrap-editable.js"></script>
<script src="{$AppJsURL}jquery.table.addrow.js"></script>
<script src="{$AppJsURL}bootstrap-contextmenu.js"></script>
<form id="gframework" method="POST" name="gframework">
    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span3">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tabs-1">Settings</a></li>
                    <li><a href="#tabs-2">Fields</a></li>
                    <li><a href="#tabs-3">Customize</a></li>
                    <li><a href="#tabs-4">Events</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tabs-1" class="tab-pane active">
                        <table class="table-bordered table-condensed table-hover table-striped ">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        <input name="page_name" type="text" class="input-medium" id="page_name" placeholder="Future Reference" />
                                        <label for="menu_required" class="checkbox inline">
                                            <input name="menu_required"  id="menu_required" type="checkbox"/>
                                            Menu Required
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Heading</td>
                                    <td><input name="heading"  type="text" class="input-medium" id="heading" /></td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>
                                        <input name="title" type="text" class="input-medium" id="title" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>No of columns</td>
                                    <td><input type=number id="cols" min="1" class="input-mini" max="99" step="1" value="1" required="true"/></td>
                                </tr>
                                <tr>
                                    <td>No of Rows</td>
                                    <td><input type=number id="rows" min="1" class="input-mini" max="99" step="1" value="1" required="true"/></td>
                                </tr>
                                <tr>

                                    <td colspan="2">
                                        <input type='button' class="btn" id="createlayout" value="Update Layout"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2" class="tab-pane">
                        <div id="products">
                            <ul id="dbcontrols" class="nav nav-pills nav-stacked">
                                <li class="nav-header">Form Controls</li>
                                    {foreach  from=$content_details_array.formelements.dbdata item=currentvalue key=key}
                                    <li class="formcontrols" id="{$key}">{$key}</li>
                                    {/foreach}
                                <li class="divider"></li>
                                <li class="nav-header">HTML</li>
                                <li class="html">Headings</li>
                                <li class="html">Div</li>
                            </ul>
                        </div>
                    </div>
                    <div id="tabs-3" class="tab-pane">
                        <table class="table-bordered table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <fieldset>
                                            <legend>Display</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="column_display_name">Name</label>
                                                <div class="controls">
                                                    <input type="text" id="column_display_name" name="column_display_name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="edit_type">Edit</label>
                                                <div class="controls">
                                                    <select name ="edit_type" id ="edit_type">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="view_type">View</label>
                                                <div class="controls">
                                                    <select name="view_type" id="view_type" >

                                                    </select>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <fieldset>
                                            <legend>Data</legend>
                                            <div class="data-select data-checkbox data-radio ctrlproperties" style="display: none">
                                                <ul class="nav nav-tabs" id="data-select-tab">
                                                    <li><a href="#database">Database</a></li>
                                                    <li class="active"><a href="#static">Static</a></li>
                                                </ul>
                                                <div class="tab-content">

                                                    <div id="database" class="tab-pane">
                                                        <div class="input-prepend">
                                                            <span class="add-on">Select id,</span>
                                                            <input type="text" class="input-small" placeholder="One column(Can use || to join)" id="data_column" list="foreign_key_data_column" name="data_column" >
                                                            <datalist id="foreign_key_data_column">
                                                                <option value=""></option>
                                                            </datalist>
                                                        </div>
                                                        <div class="input-prepend">
                                                            <span class="add-on"> From </span>
                                                            <input type="readonly" name="data_table" id="data_table" value="" placeholder="Table name alone eg., table1 t1">
                                                        </div>

                                                        <div class="input-prepend">
                                                            <span class="add-on"> Join </span>
                                                            <input type="readonly" name="data_table_join" id="data_table_join" value="" placeholder="Include keyword eg., Left join table2 t2">
                                                        </div>

                                                        <div class="input-prepend">
                                                            <span class="add-on"> Where </span>
                                                            <input type="text" id="data_condition" list="foreign_key_data_column" name="data_condition" placeholder="Condition ">
                                                        </div>
                                                        <div class="input-prepend">
                                                            <span class="add-on"> Order by  </span>
                                                            <input type="text" class="input-small" placeholder="Comma Sep" id="data_orderby" list="foreign_key_data_column" name="data_orderby">

                                                        </div>
                                                        <label class="checkbox inline" for="addonfly">
                                                            <input type="checkbox" name="addonfly"  id="addonfly" checked="">
                                                            Add on Fly
                                                        </label>
                                                    </div>
                                                    <div id="static" class="tab-pane  active">
                                                        <table id="static_data_table" class="table-bordered table-condensed table-hover table-striped span12">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Key</th>
                                                                <th>Value</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="RowNumber">1</td>
                                                                <td class="span5">
                                                                    <input type="text" name="static_key_data" class="static_key_data input-mini" id="static_key_data" >
                                                                </td>
                                                                <td class="span5">
                                                                    <input type="text" name="static_value_data" class="static_value_data input-mini" id="static_value_data" >
                                                                </td>
                                                                <td>
                                                                    <i class="icon-trash"></i>
                                                                </td>

                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>
                                                <label class="checkbox inline">
                                                    <input type="checkbox" name="multiselect" id="multiselect" />
                                                    Multi Select
                                                </label>
                                            </div>
                                            <div class="data-date ctrlproperties" style="display: none">
                                                <div class="control-group form-inline">
                                                    Format
                                                    <div class="controls">
                                                        <select name ="data_date_day" id ="data_date_day" class="data_date_day input-mini">
                                                            <option value="dd/mm/yyyy">DD/MM/YYYY</option>
                                                            <option value="dd/mmm/yyyy">DD/MMM/YYYY</option>
                                                            <option value="dd/mm/yy">DD/MM/YY</option>
                                                            <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                                            <option value="mmm/dd/yyyy">MMM/DD/YYYY</option>
                                                            <option value="mm/dd/yy">MM/DD/YY</option>
                                                            <option value="mm-dd-yyyy">MM-DD-YYYY</option>
                                                            <option value="mmm-dd-yyyy">MMM-DD-YYYY</option>
                                                            <option value="mm-dd-yy">MM-DD-YY</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="data-url ctrlproperties" style="display: none">
                                                <label class="inline">
                                                    Prefix
                                                    <input type="text" name="urlprefix" id="urlprefix" placeholder="http://,https://,ftp etc.,"/>
                                                </label>
                                                <label class="checkobox inline">
                                                    Open in New Window
                                                    <input type="checkbox" name="opentype" id="opentype" />
                                                </label>
                                                <label class="radio inline">
                                                    URL Content
                                                    <input type="radio" name="opentype" id="opentype"  value="displayurl"/>
                                                    <input type="radio" name="opentype" id="opentype" value="displayword"/>
                                                    <input type="radio" name="opentype" id="opentype" value="displaycontent"/>
                                                </label>
                                            </div>
                                            <div class="data-time ctrlproperties" style="display: none" >
                                                <label class="checkbox inline">
                                                    24 Hours Format
                                                    <input type="checkbox" name="hrs24format" id="hrs24format">
                                                </label>
                                                <div class="control-group form-inline">
                                                    Minute Step
                                                    <div class="controls">
                                                        <select name ="data_time_format" id ="data_time_format" class="data_time_format input-mini">
                                                            <option value="step1">1 Minute</option>
                                                            <option value="step5">5 Minute</option>
                                                            <option value="step10">10 Minute</option>
                                                            <option value="step15">15 Minute</option>
                                                            <option value="step30">30 Minute</option>
                                                            <option value="step45">45 Minute</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group form-inline">
                                                    Min date
                                                    <div class="controls">
                                                        <input type="text" name="mindate" id="mindate" placeholder="Strings like 'today or -1m' ">
                                                    </div>
                                                </div>
                                                <div class="control-group form-inline">
                                                    Max date
                                                    <div class="controls">
                                                        <input type="text" name="maxdate" id="maxdate" placeholder="Strings like 'tommorrow or +1d' ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="data-textbox ctrlproperties" style="display: none">
                                                <table>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>
                                                            <select class="" id="data_textbox_type">
                                                                <option value="alphanumeric" >Normal</option>
                                                                <option value="password" >Password</option>
                                                                <option value="number" >Number</option>
                                                                <option value="email" >Email</option>
                                                                <option value="range" >Range</option>
                                                                <option value="sequence" >Sequence</option>
                                                                <option value="readonly">ReadOnly</option>
                                                                <option value="hidden" >Hidden</option>
                                                                <option value="percent" >Percent</option>
                                                                <option value="currency" >Currency</option>
                                                            </select>
                                                            <input name="minvalue" id="minvalue" type="text" class="input-mini" placeholder="Min" >
                                                            <input name="maxvalue" id="maxvalue" type="text" class="input-mini" placeholder="Max" >
                                                            <input name="stepvalue" id="stepvalue" type="text" class="input-mini" placeholder="Step" >

                                                            <input name="autoseq_pre" id="autoseq_pre" type="text" class="input-small" placeholder="Auto Sequence " >
                                                            <input name="autoseq_app" id="autoseq_app" type="text" class="input-mini" placeholder="Seq" >
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="data-checkbox ctrlproperties" style="display: none" >
                                                <div class="control-group form-inline">
                                                    Yes
                                                    <div class="controls">
                                                        <input type="text" name="yesvalue" id="yesvalue" placeholder="Display on checked ">
                                                    </div>
                                                </div>
                                                <div class="control-group form-inline">
                                                    No
                                                    <div class="controls">
                                                        <input type="text" name="novalue" id="novalue" placeholder="Display on unchecked">
                                                    </div>
                                                </div>
                                                <label class="checkobox inline">
                                                    Inline
                                                    <input type="checkbox" name="inline" id="inline" />
                                                </label>
                                            </div>
                                            <div class="data-textarea ctrlproperties" style="display: none" >
                                                <table>
                                                    <tr>
                                                        <td>Row</td>
                                                        <td>
                                                            <input type="number" name="textarea_data_rows"  class="input-mini" id="textarea_data_rows" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Columns</td>
                                                        <td>
                                                            <input type="number" name="textarea_data_rows" id="textarea_data_rows" class="input-mini" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Is Html editor</td>
                                                        <td>
                                                            <input type="checkbox" name="textarea_data_editor" id="textarea_data_editor" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </fieldset>
                                        <a class="btn data_save">Update</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <fieldset>
                                            <legend>Properties</legend>
                                            <label class="checkbox inline" for="mandatory">
                                                Mandatory
                                                <input type="checkbox" name="mandatory" id="mandatory">
                                            </label>
                                            <input type="text" placeholder="Place Holder" name="placeholder" id="placeholder">
                                            <input type="text" placeholder="Size px" name="size" id="size" class="input-mini">
                                            <input type="text" placeholder="Default Value" name="default_value" id="default_value">
                                            <input type="text" placeholder="Prepend Value" name="prepend_value" id="prepend_value">
                                            <input type="text" placeholder="Append Value" name="append_value" id="append_value">
                                            <div class="control-group">
                                                <label class="control-label" for="no_validations">Validations</label>
                                                <div class="controls">
                                                    <select name="validations" id="validations">
                                                        <option value="no_validations">No validations</option>
                                                        <option value="unique">Unique</option>
                                                        <option value="pattern">Custom</option>
                                                    </select>
                                                    <input type="text" name="validation_pattern_value" placeholder="Pattern(Regex)">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <textarea name="javascript" id="javascript" rows="" cols="" wrap="soft" placeholder="Javascript Code"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a class="btn data_save">Update</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <fieldset>
                                            <legend>View all <input type="checkbox" name="viewallcolumns" id="viewallcolumns" checked="">
                                            </legend>
                                            <div class="control-group">
                                                <label class="control-label" for="no_validations">Calculation</label>
                                                <div class="controls">
                                                    <input type="text" name="calculation" id="calculation" placeholder="Use data table objects">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <a class="btn data_save">Update</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <fieldset>
                                            <legend>Dependent</legend>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <select name="dependent" >
                                                                    <option value="">--Select--</option>
                                                                </select>
                                                                <div class="input-prepend">
                                                                    <span class="add-on">Select id,</span>
                                                                    <input type="text" class="input-small" placeholder="One column(Can use || to join)" id="dependent_column" list="dependent_column_data" name="dependent_column" >
                                                                </div>
                                                            </div>
                                                            <div class="input-prepend">
                                                                <span class="add-on"> From </span>
                                                                <textarea  placeholder="Table Name (Can use Joins)" list="dependent_table_data" name="dependent_table" ></textarea>
                                                                <datalist id="dependent_table_data">
                                                                    <option value=""></option>
                                                                </datalist>
                                                            </div>
                                                            <div class="input-prepend">
                                                                <span class="add-on"> Where </span>
                                                                <input type="text" id="dependent_column_condition" list="dependent_column_data" name="dependent_column_condition" placeholder="Condition ">
                                                            </div>
                                                            <div class="input-prepend">
                                                                <span class="add-on"> Order by  </span>
                                                                <input type="text" class="input-small" placeholder="Comma Sep" id="dependent_column_orderby" list="dependent_column_data" name="dependent_column_orderby">
                                                                <datalist id="dependent_column_data">
                                                                    <option value=""></option>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <a class="btn data_save">Update</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-4" class="tab-pane">
                        <div class="accordion" id="accordion2">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event1">
                                        List Page : before SQL
                                    </a>
                                </div>
                                <div id="event1" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event2">
                                        List Page : before process
                                    </a>
                                </div>
                                <div id="event2" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event3">
                                        List Page : after process
                                    </a>
                                </div>
                                <div id="event3" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event4">
                                        List Page : before display
                                    </a>
                                </div>
                                <div id="event4" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event5">
                                        List Page : after display

                                    </a>
                                </div>
                                <div id="event5" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event6">
                                        List Page : Onload (Jquery)
                                    </a>
                                </div>
                                <div id="event6" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event7">
                                        View Page : before SQL

                                    </a>
                                </div>
                                <div id="event7" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event8">
                                        View Page : before process
                                    </a>
                                </div>
                                <div id="event8" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event9">
                                        View Page : after process
                                    </a>
                                </div>
                                <div id="event9" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event10">
                                        View Page : before display
                                    </a>
                                </div>
                                <div id="event10" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event11">
                                        View Page : Onload (Jquery)
                                    </a>
                                </div>
                                <div id="event11" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event12">
                                        Delete : before process
                                    </a>
                                </div>
                                <div id="event12" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event13">
                                        Delete : after process
                                    </a>
                                </div>
                                <div id="event13" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event14">
                                        Add : Before Process(Display)
                                    </a>
                                </div>
                                <div id="event14" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event15">
                                        Add : After Process(Display)
                                    </a>
                                </div>
                                <div id="event15" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event16">
                                        Add : Before Record Added
                                    </a>
                                </div>
                                <div id="event16" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event17">
                                        Add : After Record Added
                                    </a>
                                </div>
                                <div id="event17" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event18">
                                        Add : OnLoad (Jquery)
                                    </a>
                                </div>
                                <div id="event18" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event19">
                                        Edit: Before Process(Display)
                                    </a>
                                </div>
                                <div id="event19" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event20">
                                        Edit: After Process(Display)
                                    </a>
                                </div>
                                <div id="event20" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event21">
                                        Edit: After Record Added
                                    </a>
                                </div>
                                <div id="event21" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#event22">
                                        Edit: OnLoad (Jquery)
                                    </a>
                                </div>
                                <div id="event22" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <textarea></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="span9">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <div class="controls ctrl-formatting">
                            <div class="btn-group">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Normal<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a id="font1" href="#">Font1</a></li>
                                    <li><a id="font2" href="#">Font2</a></li>
                                </ul>
                            </div>
                            <div class="btn-group" data-toggle="buttons-checkbox">
                                <button type="button" class="btn"><i class="icon-bold"></i></button>
                                <button type="button" class="btn"><i class="icon-italic"></i></button>
                                <button type="button" class="btn"><i class="icon-text-width"></i></button>
                            </div>
                            <div class="btn-group" data-toggle="buttons-radio">
                                <button type="button" class="btn"><i class="icon-align-left"></i></button>
                                <button type="button" class="btn"><i class="icon-align-center"></i></button>
                                <button type="button" class="btn"><i class="icon-align-right"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="designer">
                    {$content_details_array.formelements.html}
                </div>
            </div>
        </div>
        <input type="hidden" value='{$content_details_array.formelements.dbdatajson}' name="source" id="source"/>
        <input type="hidden" value='{$content_details_array.formelements.resultdatajson}' name="result" id="result"/>
        <input type="hidden" value='' name="currentcol" id="currentcol"/>
        <input type="hidden" value='' name="designer_hidden" id="designer_hidden"/>
        <a href="#" class="btn" id="preview">Preview[New Tab]</a>
        <a href="#" class="btn" id="save">Save</a>
        <ul id="tabletoolsmenu" class="context-menu dropdown-menu">
            <li><a href="#">Action 1</a></li>
            <li><a href="#">Another action 1</a></li>
            <li><a href="#">Something else here 1</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link 1</a></li>
        </ul>
    </div>
</form>
{literal}
    <script>
        var sourcedata = '';
        var resultdata = '';
        $(function() {
            sourcedata = JSON.parse($('#source').val());
            resultdata = JSON.parse($('#result').val());
            $_dropEnd = null;
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
            $('#preview').click(function() {
                $('#designer_hidden').val($('#designer').html());
                $('#result').val(JSON.stringify(resultdata));
                $('#gframework').submit();

            });
            $('#data-select-tab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $("#static_data_table").tableAutoAddRow({autoAddRow: true, rowNumColumn: "rowNumber", inputBoxAutoNumber: true}, function() {
                return false;
            });
            $(".icon-trash").btnDelRow();

            $('#createlayout').click(function() {
                createLayout()
            }).trigger('click');

            $('.buildingblock').live('click', function() {
                $('.buildingblock').removeClass('highlightbuildingblock ui-corner-all');
                $(this).addClass('highlightbuildingblock ui-corner-all');
            });
            $('.formcontrols').live('click', function() {
                if ($('.highlightbuildingblock').length <= 0) {
                    alert('Please select any block to insert element !!!');
                } else {
                    var colname = $(this).html();
                    var data = '<tr id="' + $(this).attr('id') + '" class="buildingobj">\n';
                    data += '<td data-context-menu="#tabletoolsmenu">'
                    data += '<span id="' + $(this).attr('id') + '_labl" class="ctrllabel">' + resultdata[colname]['display_name'];
                    data += '</span>'
                    data += '</td>';
                    data += '<td>';
                    data += '<span id="' + $(this).attr('id') + '_ctrl" class="ctrl">';
                    data += '<span class="">' + $(this).html() + '</span>';
                    data += '<i class="close pull-right" >&times;</i>';
                    data += '</span>';
                    data += '</td>';
                    data += '</tr>';
                    $('.highlightbuildingblock > table').find('tbody').append(data);
                    //if ($(this).hasClass('html') === false)
                    //   $(this).remove();
                    $('#currentcol').val($(this).attr('id'));
                    customizeColumnLoad();

                }

                var fixHelper = function(e, ui) {
                    ui.children().each(function() {
                        $(this).width($(this).width());
                    });
                    return ui;
                };

                $(".highlightbuildingblock > table").find('tbody').sortable({
                    helper: fixHelper
                }).disableSelection();

//                $('.buildingobj').contextmenu();
            });

            //$('.formcontrols').trigger('click');
            /*$('.hover').mouseover(function(e) {
             $(this).addClass('hoverhighlight');

             }).mouseleave(function(e) {
             $(this).removeClass('hoverhighlight');


             });*/
            $('.ctrllabel,.ctrl').live('click', function(e) {
                $('.ctrllabel,.ctrl').removeClass('highlightelements');
                $(this).addClass('highlightelements');


            }).css('cursor', 'pointer');
            $('.buildingobj').live('click', function(e) {


                customizeColumnSave();


                $('#currentcol').val($(this).attr('id'));
                customizeColumnLoad();

                $('#myTab a[href="#tabs-3"]').tab('show');
                $('#edit_type').trigger('change');
                $('#view_type').trigger('change');

            });
            $('.close').live('click', function() {
                $(this).parent().parent().parent().remove();
                if ($(this).prev().hasClass('html') === false) {
                    $('#dbcontrols > .nav-header:first').after('<li class="formcontrols">' + $(this).prev().html() + '</li>');
                }
            });


            $('.icon-pencil').click(function(e) {
                $(this).prev().html('<input type=text value=' + $(this).prev().html() + '/>');
                $(this).removeClass('icon-pencil').addClass('icon-ok');
                $('.group_name > span').editable({'placement': 'bottom'});
                e.preventDefault();
            });
            $('.icon-ok').click(function() {
                //have to be fix
                $(this).removeClass('icon-ok').addClass('icon-pencil');
            });


            $('#column_display_name').change(function() {
                var name = $('#currentcol').val();
                resultdata[name]['display_name'] = $(this).val();
                $('#' + name + '_labl').html($(this).val());
            });
            $('#edit_type').change(function() {
                $('.ctrlproperties').hide();
                $('.data-' + $(this).val()).show();
                $('.data-' + $('#view_type').val()).show();
                customizeColumnSave();
            });
            $('#view_type').change(function() {
                $('.ctrlproperties').hide();
                $('.data-' + $(this).val()).show();
                $('.data-' + $('#edit_type').val()).show();
                customizeColumnSave();
            });


            $('.ctrl-formatting').find('button').click(function() {

                //$('.highlightelements').removeClass('icon-bold icon-italic icon-text-width icon-align-left icon-align-center icon-align-right');
                if ($(this).hasClass('active')) {
                    $('.highlightelements').addClass($(this).find('i').attr('class'))
                } else {
                    $('.highlightelements').removeClass($(this).find('i').attr('class'))
                }

            });


            $(".highlightbuildingblock > table").find('tbody').sortable({
            }).disableSelection();
        });

        function applyFormatting() {

        }
        function loadFormatting() {

        }
        function customizeColumnLoad() {
            var name = $('#currentcol').val();
            if (name != '') {


                var edit_type_Array = new Array();
                var view_type_Array = new Array();
                var edit_selected = new Array();
                var view_selected = new Array();

                //Edit Types
                edit_type_Array["select"] = "Select";
                edit_type_Array["checkbox"] = "Checkbox";
                edit_type_Array["radio"] = "Radio";
                edit_type_Array["textbox"] = "Textbox";
                edit_type_Array["date"] = "Date";
                edit_type_Array["datetime"] = "Date Time";
                edit_type_Array["time"] = "Time";
                edit_type_Array["color"] = "Color";
                edit_type_Array["file"] = "Upload";
                edit_type_Array["camera"] = "Camera";
                edit_type_Array["textarea"] = "Text Area";

                //View Types
                view_type_Array["url"] = "Hyper Link";
                view_type_Array["image"] = "Image";
                view_type_Array["file"] = "File";
                view_type_Array["html"] = "HTML";
                view_type_Array["audio"] = "Audio";
                view_type_Array["video"] = "Video";
                view_type_Array["map"] = "Map";
                view_type_Array["custom"] = "Custom";

                switch (sourcedata[name]['type']) {
                    case 'varchar':
                        edit_selected = ['select', 'checkbox', 'radio', 'textbox', 'time', 'color', 'file', 'camera', 'textarea'];
                        view_selected = ['html', 'image', 'file', 'audio', 'video', 'url', 'map', 'custom'];
                        break;
                    case 'int':
                        edit_selected = ['select', 'checkbox', 'radio', 'textbox', 'time'];

                        view_selected = ['html', 'url', 'map', 'custom'];
                        break;
                    case 'date':
                    case 'timestamp':
                        edit_selected = ['date', 'datetime', 'time'];
                        view_selected = ['html'];
                        break;
                }
                var edit_json = "[";

                $.each(edit_selected, function(index, value) {
                    if (typeof edit_json[index] !== 'Array') {
                        edit_json[index] = new Array();
                    }
                    edit_json += '{"id":"' + value + '","value":"' + edit_type_Array[value] + '"},';

                });
                var view_json = "[";

                $.each(view_selected, function(index, value) {
                    if (typeof view_json[index] !== 'Array')
                        view_json[index] = new Array();
                    view_json += '{"id":"' + value + '","value":"' + view_type_Array[value] + '"},';

                });

                edit_json = edit_json.substring(0, edit_json.length - 1) + "]";
                view_json = view_json.substring(0, view_json.length - 1) + "]";
//Loading values


                $('#mandatory').attr('checked', resultdata[name]['mandatory']);
                $('#viewallcolumns').attr('checked', resultdata[name]['view_all']);
                $('#column_display_name').val(resultdata[name]['view_all_calculation']);
                $('#placeholder').val(resultdata[name]['place_holder']);
                $('#default_value').val(resultdata[name]['default_value']);
                $('#prepend_value').val(resultdata[name]['prepend_value']);
                $('#append_value').val(resultdata[name]['append_value']);
                $('#size').val(resultdata[name]['size']);
                $('#validation_pattern_value').val(resultdata[name]['validation']['custom_pattern']);
                //db column ,table
                $('#validations').val(resultdata[name]['validation']);
                $('#addonfly').attr('checked', resultdata[name]['add_on_fly']);
                $('#javascript').val(resultdata[name]['javascript']);


                /*i = 0;
                 resultdata[name]['dependent'][i]['cols'] = $('#dependent_column').val();
                 resultdata[name]['dependent'][i]['from'] = $('#dependent_table').val();
                 resultdata[name]['dependent'][i]['where'] = $('#dependent_column_condition').val();
                 resultdata[name]['dependent'][i]['orderby'] = $('#dependent_column_orderby').val();
                 resultdata[name]['dependent'][i]['applyto'] = $('#dependent').val();

                 resultdata[name]['data']['cols'] = $('#dependent_column').val();
                 resultdata[name]['data']['from'] = $('#dependent_table').val();
                 resultdata[name]['data']['join'] = $('#dependent_join').val();
                 resultdata[name]['data']['where'] = $('#dependent_column_condition').val();
                 resultdata[name]['data']['orderby'] = $('#dependent_column_orderby').val();
                 resultdata[name]['data']['static'] = data;

                 resultdata[name]['event']['type'] = '';
                 var data = new Array();
                 $('.static_key_data').each(function(index) {
                 if ($(this).val() !== '' && $('.static_value_data').val() !== '') {
                 data[index] = new Array();
                 data[index]['id'] = $(this).val();
                 data[index]['value'] = $('.static_value_data').val();
                 }

                 });
                 */



                $('#column_display_name').val(resultdata[name]['display_name']);
                geoJs.setSelectOptions('#edit_type', edit_json, true, resultdata[name]['edit_as']);
                geoJs.setSelectOptions('#view_type', view_json, true, resultdata[name]['view_as']);




            }

        }
        function customizeColumnSave() {
            var name = $('#currentcol').val();
            if (name != '') {
                resultdata[name]['display_name'] = $('#column_display_name').val();
                resultdata[name]['mandatory'] = $('#mandatory').attr('checked');
                resultdata[name]['edit_as'] = $('#edit_type option:selected').val();
                resultdata[name]['view_as'] = $('#view_type option:selected').val();
                resultdata[name]['view_all'] = $('#viewallcolumns').attr('checked');
                resultdata[name]['view_calculation'] = $('#column_display_name').val();
                resultdata[name]['view_all_calculation'] = $('#column_display_name').val();

                resultdata[name]['add_as'] = $('#edit_type option:selected').val();
                resultdata[name]['place_holder'] = $('#placeholder').val();
                resultdata[name]['default_value'] = $('#default_value').val();
                resultdata[name]['prepend_value'] = $('#prepend_value').val();
                resultdata[name]['append_value'] = $('#append_value').val();
                resultdata[name]['size'] = $('#size').val();
                resultdata[name]['validation']['custom_pattern'] = $('#validation_pattern_value').val();
                resultdata[name]['validation']['type'] = $('#validations').val();

                resultdata[name]['properties']['type'] = $('#data_textbox_type').val();
                resultdata[name]['properties']['min'] = $('#minvalue').val();
                resultdata[name]['properties']['max'] = $('#maxvalue').val();
                resultdata[name]['properties']['step'] = $('#stepvalue').val();
                resultdata[name]['properties']['sequence_prepend'] = $('#autoseq_pre').val();
                resultdata[name]['properties']['sequence_append'] = $('#autoseq_app').val();

                i = 0;
                resultdata[name]['dependent'][i]['cols'] = $('#dependent_column').val();
                resultdata[name]['dependent'][i]['from'] = $('#dependent_table').val();
                resultdata[name]['dependent'][i]['where'] = $('#dependent_column_condition').val();
                resultdata[name]['dependent'][i]['orderby'] = $('#dependent_column_orderby').val();
                resultdata[name]['dependent'][i]['applyto'] = $('#dependent').val();

                resultdata[name]['data']['cols'] = $('#dependent_column').val();
                resultdata[name]['data']['from'] = $('#dependent_table').val();
                resultdata[name]['data']['join'] = $('#dependent_join').val();
                resultdata[name]['data']['where'] = $('#dependent_column_condition').val();
                resultdata[name]['data']['orderby'] = $('#dependent_column_orderby').val();

                var data = new Array();
                var len = $('static_data_table tr').length;
                $('.static_data_table tr').each(function(index) {

                    var indexcount = index + 1;
                    var key = $(this).find('.static_key_data' + indexcount).val();
                    var value = $(this).find('.static_key_data' + indexcount).val();
                    if (key !== '' || value !== '') {
                        data[index] = new Array();
                        value = value ? value : key;
                        key = key ? key : value;
                        data[index]['id'] = key;
                        data[index]['value'] = value;
                    }
                    if (len > 1) {
                        $(this).find('.icon-trash').trigger('click');
                    }
                    len--;
                });


                resultdata[name]['data']['static'] = data;
                resultdata[name]['add_on_fly'] = $('#addonfly').attr('checked');
                resultdata[name]['javascript'] = $('#javascript').val();

            }

        }

        function createLayout() {

            var rows = $("#rows").val();
            var cols = $("#cols").val();
            var $table = $('<table id="layout" style="width:100%;" />');
            var $row = "";
            var exisitingdata = '';
            for (var i = 0; i < rows; i++) {
                $row = $('<tr/>');
                var width = 100 / cols;
                for (var j = 0; j < cols; j++) {

                    if ($('#g' + i + j).html()) {

                        exisitingdata = $('#g' + i + j).html();
                    } else {

                        exisitingdata = '<table class="table-bordered table-striped table-hover span12" ><thead><tr>';
                        exisitingdata += '<th colspan=2 class="group_name"><span>Group Name</span>';
                        exisitingdata += '<a class="pencil" data-type="text" data-original-title="Enter username" >\n';
                        exisitingdata += '<i class="icon-pencil"></i></a></th></tr></thead><tbody></tbody></table>';
                    }
                    $row.append("<td style='width:" + width + "%;vertical-align: top;' id='g" + i + j + "' class='buildingblock'  >" + exisitingdata + "</td>");
                }
                $table.append($row);
            }

            $('#designer').html($table);
            $(".highlightbuildingblock > table").find('tbody').sortable({
            }).disableSelection();

        }

    </script>
    <style>

        .formcontrols,.html{
            cursor: pointer;
        }
        .highlightbuildingblock{
            border: #F19615 solid;
            -moz-border-radius:4px;
            -webkit-border-bottom-radius:4px;
            border-radius:4px;
        }
        .hoverhighlight{
            border: green solid;
        }
        .ctrllabel{
            background-color: #fbf069;
            border:1px solid black;

        }
        .ctrl{
            background-color: #a9dba9;
            border:1px solid black;

        }
        .highlightelements{
            background-color: lightblue;
        }
    </style>
{/literal}




