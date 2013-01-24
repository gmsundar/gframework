<?php /* Smarty version 2.6.26, created on 2013-01-23 22:29:13
         compiled from system/config_creater.tpl */ ?>
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen" />
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.bootstrap.wizard.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
bootstrap.min.js"></script>
<script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
geo.base.js"></script>
<form method="POST" id="config">
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab">Database</a></li>
                        <li><a href="#tab2" data-toggle="tab">Security</a></li>
                        <li><a href="#tab3" data-toggle="tab">UI</a></li>
                        <li><a href="#tab4" data-toggle="tab">Dev</a></li>
                        <li><a href="#tab5" data-toggle="tab">SMTP</a></li>
                        <li><a href="#tab6" data-toggle="tab">Application</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="tab1">
                <table>
                    <tr>
                        <td><label>Database Type</label></td>
                        <td>
                            <select name="databasetype" id="databasetype" required="true" >
                                <option value="mysql" data-port="3306" data-username="root">Mysql</option>
                                <option value="oracle" data-port="1521" data-username="scott">Oracle</option>
                                <option value="mssql" data-port="1433">MS SQL</option>
                                <option value="posgressql" data-port="5432">PosgresSQL</option>
                                <option value="sqlite" >SQLite</option>
                                <option value="sqlite3">SQLite3</option>
                                <option value="mongodb" data-port="27017">Mongodb</option>
                                <option value="access" >MS Access</option>
                                <!--<option value="informix" data-port="3306">Informix</option>
                                <option value="db2" data-port="3306">DB2</option>
                                <option value="sybase" data-port="6262">SyBase</option>
                                <option value="interbase" data-port="3306">Interbase</option>
                                <option value="firebird" data-port="3306">Firebird</option>-->
                                <option value="spreadsheet">SpreadSheet(Excel)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Database Port</label></td>
                        <td>
                            <input type="number" name="databaseport" id="databaseport" placeholder="" min="1" max="9999" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Database Host</label></td>
                        <td><input type="text" name="databasehost" id="databasehost" placeholder="localhost" /></td>
                    </tr>
                    <tr>
                        <td><label>Database Username</label></td>
                        <td><input type="text" name="databaseuser" id="databaseuser" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Database Password</label></td>
                        <td><input type="password" name="databasepass" id="databasepass" placeholder=""  /></td>
                    </tr>
                    <tr>
                        <td><label>File</label></td>
                        <td><input type="file" name="databasefile" id="databasefile" placeholder=""  /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="#" class="btn" id="connect" >Connect</a>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Database Name</label></td>
                        <td><select name="databasename" id="databasename" required="true" >
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="tab2">
                <table>
                    <tr>
                        <td><label>Encrypt Method</label></td>
                        <td><input type="text" name="encryptmethod" id="encryptmethod" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Encrypt Salt</label></td>
                        <td><input type="text" name="encryptsalt" id="encryptsalt" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Encrypt IV</label></td>
                        <td><input type="text" name="encryptiv" id="encryptiv" placeholder="" required="true" /></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="tab3">
                <table>
                    <tr>
                        <td><label>Language</label></td>
                        <td>

                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['applang'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label>Text Direction</label></td>
                        <td><input type="text" name="apptextdirection" id="apptextdirection" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Theme</label></td>
                        <td>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "formelements/select.tpl", 'smarty_include_vars' => array('inputDetails' => $this->_tpl_vars['content_details_array']['formelements']['apptheme'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label>URL</label></td>
                        <td><input type="url" name="appurl" id="appurl" placeholder="" required="true" /></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="tab4">
                <table>

                    <tr>
                        <td><label>Log Level</label></td>
                        <td><input type="number" name="apploglevel" id="apploglevel" placeholder="" required="true" min="1"  value="2" max="5" /></td>
                    </tr>

                    <tr>
                        <td><label>Environment</label></td>
                        <td><input type="text" name="appenvironment" id="appenvironment" placeholder=""  value="production" required="true" /></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="tab5">
                <table>
                    <tr>
                        <td><label>Host</label></td>
                        <td><input type="text" name="smtphost" id="smtphost" placeholder="" required="true" /></td>
                    </tr>

                    <tr>
                        <td><label>UserName</label></td>
                        <td><input type="email" name="smtpuser" id="smtpuser" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="text" name="smtppass" id="smtppass" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Port</label></td>
                        <td><input type="number" name="smtpport" id="smtpport" placeholder="" required="true" min="1" maxlength="9999" /></td>
                    </tr>
                    <tr>
                        <td><label>Timeout</label></td>
                        <td><input type="number" name="smtptimeout" id="smtptimeout" placeholder="" required="true" min="1" maxlength="99" /></td>
                    </tr>
                    <tr>
                        <td><label>Crypto</label></td>
                        <td><input type="text" name="smtpcrypto" id="smtpcrypto" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Send Mail Path</label></td>
                        <td><input type="text" name="sendmailpath" id="sendmailpath" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Default E-Mail</label></td>
                        <td><input type="text" name="defaultemailfrom" id="defaultemailfrom" placeholder="" required="true" /></td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane" id="tab6">
                <table>
                    <tr>
                        <td><label>Requires Login</label></td>
                        <td><input type="checkbox" name="apprequireslogin" value="True">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Home Page</label></td>
                        <td><input type="text" name="apphomepage" id="apphomepage" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="appname" id="appname" placeholder="" required="true" /></td>
                    </tr>
                    <tr>
                        <td><label>Date Format</label></td>
                        <td><input type="text" name="appdateformat" id="appdateformat" placeholder="" required="true" min="1" maxlength="9999" /></td>
                    </tr>
                </table>
            </div>
            <ul class="pager wizard">
                <li class="previous" ><a href="#">Previous</a></li>
                <li class="next"><a href="#">Next</a></li>
                <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
            </ul>
        </div>

    </div>
</form>
<script>
    <?php echo '
        $(document).ready(function() {
            $(\'#rootwizard\').bootstrapWizard({
                \'firstSelector\': \'.button-first\', \'lastSelector\': \'.last\',
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find(\'li\').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $(\'#rootwizard\').find(\'.bar\').css({width: $percent + \'%\'});

                    // If it\'s the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $(\'#rootwizard\').find(\'.pager .next\').hide();
                        $(\'#rootwizard\').find(\'.pager .finish\').show();
                        $(\'#rootwizard\').find(\'.pager .finish\').removeClass(\'disabled\');
                    } else {
                        $(\'#rootwizard\').find(\'.pager .next\').show();
                        $(\'#rootwizard\').find(\'.pager .finish\').hide();
                    }
                    if ($current == 1) {
                        $(\'#rootwizard\').find(\'.pager .previous\').hide();
                    } else {
                        $(\'#rootwizard\').find(\'.pager .previous\').show();
                    }

                }
            });

            $(\'#rootwizard .finish\').click(function() {
                $("#config").submit();
            });
            $(\'#connect\').click(function(e) {
                $.ajax({
                    url: \'../system/ajax.php?dblist=\' + $(\'#databasetype\').val() + \'&databasehost=\' + $(\'#databasehost\').val() + \'&databaseuser=\' + $(\'#databaseuser\').val() + \'&databasepass=\' + $(\'#databasepass\').val() + \'&databasename=\' + $(\'#databasename\').val() + \'&databasefile=\' + $(\'#databasefile\').val() + \'&type=ajax\',
                    success: function(data) {

                        geoJs.setSelectOptions(\'#databasename\', data);
                        alert(\'Database list loaded.\');
                    }
                })
                e.preventDefault();

            });

            $(\'#databasetype\').change(function() {
                if ($(\'#databaseport\').val() == \'\') {
                    $(\'#databaseport\').attr(\'placeholder\', +$(\'#databasetype option:selected\').attr(\'data-port\'));
                }
                if ($(\'#databaseuser\').val() == \'\') {
                    $(\'#databaseuser\').attr(\'placeholder\', \'Default : \' + $(\'#databasetype option:selected\').attr(\'data-username\'));
                }

            });
            $(\'#databasetype\').trigger(\'change\');
        });
    '; ?>

</script>