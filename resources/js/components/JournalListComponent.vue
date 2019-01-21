<template>
  <div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Text</th>
          <th scope="col">Plan for tomorrow</th>
          <th scope="col">Goal for tomorrow</th>
          <th scope="col">Achievment</th>
          <th scope="col">
            <button
              class="btn btn-primary mt-3"
              id="show-journal-create-modal"
              @click="showJournalCreateModal = true"
            >Add New</button>
            <add-journal-modal
              :messages="messages"
              id="addJournalModal"
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
    <delete-component
      v-if="showJournalDeleteModal"
      @deleteJournal="deleteJournal"
      @close="showJournalDeleteModal = false"
    ></delete-component>
  </div>
</template>
<script>
function Journal({
  id,
  date,
  text,
  plan_tomorrow,
  goal_tomorrow,
  goal_status
}) {
  this.id = id;
  this.date = date;
  this.text = text;
  this.plan_tomorrow = plan_tomorrow;
  this.goal_tomorrow = goal_tomorrow;
  this.goal_status = goal_status;
}
import axios from "axios";
import moment from "moment";
Vue.prototype.moment = moment;
export default {
  props: ["userid", "journal_id"],
  data() {
    return {
      showJournalDeleteModal: false,
      showJournalCreateModal: false,
      journals: [],
      messages: []
    };
  },
  methods: {
    createJournal(date, text, plan_tomorrow, goal_tomorrow, goal_status) {
      axios
        .post("api/journals", {
          user_id: this.userid,
          date: moment(date).format("YYYY-MM-DD"),
          text: text,
          plan_tomorrow: plan_tomorrow,
          goal_tomorrow: goal_tomorrow,
          goal_status: goal_status
        })
        .then(({ data }) => {
          this.journals.push(new Journal(data));
          this.showJournalCreateModal = false;
        })
        .catch(error => {
          if (error.response.status == 422) {
            let msgs = this.messages;
            let errors = error.response.data.errors;

            Object.keys(errors).forEach(key => {
              errors[key].forEach(function(error) {
                msgs.push(error);
              });
            });
            this.messages = msgs;
          } else {
            this.messages = ["Server error."];
          }
        });
    },
    deleteJournal(journal, id) {
      axios
        .delete("api/journals/" + id)
        .then(response => {
          let index = this.journals.findIndex(journal => journal.id === id);
          this.journals.splice(index, 1);
        })
        .catch(error => {
          if (error.response.status) {
            alert("Server Error");
          }
        });
    }
  }
};
</script>
