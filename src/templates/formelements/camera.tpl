
    {include file="formelements/img.tpl" inputDetails=$inputDetails.photoimage}
    {*include file="formelements/img.tpl" inputDetails=$inputDetails.photoimage_add*}
    <img src="{$inputDetails.photoimage_add.src}" height="{$inputDetails.photoimage_add.height}" width="{$inputDetails.photoimage_add.width}" alt="{$inputDetails.photoimage_add.alt}" title="{$inputDetails.photoimage_add.title}" class="{$inputDetails.photoimage_add.class}" id="{$inputDetails.photoimage_add.id}" name="{$inputDetails.photoimage_add.name}" table="{$inputDetails.photoimage_add.table}" column="{$inputDetails.photoimage_add.column}" />
    {include file="formelements/input.tpl" inputDetails=$inputDetails.photoimage_hidden}


    
