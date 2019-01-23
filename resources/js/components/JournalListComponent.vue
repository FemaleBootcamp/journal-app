<template>
  <div>
    <div class="row">
      <div class="date-range-container col-lg-3">
        <input id="user_id" name="user_id" type="hidden" v-model="userid">
        <h5 class="text-left text-white">
          <span>Date Range:</span>
        </h5>
        <datepicker
          class="form-control"
          name="dateFrom"
          placeholder="Date From:"
          v-model="dateFrom"
        ></datepicker>
        <datepicker class="form-control" name="dateTo" placeholder="Date To:" v-model="dateTo"></datepicker>
      </div>
      <div class="status-goal-container col-lg-4 offset-1">
        <h5 class="text-left text-white">
          <span>Status of the Goal:</span>
        </h5>
        <select class="form-control" id="sel1" v-model="goalStatus">
          <option>Achieved</option>
          <option>Not-Achieved</option>
        </select>
      </div>
      <div class="col-lg-auto offset-2">
        <button @click="filter" class="btn-filter btn btn-group-lg btn-primary">Apply Filter</button>
      </div>
    </div>

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
            @click="showJournalCreateModal = true"
            class="btn btn-primary mt-3"
            id="show-journal-create-modal"
          >Add New
          </button>
          <add-journal-modal
            :messages="messages"
            @close="showJournalCreateModal = false"
            @createJournal="createJournal"
            id="addJournalModal"
            v-if="showJournalCreateModal"
          ></add-journal-modal>
        </th>
      </tr>
      </thead>
      <tbody>
      <journal
        :key="journal.id"
        @showDeleteModal="showDeleteModal"
        @showEditModal="showEditModal"
        v-bind="journal"
        v-for="journal in journals"
      ></journal>
      </tbody>
    </table>
    <delete-component
      :id="deleteJournalId"
      @close="showConfirmationModal = false"
      @delete="deleteJournal"
      v-if="showConfirmationModal"
    ></delete-component>
    <edit-component
      :id="editJournalId"
      :journal="editJournal"
      @close="showJournalEditModal = false"
      v-if="showJournalEditModal"
    ></edit-component>
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
        showConfirmationModal: false,
        showJournalCreateModal: false,
        showJournalEditModal: false,
        journals: [],
        messages: [],
        dateFrom: null,
        dateTo: null,
        goalStatus: null,
        deleteJournalId: null,
        editJournalId: null,
        editJournal: null,
      };
    },
    methods: {
      showEditModal(id) {
        this.showJournalEditModal = true;
        this.editJournalId = id;
        axios.get("api/journals/" + id)
          .then(response => {
            this.editJournal = response.data;
          })
          .catch(error => {
            if (error.response.status) {
              alert("Server Error");
            }
          });
      },
      showDeleteModal(id) {
        this.showConfirmationModal = true;
        this.deleteJournalId = id;
      },
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
          .then(({data}) => {
            this.journals.push(new Journal(data));
            this.showJournalCreateModal = false;
          })
          .catch(error => {
            if (error.response.status == 422) {
              let msgs = this.messages;
              let errors = error.response.data.errors;

              Object.keys(errors).forEach(key => {
                errors[key].forEach(function (error) {
                  msgs.push(error);
                });
              });
              this.messages = msgs;
            } else {
              this.messages = ["Server error."];
            }
          });
      },
      deleteJournal(id) {
        axios
          .delete("api/journals/" + id)
          .then(response => {
            let index = this.journals.findIndex(journal => journal.id === id);
            this.journals.splice(index, 1);
            this.showConfirmationModal = false;
          })
          .catch(error => {
            if (error.response.status) {
              alert("Server Error");
            }
          });
      },

      read(dateFrom = null, dateTo = null, goalStatus = null) {
        window.axios
          .get("api/journals", {
            params: {
              userId: this.userid,
              dateFrom: dateFrom,
              dateTo: dateTo,
              goalStatus: goalStatus
            }
          })
          .then(
            ({data}) => {
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
<style>
  .date-range-container {
    margin-bottom: 5px;
  }

  .form-control {
    margin-bottom: 10px;
  }

  .text-left {
    alignment: left;
  }

  .btn-filter {
    margin-top: 30px;
    margin-left: 60px;
  }
</style>

