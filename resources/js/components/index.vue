<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <p v-if="hasErrors('searchQuery.departureAirport')" class="danger">
                                {{ getError('searchQuery.departureAirport') }}
                            </p>
                            <p><label>
                                Select departure airport
                                <select
                                    v-model="departureAirport">
                                    <option
                                        v-for="airport in airportsList"
                                        :value="airport.code"
                                        :key="airport.code"
                                    >
                                        {{airport.name}}
                                    </option>
                                </select>
                            </label></p>
                            <p v-if="hasErrors('searchQuery.arrivalAirport')" class="danger">
                                {{ getError('searchQuery.arrivalAirport') }}
                            </p>
                            <p><label>
                                Select arrival airport
                                <select
                                    v-model="arrivalAirport">
                                    <option
                                        v-for="airport in airportsList"
                                        :value="airport.code"
                                        :key="airport.code"
                                    >
                                        {{airport.name}}
                                    </option>
                                </select>
                            </label></p>
                            <br>
                            <p v-if="hasErrors('searchQuery.departureDate')" class="danger">
                                {{ getError('searchQuery.departureDate') }}
                            </p>
                            <date-picker v-model="departureDate" valueType="format"></date-picker>
                            <button type="submit">Search</button>
                        </form>
                        <flights-table :flights="flights"></flights-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import ValidationErrorsMixin from "../mixins/ValidationErrorsMixin";
    import FlightsTable from "./flightsTable"

    export default {
        data() {
            return {
                airportsList: [],
                departureAirport: {},
                arrivalAirport: {},
                departureDate: {},
                flights: {}
            };
        },
        components: {
            Multiselect,
            DatePicker,
            FlightsTable
        },
        mixins: [ValidationErrorsMixin],
        mounted() {
            axios.get('/api/airports')
                .then(res => {
                    this.airportsList = res.data.data;
                }).catch(err => {
                console.log(err);
            });
        },
        computed: {},
        methods: {
            submit() {
                this.errors = [];

                const searchQuery = {
                    searchQuery: {
                        departureAirport: this.departureAirport,
                        arrivalAirport: this.arrivalAirport,
                        departureDate: this.departureDate
                    }
                };
                axios.post('/api/search', searchQuery)
                    .then(res => {
                        if ('Error' in res.data) {
                            alert(res.data.Error)
                        }
                        else if ('searchResults' in res.data) {
                            this.flights = res.data.searchResults
                        }

                    }).catch(err => {
                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    }
                });
            }
        }
    };
</script>

<style scoped type="scss">
    .danger {
        color: red;
    }
</style>
