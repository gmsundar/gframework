<input
    type="{if $inputDetails.type!=''}{$inputDetails.type}{else}text{/if}"
    class="{if $inputDetails.class!=''}{$inputDetails.class}{else}inp-form{/if}"
    style="{$inputDetails.style}"
    name="{if $inputDetails.name!=''}{$inputDetails.name}{else}{$inputDetails.id}{/if}"
    id="datepicker" />
<img src="{$AppImgURL}calendar.png"   alt="" />
