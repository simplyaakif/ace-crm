
<script>
    //Importing Bar class from the vue-chartjs wrapper
    import { Bar } from 'vue-chartjs'
    //Exporting this so it can be used in other components
    export default {
        extends: Bar,
        data () {
            return {
                datacollection: {
                    //Data to be represented on x-axis
                    labels: this.data_labels,
                    datasets: [
                        {
                            label: 'Data One',
                            backgroundColor: this.data_bg,
                            pointBackgroundColor: 'white',
                            borderWidth: 1,
                            pointBorderColor: '#249EBF',
                            //Data to be represented on y-axis
                            data: this.data_value,
                        }
                    ]
                },
                //Chart.js options that controls the appearance of the chart
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                max: this.data_max
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                        xAxes: [ {
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        props: {
            data_labels: Array,
            data_value:Array,
            data_max:Number,
            data_bg:{type:String,default:'#282373'},
        },
        mounted () {
            //renderChart function renders the chart with the datacollection and options object.
            this.renderChart(this.datacollection, this.options)
        }
    }
</script>


<style scoped>

</style>
