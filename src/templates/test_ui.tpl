
<table>

    <tbody>

        <tr>

            <td>

                <table>

                    <thead>

                        <tr>

                            <th colspan="2">

                                <span>
                                    Group Name
                                </span>

                                <a data-original-title="Enter username">


                                </a>

                            </th>

                        </tr>

                    </thead>

                    <tbody class="ui-sortable">

                        <tr>

                            <td>

                                <span>
                                    Radio
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/radio.tpl" inputDetails=$content_details_array.formelements.radio}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Select data test
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.select_array}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Select data from db
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/select.tpl" inputDetails=$content_details_array.formelements.select_foregin}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Text
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.text}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Check box
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/checkbox.tpl" inputDetails=$content_details_array.formelements.check_box}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Number
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.number}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Date
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/date.tpl" inputDetails=$content_details_array.formelements.date}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Photo
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/camera.tpl" inputDetails=$content_details_array.formelements.photo}
                                </span>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <span>
                                    Read only
                                </span>

                            </td>

                            <td>

                                <span>
                                    {include file="formelements/input.tpl" inputDetails=$content_details_array.formelements.read_only}
                                </span>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </td>

        </tr>

    </tbody>

</table>

