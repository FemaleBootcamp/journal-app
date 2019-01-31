<template>
  <div>
    <vue-chart type="pie" :data="chartData"></vue-chart>
  </div>
</template>
<script>
import VueChart from "vue-chart-js";
import Axios from "axios";

export default {
  components: {
    VueChart
  },

  data: () => ({
    chartData: {
      labels: ["Completed Goals", "Uncompleted Goals"],

      datasets: [
        {
          label: "Component 1",
          backgroundColor: ["#720d27", "#263b60"],
          data: [10, 20]
        }
      ]
    }
  })
};
</script>
