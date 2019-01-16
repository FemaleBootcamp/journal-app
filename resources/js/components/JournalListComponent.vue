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
          <th scope="col">
            <button
              class="btn btn-primary mt-3"
              id="show-journal-create-modal"
              @click="showJournalCreateModal = true"
            >Add New</button>
            <add-journal-modal
              v-if="showJournalCreateModal"
              @createJournal="createJournal"
              @close="showJournalCreateModal = false"
            ></add-journal-modal>
          </th>
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
      showJournalCreateModal: false,
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
    // createJournal(date,text,plan_tomorrow,goal_tomorrow,goal_status) {
    //   console.log(date);
    //   console.log(text);
    //   console.log(plan_tomorrow);
    //   console.log(goal_tomorrow);
    //   console.log(goal_status)
    // },
    createJournal(date, text, plan_tomorrow, goal_tomorrow, goal_status) {
      axios
        .post("api/journals", {          
          date: "2019-10-01",
          text: text,
          plan_tomorrow: plan_tomorrow,
          goal_tomorrow: goal_tomorrow,
          goal_status: goal_status
        })
        .then(response => {
          console.log(response);
        })
        .then(function(response) {
          console.log(response.data.errors);
        });
      this.journals.push();
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
