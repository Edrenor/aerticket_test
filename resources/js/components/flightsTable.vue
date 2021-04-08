<template>
    <table v-if="flights.length" class="table">
        <thead>
        <tr>
            <th scope="col">flightNumber</th>
            <th scope="col">arrivalAirport</th>
            <th scope="col">arrivalDateTime</th>
            <th scope="col">departureAirport</th>
            <th scope="col">departureDateTime</th>
            <th scope="col">duration</th>
            <th scope="col">transporter code</th>
            <th scope="col">transporter name</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="flight in flights">
            <th scope="col">{{flight.flightNumber }}</th>
            <th scope="col">{{flight.arrivalAirport}}</th>
            <th scope="col">{{flight.arrivalDateTime}}</th>
            <th scope="col">{{flight.departureAirport}}</th>
            <th scope="col">{{flight.departureDateTime}}</th>
            <th scope="col">{{flight.duration}} min.</th>
            <th scope="col">{{flight.transporter.code}}</th>
            <th scope="col">{{flight.transporter.name}}</th>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "flightsTable",
        props: {
            flights: {
                type: Array,
                default: []
            }
        }
    };
</script>
