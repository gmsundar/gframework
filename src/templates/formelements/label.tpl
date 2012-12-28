
{if $inputDetails.type eq 'date'} 
    <label name="{$inputDetails.name}" id="{$inputDetails.id}" class="{$inputDetails.class}" > {$inputDetails.value|date_format:$AppDateFormatTpl} </label>
{else}    
    <label name="{$inputDetails.name}" id="{$inputDetails.id}" class="{$inputDetails.class}" > {$inputDetails.value} </label>
{/if}