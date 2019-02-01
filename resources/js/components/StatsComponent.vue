<template>
  <div>
    <vue-chart type="pie" :data="chartData"></vue-chart>
  </div>
</template>
<script>
import VueChart from "vue-chart-js";
import Axios from "axios";

export default {
  props: ["user-id"],
  components: {
    VueChart
  },
  data() {
    return {
      chartData: {
        labels: ["Completed Goals", "Uncompleted Goals"],

        datasets: [
          {
            label: "Component 1",
            backgroundColor: ["#720d27", "#263b60"],
            data: [this.count_achieved, this.count_not_achieved]
          }
        ]
      }
    };
  },

  methods: {
    getJournalInfo() {
      window.axios
        .counting("api/journals-counting", {
          params: {
            userId: this.user-id,
            count_achieved: count_achieved,
            count_not_achieved: count_not_achieved
          }
        })
        .then(response => {
          console.log(response);
          counta = response.count_achieved;
          countn = response.count_not_achieved;          
        })
        .catch(error => {
          alert("Error");
        });
    }
  }
};
</script>
