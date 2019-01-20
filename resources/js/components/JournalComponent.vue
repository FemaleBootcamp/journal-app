<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ goal_tomorrow }}</td>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>
    <td>{{ plan_tomorrow }}</td>
    <td>
      <button type="button" class="btn btn-light">View Details</button>
      <button type="button" class="btn btn-primary">Edit</button>
      <button
        @click="showJournalDeleteModal = true"
        id="show-journal-delete-modal"
        type="button"
        class="btn btn-danger"
      >Delete</button>
      <delete-component
        v-if="showJournalDeleteModal"
        @deleteJournal="deleteJournal"
        @close="showJournalDeleteModal = false"
      ></delete-component>
    </td>
  </tr>
</template>
<script>
export default {
  props: ["id", "date", "goalForTomorrow", "grade"],
  data() {
    return {
      showJournalDeleteModal: false
    };
  },
  methods: {
    deleteJournal(journal, id) {
      axios
        .delete("api/journals" + id)
        .then(response => this.journals.splice(journal, 1));
      window.location.reload();
    }
  }
};
</script>