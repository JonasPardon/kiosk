<template>
    <div class="calendar">
        <div class="event block" v-for="event in events">
            <div class="event__name">
                {{ event.summary }}
            </div>
            <div class="event__timestamps">
                <div class="event__timestamps__start">
                    <span class="event__timestamp__date">
                        {{ formatDate(event.start.dateTime) }}
                    </span>
                    <span class="event__timestamp__time">
                        {{ formatTime(event.start.dateTime) }}
                    </span>
                </div>
                <div class="event__timestamps__end">
                    <span class="event__timestamp__date">
                        {{ formatDate(event.end.dateTime) }}
                    </span>
                    <span class="event__timestamp__time">
                        {{ formatTime(event.end.dateTime) }}
                    </span>
                </div>
            </div>
            <div class="event__location">
                {{ event.location }}
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import moment from 'moment';

    export default {
        name: 'calendar',

        props: {
            refreshRate: {
                type: Number,
                default: 1,
            }
        },

        data() {
            return {
                events: [],
            }
        },

        mounted() {
            this.init();
            console.log('calendar mounted');
        },

        methods: {
            init() {
                this.fetchEvents();

                setInterval(() => {
                   this.fetchEvents();
                }, this.refreshRate * 1000 * 60);
            },

            async fetchEvents() {
                const response = await axios.get('/api/calendar/events');

                if (response.status === 200) {
                    this.events = response.data;
                }
            },

            formatDate(timestamp) {
                return moment(timestamp).format('MMM Do YYYY');
            },

            formatTime(timestamp) {
                return moment(timestamp).format('HH:mm');
            }
        }
    }
</script>

<style lang="scss" scoped>
    .calendar {
        .event {
            &__name {
                font-size: 1.7rem;
                font-weight: 600;
            }

            &__timestamps {
                &__start, &__end {
                    margin: .5rem;
                    padding: .5rem;
                    border-radius: .5rem;
                    background-color: #e51c5a;
                    display: inline-block;
                }

                &__start {

                }

                &__end {

                }

                &__date {

                }

                &__time {
                    font-weight: 600;
                }
            }

            &__location {

            }
        }
    }
</style>
