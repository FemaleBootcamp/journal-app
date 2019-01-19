<template>
  <div>
    <div class="row">
      <div class="col-lg-3 d-lg-inline">
        <form id="filter-journal-form">
          <input id="user_id" v-model="userid" name="user_id" type="hidden">
          <h5 class="text-left text-white" style="alignment: left">
            <span>Date Range:</span>
          </h5>
          <datepicker
            name="dateFrom"
            placeholder="Date From:"
            style="margin-bottom: 10px"
            v-model="dateFrom"
          ></datepicker>
          <datepicker name="dateTo" placeholder="Date To:" v-model="dateTo"></datepicker>
        </form>
      </div>
      <div class="col-lg-4 offset-1">
        <h5 class="text-left text-white">
          <span style="alignment: left">Status of the Goal:</span>
        </h5>
        <div class="form-group">
          <select v-model="goalStatus" class="form-control" id="sel1">
            <option>Achieved</option>
            <option>Not-Achieved</option>
          </select>
        </div>
        <button @click="filter" class="mb-5 btn btn-primary modal-default-button mr-2">Apply Filter</button>
      </div>
    </div>

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
  </div>
</template>
<script>
import Datepicker from "vuejs-datepicker";
import axios from "axios";
import moment from "moment";
Vue.prototype.moment = moment;

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

export default {
  components: {
    Datepicker
  },
  props: ["userid"],
  data() {
    return {
      showJournalCreateModal: false,
      journals: [],
      messages: [],
      dateFrom: null,
      dateTo: null,
      goalStatus: null
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
    deleteJournal(journals, id) {
      axios
        .delete("api/journals" + id)
        .then(response => this.journals.splice(index, 1));
      window.location.reload();
    },
    read(dateFrom = null, dateTo = null, goalStatus = null) {
      window.axios
        .get("/api/journals", {
          params: {
            userId: this.userid,
            dateFrom: dateFrom,
            dateTo: dateTo,
            goalStatus: goalStatus
          }
        })
        .then(
          ({ data }) => {
            data.forEach(journal => {
              this.journals.push(new Journal(journal));
            });
          },
          error => {
            console.error(error);
          }
        );
    },
    filter() {
      this.journals = [];
      this.read(
        this.dateFrom == null
          ? null
          : moment(this.dateFrom).format("YYYY-MM-DD"),
        this.dateTo == null ? null : moment(this.dateTo).format("YYYY-MM-DD"),
        this.goalStatus
      );
    }
  },
  created() {
    this.read();
  }
};
</script>
