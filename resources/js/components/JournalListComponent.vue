<template>
  <div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Goal for tomorrow</th>
          <th scope="col">Achievment</th>
          <th scope="col">Grade for the day</th>
          <th scope="col">Details</th>
        </tr>
      </thead>
      <tbody>
        <journal v-for="journal in journals" v-bind="journal" :key="journal.id"></journal>
      </tbody>
    </table>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      journals: [
        {
          id: 1,
          date: "2019-10-01",
          goalForTomorrow: "Test Case",
          grade: "B"
        },
        {
          id: 2,
          date: "2019-11-01",
          goalForTomorrow: "Finish Homework",
          grade: "C"
        },
        {
          id: 3,
          date: "2019-12-02",
          goalForTomorrow: "Write the Graduation Thesis",
          grade: "A"
        }
      ]
    };
  },
  methods: {
    DELETE(journal, id) {
      $("#confirmationCom").modal("show");
      this.journals = journal;
      this.journals.id = id;
    },
    createJournal() {
      axios
        .post("api/journals", {
          date: "",
          goalForTomorrow: "",
          grade: ""
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    deleteJournal(journals, id) {
      axios
        .delete("api/journals" + id)
        .then(response => this.journals.splice(index, 1));
      window.location.reload();
    }
  }
};
</script>
