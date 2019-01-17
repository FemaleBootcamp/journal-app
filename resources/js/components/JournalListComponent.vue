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
import moment from "moment";
Vue.prototype.moment = moment;
export default {
  props: ["user_id"],
  data() {
    return {
      showJournalCreateModal: false,
      journals: []
    };
  },
  methods: {
    filter() {
      this.journals = [];
      this.read(
        this.userid,
        this.date == null ? null: moment(this.date).format("YYYY-MM-DD"),
        this.dateFrom == null
          ? null
          : moment(this.dateFrom).format("YYYY-MM-DD"),          
        this.dateTo == null ? null : moment(this.dateTo).format("YYYY-MM-DD"),
        this.goalStatus
      );
    },

    created() {
      this.read(this.userid);
    },
    createJournal(
      user_id,
      date,
      text,
      plan_tomorrow,
      goal_tomorrow,
      goal_status
    ) {
      axios
        .post("api/journals", {
          user_id: 1,
          date: moment(date).format("YYYY-MM-DD"),
          text: text,
          plan_tomorrow: plan_tomorrow,
          goal_tomorrow: goal_tomorrow,
          goal_status: goal_status
        })
        .then(response => {
          console.log(response);
        })
        .then(function(response) {
          console.log(response);
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
