<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ plan_tomorrow }}</td>
    <td>{{ goal_tomorrow }}</td>
    <td>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>
    <td>
      <button type="button" class="btn btn-light">View Details</button>
      <button type="button" class="btn btn-primary">Edit</button>
      <button
        @click="$emit(showJournalDeleteModal = true)"
        id="show-journal-delete-modal"
        type="button"
        class="btn btn-danger"
      >Delete</button>
    </td>
  </tr>
</template>
<script>
export default {
  props: ["id", "date", "goalForTomorrow", "grade"],
  data() {
    return {
      goal_tomorrow: null,
      plan_tomorrow: null
    };
  }
};
</script>