<template>
    <div class="container">
        <calendar/>
    </div>
</template>

<script>
    import Calendar from './Calendar';

    export default {
        name: 'kiosk-app',

        components: {
            'calendar': Calendar,
        },

        data() {
            return {

            }
        },

        mounted() {
            this.init();
            console.log('app mounted');
        },

        methods: {
            init() {
            },
        }
    }
</script>

<style lang="scss">
    // GLOBAL STYLES
    html {
        font-size: 62.5%;
    }

    body {
        padding: 0;
        margin: 0;
        background-color: #222646;
        color: white;
        font-size: 1.5rem;
        font-family: Nunito, sans-serif;
    }

    .block {
        background-color: #232a51;
        padding: 1rem;
        margin: 1rem;
        border-radius: 1rem;
    }
</style>

<style lang="scss" scoped>
    // STYLES FOR THIS COMPONENT
</style>
