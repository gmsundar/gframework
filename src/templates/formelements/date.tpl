

<tr>
    <th valign="top">
        {$inputDetails.displayName} &nbsp;&nbsp;&nbsp;
    </th>
    <td>
        <input 
            type="{if $inputDetails.type!=''}{$inputDetails.type}{else}text{/if}" 
            class="{if $inputDetails.class!=''}{$inputDetails.class}{else}inp-form{/if}" 
            style="{$inputDetails.style}"
            name="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}" 
            id="datepicker" />
        <img src="{$AppImgURL}calendar.png"   alt="" />
    </td>
<td>
        {if $inputDetails.error neq ''}
            <div class="error-left"></div>
            <div class="error-inner">{$inputDetails.error}</div>
        {/if}
    </td>
</tr>
