<template>
    <card-widget class="mt-4">
        <template #header>
            <header-card>
                <template #icon>
                   <academic-icon></academic-icon>
                </template>
                <template #title>
                    Work Experience
                </template>
                <template #action_icon>
                    <add-icon class="text-primary"/>
                </template>
            </header-card>
        </template>
        <template #body>
            <div class="flex flex-wrap gap-2 py-4">
                <slot name="card">
    
                </slot>
            </div>
        </template>
    </card-widget>
</template>
<script>

</script>
