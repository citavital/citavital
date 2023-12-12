<template>
    <div class="mt-3">

        <div class="sm:hidden">
            <label class="sr-only">Seleccione un tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option v-for="tab in tabs" :value="tab.id">{{ tab.name }}</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <ul class="nav nav-tabs">
                <li
                    v-for="(tab, index) in tabs"
                    :key="tab.name" class="nav-item"
                >
                    <a class="nav-link"
                       :href="'#' + tab.id"
                       :class="tabClass(tab.id)"
                       :aria-current="isCurrentTab(tab.id) ? 'page' : undefined"
                       @click.prevent="changeTab(tab.id)"
                    >
                        {{ tab.name }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavTabs",
    props: {
        tabs: {
            type: Array,
            required: true
        },
        currentTab: {
            type: String,
            required: true
        }
    },
    emits: ['changed'],
    methods: {
        changeTab(tab) {
            this.$emit('changed', tab);
        },
        isCurrentTab(tab) {
            return this.currentTab === tab;
        },
        tabClass(tab) {
            return this.isCurrentTab(tab) ? 'active' : '';
        }
    },
}
</script>
