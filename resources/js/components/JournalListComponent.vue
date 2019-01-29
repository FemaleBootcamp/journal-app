<template>
  <div>
    <div v-if="loading" class="loading-screen">
      <img class="loading-image" :src="'./img/ajax_loader.gif'" alt="No image">
    </div>
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
      <div class="col-lg-4">
        <button @click="filter" class="text-white btn-filter btn btn-group-lg btn-info">Apply Filter</button>
        <button class="text-white btn-filter btn btn-group-lg btn-info">Reset Filter</button>
      </div>
    </div>

    <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Text</th>
        <th scope="col">Plan for tomorrow</th>
        <th scope="col">Goal for tomorrow</th>
        <th scope="col">Achievement</th>

        <th scope="col">
          <button
            @click="showJournalCreateModal = true"
            class="text-white btn btn-info"
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
        @showDetailsModal="showDetailsModal"
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
      :editJournalId="editJournalId"
      :messages="messages"
      @close="showJournalEditModal = false"
      @edit="edit"
      v-bind="editJournal"
      v-if="showJournalEditModal"
    ></edit-component>
    <view-details-component
      :editJournalId="editJournalId"
      @close="showJournalDetailsModal = false"
      v-bind="editJournal"
      v-if="showJournalDetailsModal"
    ></view-details-component>
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
        showJournalDetailsModal: false,
        journals: [],
        messages: [],
        dateFrom: null,
        dateTo: null,
        goalStatus: null,
        deleteJournalId: null,
        editJournalId: null,
        editJournal: null,
        id: null,
        loading:false,
      };
    },
    methods: {
      showEditModal(id) {
        this.showJournalEditModal = true;
        this.editJournalId = id;
        this.loading = true;
        axios.get("api/journals/" + id)
          .then(response => {
            this.editJournal = response.data;
            this.loading = false;
          })
          .catch(error => {
            if (error.response.status) {
              alert("Server Error");
              this.loading = false;
            }
          });
      },
      showDetailsModal(id) {
        this.showJournalDetailsModal = true;
        this.editJournalId = id;
        this.loading = true;
        axios.get("api/journals/" + id)
          .then(response => {
            this.editJournal = response.data;
            this.loading = false;
          })
          .catch(error => {
            if (error.response.status) {
              alert("Server Error");
              this.loading = false;
            }
          });
      },
      showDeleteModal(id) {
        this.showConfirmationModal = true;
        this.deleteJournalId = id;
      },
      createJournal(date, text, plan_tomorrow, goal_tomorrow, goal_status) {
        this.messages = [];
        this.loading = true;
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
            this.loading = false;
          })
          .catch(error => {
            if (error.response.status == 422) {
              let msgs = this.messages;
              let errors = error.response.data.errors;
              this.loading = false;
              Object.keys(errors).forEach(key => {
                errors[key].forEach(function (error) {
                  msgs.push(error);
                });
              });
            } else {
              this.messages = ["Server error."];
              this.loading = false;
            }
          });
      },
      deleteJournal(id) {
        this.loading = true;
        axios
          .delete("api/journals/" + id)
          .then(response => {
            let index = this.journals.findIndex(journal => journal.id === id);
            this.journals.splice(index, 1);
            this.showConfirmationModal = false;
            this.loading = false;
          })
          .catch(error => {
            if (error.response.status) {
              alert("Server Error");
              this.loading = false;
            }
          });
      },
      edit(editJournalId, date, text, plan_tomorrow, goal_tomorrow, goal_status) {
        this.messages = [];
        this.loading = true;
        axios.put("api/journals/" + editJournalId, {
          user_id: this.userid,
          date: moment(date).format("YYYY-MM-DD"),
          text: text,
          plan_tomorrow: plan_tomorrow,
          goal_tomorrow: goal_tomorrow,
          goal_status: goal_status
        })
          .then(response => {
            this.loading = false;
            let index = this.journals.findIndex(journal => journal.id === editJournalId);
            Vue.set(
              this.journals,
              index,
              new Journal({
                id: editJournalId,
                date,
                text,
                plan_tomorrow,
                goal_tomorrow,
                goal_status
              })
            );

            this.showJournalEditModal = false;
          })
          .catch(error => {
            if (error.response.status == 422) {
              let msgs = this.messages;
              let errors = error.response.data.errors;
              this.loading = false;
              Object.keys(errors).forEach(key => {
                errors[key].forEach(function (error) {
                  msgs.push(error);
                });
              });
            } else {
              this.messages = ["Server error."];
            }
          });
      },
      read(dateFrom = null, dateTo = null, goalStatus = null) {
        this.loading = true;
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
              this.loading = false;
            },
            error => {
              console.error(error);
              this.loading = false;
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

  .btn-filter {
    margin-top: 30px;
    margin-left: 60px;
  }
</style>

